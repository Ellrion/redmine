<?php namespace App\Http\Controllers;

use App\Http\Requests;

class MainController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $issues = app('redmine')->api('issue')->all(['limit' => 10]);
        dd($issues);
        return view('main', compact($issues));
    }

}
