<?php
    include_once __DIR__ . "/../header.php";
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список Оплаты</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active">Список Оплаты</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card">
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <th>ID</th>
                        <th>Оплата</th>
                        <th>Код</th>
                        <th>Приоритет</th>
                        <th>Действия</th>
                    </thead>
<?php foreach ($all as $p):?>
                    <tbody>
                        <tr>
                            <td><?=$p['id']?></td>
                            <td><?=$p['title']?></td>
                            <td><?=$p['code']?></td>
                            <td><?=$p['priority']?></td>
                            <td>
                                <a href="/?model=payment&action=update&id=<?=$p['id']?>" class="btn btn-warning">Редактировать</a>
                                <a href="/?model=payment&action=delete&id=<?=$p['id']?>" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<?php
    include_once __DIR__ . "/../footer.php";
?>