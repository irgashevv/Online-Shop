<?php
    include_once __DIR__ . "/../main_header.php";
?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Заказы</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Заказы</li>
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
                        <th>ID польз</th>
                        <th>Итого</th>
                        <th>Оплата</th>
                        <th>Доставка</th>
                        <th>Имя</th>
                        <th>Тел</th>
                        <th>Почта</th>
                        <th>Статус</th>
                        <th>Создание</th>
                        <th>Обновление</th>
                        <th>Действия</th>
                    </thead>
                    <tbody>
<?php foreach ($all as $n) : ?>
                        <tr>
                            <td><?=$n['id']?></td>
                            <td><?=$n['user_id']?></td>
                            <td><?=$n['total']?></td>
                            <td><?=$n['payment_id']?></td>
                            <td><?=$n['delivery_id']?></td>
                            <td><?=$n['name']?></td>
                            <td><?=$n['phone']?></td>
                            <td><?=$n['email']?></td>
                            <td><?=$n['status']?></td>
                            <td><?=$n['created']?></td>
                            <td><?=$n['updated']?></td>
                            <td>
<!--a class="btn btn-primary btn-sm" href="#">
<i class="fas fa-folder">
</i>
View
</a-->
                                <a class="btn btn-info btn-sm"
                                   href="/index.php?model=order&action=update&id=<?=$n['id']?>"><i class="fas fa-pencil-alt"> </i> Редактировать </a>
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