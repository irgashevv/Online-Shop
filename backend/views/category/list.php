<?php include_once __DIR__ . "/../header.php"; ?>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Категории</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Главная</a></li>
                            <li class="breadcrumb-item active">Категории</li>
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
                        <th>Приоритет</th>
                        <th>Действия</th>
                        </thead>
                        <?php foreach ($all

                        as $c): ?>
                        <tbody>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= $c['title'] ?></td>
                            <td><?= $c['group_id'] ?></td>
                            <td><?= $c['parent_id'] ?></td>
                            <td><?= $c['prior'] ?></td>
                            <td>
                                <a href="/?model=category&action=update&id=<?= $c['id'] ?>"
                                   class="btn btn-warning btn-sm">Редактировать
                                </a>
                                <button class="btn btn-danger btn-sm" id="delete-btn"
                                        onclick="deleteBtn(<?= $c['id'] ?>, '<?= $c['title'] ?>')">
                                    Удалить
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <script>
                function deleteBtn(id, title) {
                    if (confirm('Удалить ' + title + '?')) {
                        document.location.href = "/?model=category&action=delete&id=" + id
                    }
                }
            </script>
        </section>
    </div>
<?php include_once __DIR__ . "/../footer.php"; ?>