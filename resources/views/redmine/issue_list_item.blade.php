<li class="list-group-item clearfix list-group-item-">
    {{--Assigned user--}}
    <a href="#" class="">
        @if(!empty($issue['assigned_to']))
            <img src="http://www.gravatar.com/avatar/{{ md5(array_get($issue, 'assigned_to.mail', '')) }}?size=40&d=identicon"
                 class="img-circle"
                 alt="{{ array_get($issue, 'assigned_to.name', '') }}"
                 title="{{ array_get($issue, 'assigned_to.name', '') }}"
                 data-toggle="tooltip"/>
        @else
            <img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?size=40&d=mm&f=y"
                 class="img-circle"
                 alt="" title="не назначена" data-toggle="tooltip"/>
        @endif
    </a>

    {{--Issue id and preview--}}
    <strong title="{{ str_limit($issue['subject'], 128) }}"
            data-toggle="popover" data-trigger="hover"
            data-content="{{ !empty($issue['description']) ? str_limit($issue['description'], 1000) : '-' }}">
        &nbsp;#{{ $issue['id'] }}&nbsp;
    </strong>

    {{--Subject and link to issue--}}
    <a href="{{ config('services.redmine.url') }}/issues/{{ $issue['id'] }}" target="_blank"
       title="{{ $issue['subject'] }}">
        @if((int) $issue['status']['id'] === 3)
            <del>{{ str_limit($issue['subject'], 30) }}</del>
        @else
            {{ str_limit($issue['subject'], 30) }}
        @endif
    </a>

    {{--Labels--}}
    @if((int) $issue['tracker']['id'] === 1)
        <span class="label label-danger"><span class="fa fa-bug"></span>&nbsp;bug</span>
    @elseif((int) $issue['tracker']['id'] === 2)
        <span class="label label-primary"><span class="fa fa-wrench"></span>&nbsp;dev</span>
    @elseif((int) $issue['tracker']['id'] === 9)
        <span class="label label-info"><span class="fa fa-eye"></span>&nbsp;analytics</span>
    @else
        <span class="label label-default label-hidden">{{ $issue['tracker']['name'] }}</span>
    @endif

    {{--Actions buttons--}}
    <span class="pull-right">
        <button class="btn btn-xs btn-success" title="решена" data-toggle="tooltip">
            <span class="fa fa-check"></span>
        </button>
        <button class="btn btn-xs btn-warning" title="закрыть" data-toggle="tooltip">
            <span class="fa fa-times"></span>
        </button>
    </span>
</li>