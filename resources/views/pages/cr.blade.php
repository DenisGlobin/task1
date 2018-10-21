<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
    <h1 class="display-4">Коэффициент конверсии</h1></br>
    @if(! $pages->isEmpty())
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col" class="table-primary">#</th>
                <th scope="col" class="table-primary">Страницы</th>
                <th scope="col" class="table-primary">Yesterday CR</th>
                <th scope="col" class="table-primary">Today CR</th>
                <th scope="col" class="table-primary">Week CR</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pages as $page)
                <tr>
                    <th scope="row">{{$page->id}}</th>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->yesterday_cr }}</td>
                    <td>{{ $page->today_cr }}</td>
                    <td>{{ $page->week_cr }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <a href="{{ url('/') }}"  class="alert-link">Назад на главную</a>
    @endif
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html