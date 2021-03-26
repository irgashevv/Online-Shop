<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>
<body>
<form class="delete-form">
    <div>
        <label class="col-sm-2 col-form-label">Идентификатор</label>
        <input type="text" value="" name="id">
    </div>
    <div>
        <input type="submit">
    </div>
</form>
<form class="form-horizontal create-form" action="/?model=product&action=save" method="post"
      enctype="multipart/form-data">
    <div class="card-body">
        <div>
            <label class="col-sm-2 col-form-label">Идентификатор</label>
            <input type="text" value="" name="id">
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Заголовок</label>
            <div class="col-sm-10">
                <input type="text" value="" name="title" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Фотография</label>
            <div class="col-sm-10">
                <input type="file" value="" name="picture" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Пред-просмотр</label>
            <div class="col-sm-10">
                <input type="text" value="" name="preview" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Содержание</label>
            <div class="col-sm-10">
                <textarea rows="7" name="content" class="form-control"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Цена</label>
            <div class="col-sm-10">
                <input type="text" value="" name="price" class="form-control">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Статус</label>
            <div class="col-sm-10">
                <input type="text" value="" name="status" class="form-control">
            </div>
        </div>
        <div>
            <input type="submit" class="btn btn-info" value="Сохранить">
        </div>
    </div>
</form>
<script>
    $('form.delete-form').submit(function () {
        let data = {
            id: parseInt($('input[name=id]').val()),
        };

        $.ajax({
            type: 'POST',
            url: '/?module=api&model=product&action=delete',
            data: data,
            dataType: 'json',
            success: function (response) {
                console.log(response);
            },
            error: function (data) {
                console.error(data)
            }
        });
        return false;
    })


    $('form.create-form').submit(function () {
        let data = {
            id: parseInt($('input[name=id]').val()),
            title: $('input[name=title]').val(),
            preview: $('input[name=preview]').val(),
            content: $('textarea[name=content]').val(),
            picture: $('input[name=picture]').val(),
            price: $('input[name=price]').val(),
            status: $('input[name=status]').val(),
        };

        const operation = data.id > 0 ? 'update' : 'create';

        $.ajax({
            type: 'POST',
            url: '/?module=api&model=product&action=' + operation,
            data: data,
            dataType: 'json',
            success: function (response) {
                console.log(response);
            },
            error: function (data) {
                console.error(data)
            }
        });
        return false;
    })
</script>
</body>
</html>