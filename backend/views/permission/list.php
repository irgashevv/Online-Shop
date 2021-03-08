<?php include_once __DIR__ . "/../header.php"; ?>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Список Разрешений</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/">Главная</a></li>
                        <li class="breadcrumb-item active">Список Разрешений</li>
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
                        <th>Разрешение:</th>
                        <th></th>
                    </thead>
                    <tbody>
<?php foreach ($all as $p) : ?>
                        <tr>
                            <td><?=$p?></td>
                            <td>
                                <a class="btn btn-danger btn-sm" href="/?model=permission&action=delete&permission=<?=$p?>">
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