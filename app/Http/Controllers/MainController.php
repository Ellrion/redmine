<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Contracts\Cache\Repository as Cache;

class MainController extends Controller
{
    const USER_DATA_CACHE_TIME = 5;

    private $cache;

    /**
     * @param Cache $cache
     */
    public function __construct(Cache $cache)
    {
        $this->cache = $cache;
    }

    /**
     * Список задачь.
     *
     * @return Response
     */
    public function index()
    {
        $res = app('redmine')->api('issue')->all([
            'limit' => 10,
        ]);
        $issues = array_get($res, 'issues', []);
        $this->loadUsersData($issues);
        return view('main', compact('issues'));
    }

    /**
     * Добавление к задачам расширенных данных о назначенном пользователе.
     *
     * @param $issues
     */
    private function loadUsersData(&$issues)
    {
        foreach ($issues as &$issue) if (!empty($issue['assigned_to'])) {
            $user_id = array_get($issue, 'assigned_to.id');
            $user = $this->getUserData($user_id);
            $issue['assigned_to'] = array_merge($issue['assigned_to'], $user);
        }
    }

    /**
     * Данные о редмайн пользователе по его id.
     *
     * @param $userId
     * @return mixed
     */
    private function getUserData($userId)
    {
        return $this->cache->remember('redmine-user-'.$userId, self::USER_DATA_CACHE_TIME, function () use ($userId) {
            $res = app('redmine')->api('user')->show($userId);

            return !empty($res['user']) ? $res['user'] : [];
        });
    }

}
