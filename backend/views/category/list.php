<?php include_once __DIR__ . "/../main_header.php"; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Товары</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Товары</li>
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
                        <th>Заголовок</th>
                        <th>Группа-ID</th>
                        <th>Родительский-ID</th>
                        <th>Действия</th>
                    </thead>
<?php foreach ($all as $c):?>
                    <tbody>
                        <tr>
                            <td><?=$c['id']?></td>
                            <td><?=$c['title']?></td>
                            <td><?=$c['groupId']?></td>
                            <td><?=$c['parentId']?></td>
                            <td>
                                <a href="http://localhost/shop/backend/index.php?model=category&action=update&id=<?=$c['id']?>" class="btn btn-warning">Редактировать</a> 
                                <a href="http://localhost/shop/backend/index.php?model=category&action=delete&id=<?=$c['id']?>" class="btn btn-danger">Удалить</a>
                            </td>
                        </tr>
<?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php include_once __DIR__ . "/../footer.php"; ?>