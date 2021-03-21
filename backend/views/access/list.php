<?php include_once __DIR__ . "/../header.php"; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список Ролей</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active">Список Ролей</li>
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
                        <th>Роль</th>
                        <th></th>
                    </thead>
                    <tbody>
<?php foreach ($all as $a) : ?>
                        <tr>
                            <td><?=$a['role']?></td>
                            <td>
                                <a class="btn btn-danger btn-sm"
                                   href="/?model=access&action=delete&access=<?=$a['role']?>">
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