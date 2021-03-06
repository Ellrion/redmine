<!doctype html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Redmine</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootswatch/3.3.4/united/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<div class="container">
    <div class="row">
        <h1>Management</h1>
        <div class="col-md-6">
            <h2>
                Last issues ({{ count($issues) }})
                <a href="/" class="btn btn-default" title="обновить" data-toggle="tooltip">
                    <span class="fa fa-lg fa-repeat"></span></a>
            </h2>
            <div id="last">
                <ul class="list-group">
                    @foreach($issues as $issue)
                        @include('redmine.issue_list_item')
                    @endforeach
                </ul>
            </div>
        </div>

    </div>
</div>

<footer>
    {{--{{ debug($issues) }}--}}
</footer>

<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.10/vue.min.js"></script>
<script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
</body>
</html>