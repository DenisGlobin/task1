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
        <h1 class="display-4">Форма заказа</h1>
        <form action="{{ url('/page') }}" method="post">
            <div class="form-group row">
                <label for="staticProduct" class="col-sm-2 col-form-label">Товар</label>
                <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="staticProduct" value="{{ $name }}">
                </div>
                {!! csrf_field() !!}
                <input id="id" name="id" type="hidden" value="{{ isset($id) ? $id : null }}">
            </div>
            <div class="form-group">
                <label for="inputName">Имя</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Введите имя">
            </div>
            <div class="form-group">
                <label for="inputPhone">Телефон</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Ваш номер телефона">
            </div>
            <button type="submit" class="btn btn-primary">Создать заказ</button>
        </form>
        <br>
        <a href="{{ url('/') }}"  class="alert-link">Назад на главную</a>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>