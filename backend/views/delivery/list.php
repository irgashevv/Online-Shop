<?php
    include_once __DIR__ . "/../header.php";
?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Delivery</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Delivery</li>
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
                        <th>Title</th>
                        <th>Code</th>
                        <th>Priority</th>
                        <th>Действия</th>
                    </thead>
<?php foreach ($all as $d):?>
                    <tbody>
                        <tr>
                            <td><?=$d['id']?></td>
                            <td><?=$d['title']?></td>
                            <td><?=$d['code']?></td>
                            <td><?=$d['priority']?></td>
                            <td>
                                <a href="/index.php?model=delivery&action=update&id=<?=$d['id']?>" class="btn btn-warning">Редактировать</a>
                                <a href="/index.php?model=delivery&action=delete&id=<?=$d['id']?>" class="btn btn-danger">Удалить</a>
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