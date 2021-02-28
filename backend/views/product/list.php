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
                        <th>Фотография</th>
                        <th>Пред-просмотр</th>
                        <th>Содержание</th>
                        <th>Цена</th>
                        <th>Статус</th>
                        <th>Дата Добавления</th>
                        <th>Дата Обновления</th>
                        <th>Действия</th>
                    </thead>
                    <tbody>
<?php foreach ($all as $p) : ?>
                        <tr>
                            <td><?=$p['id']?></td>
                            <td><?=$p['title']?></td>
                            <td><img src="/shop/uploads/products/<?=$p['picture']?>"></td>
                            <td><?=$p['preview']?></td>
                            <td><?=$p['content']?></td>
                            <td><?=$p['price']?></td>
                            <td><?=$p['status']?></td>
                            <td><?=$p['created']?></td>
                            <td><?=$p['updated']?></td>
                            <td>
<!--a class="btn btn-primary btn-sm" href="#">
<i class="fas fa-folder">
</i>
View
</a-->
                                <a class="btn btn-info btn-sm" href="http://localhost/shop/backend/index.php?model=product&action=update&id=<?=$p['id']?>">
                                    <i class="fas fa-pencil-alt"> </i> Edit </a>
                                <a class="btn btn-danger btn-sm" href="http://localhost/shop/backend/index.php?model=product&action=delete&id=<?=$p['id']?>">
                                    <i class="fas fa-trash"> </i> Delete </a>
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