<?php
    include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Добавить Разрешение</h1>
                </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Домой</a></li>
                    <li class="breadcrumb-item active">Добавить Разрешение</li>
                </ol>
            </div>
            </div>
        </div>
<!-- /.container-fluid -->
</section>
<section class="content">
        <div>
            <form class="form-horizontal" action="/?model=permission&action=save" method="post">
                <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Разрешение:</label>
                <div class="col-sm-10">
                    <input type="text" value="<?=$one['title'] ?? ''?>" name="permission" class="form-control">
                </div>
                </div>
                <div>
                    <input type="submit" class="btn btn-dark" value="Сохранить">
                </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php
    include_once __DIR__ . "/../footer.php";
?>