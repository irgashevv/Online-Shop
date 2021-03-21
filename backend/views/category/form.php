<?php
    include_once __DIR__ . "/../header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавить Категорию</h1>
                    </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Домой</a></li>
                        <li class="breadcrumb-item active">Добавить Категорию</li>
                    </ol>
                </div>
                </div>
            </div>
    </section>
    <section class="content">
        <div>
            <form class="form-horizontal" action="/?model=category&action=save" method="post">
                <div class="card-body">
                    <input type="hidden" value="<?=$one['id'] ?? ''?>" name="id">
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Заголовок</label>
                <div class="col-sm-10">
                    <input type="text" value="<?=$one['title'] ?? ''?>" name="title" class="form-control">
                </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Группа-ID</label>
                <div class="col-sm-10">
                    <input type="number" value="<?=$one['group_id'] ?? ''?>" name="group_id"  class="form-control">
                </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Родительский-ID</label>
                <div class="col-sm-10">
                    <input type="number"  value="<?=$one['parent_id'] ?? ''?>" name="parent_id"  class="form-control">
                </div>
                </div>
                    <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Приоритет</label>
                <div class="col-sm-10">
                    <input type="number"  value="<?=$one['prior'] ?? ''?>" name="prior"  class="form-control">
                </div>
                </div>
                <div>
                    <input type="submit" class="btn btn-info" value="Сохранить">
                </div>
                </div>
            </form>
        </div>
    </section>
</div>

<?php
    include_once __DIR__ . "/../footer.php";
?>