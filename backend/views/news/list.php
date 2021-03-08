<?php include_once __DIR__ . "/../header.php"; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новости</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active">Новости</li>
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
                        <th>Дата Добавления</th>
                        <th>Дата Обновления</th>
                        <th>Действия</th>
                    </thead>
                    <tbody>
<?php foreach ($all as $n) : ?>
                        <tr>
                            <td><?=$n['id']?></td>
                            <td><?=$n['title']?></td>
                            <td><img src="/shop/uploads/news/<?=$n['picture']?>"></td>
                            <td><?=$n['preview']?></td>
                            <td><?=$n['content']?></td>
                            <td><?=$n['created']?></td>
                            <td><?=$n['updated']?></td>
                            <td>
<!--a class="btn btn-primary btn-sm" href="#">
<i class="fas fa-folder">
</i>
View
</a-->
                                <a class="btn btn-info btn-sm" href="/?model=news&action=update&id=<?=$n['id']?>">
                                    <i class="fas fa-pencil-alt"> </i> Редактировать </a>
                                <a class="btn btn-danger btn-sm" href="/?model=news&action=delete&id=<?=$n['id']?>">
                                    <i class="fas fa-trash"> </i> Удалить </a>
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