<?php include_once __DIR__ . "/../header.php"; ?>
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
                                <td><?= $p['id'] ?></td>
                                <td><?= $p['title'] ?></td>
                                <td><img src="http://localhost/shop/uploads/products/<?= $p['picture'] ?>"></td>
                                <td><?= $p['preview'] ?></td>
                                <td><?= $p['content'] ?></td>
                                <td><?= $p['price'] ?></td>
                                <td><?= $p['status'] ?></td>
                                <td><?= $p['created'] ?></td>
                                <td><?= $p['updated'] ?></td>
                                <td>
                                    <a class="btn btn-info btn-sm"
                                       href="/?model=product&action=update&id=<?= $p['id'] ?>">
                                        Редактировать
                                    </a>
                                    <button class="btn btn-danger btn-sm" id="delete-btn"
                                            onclick="deleteBtn(<?= $p['id'] ?>, '<?= $p['title'] ?>')">
                                        Удалить
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

    <script>
        function deleteBtn(id, title) {
            if (confirm('Удалить ' + title + '?')) {
                document.location.href = "/?model=product&action=delete&id=" + id
            }
        }
    </script>
<?php include_once __DIR__ . "/../footer.php"; ?>