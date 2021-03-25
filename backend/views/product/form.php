<?php include_once __DIR__ . "/../header.php"; ?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Добавить Товар</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Домой</a></li>
                            <li class="breadcrumb-item active">Добавить Товар</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card-info">
                <?php
                $errorMessage = MessageService::displayError();
                if (!empty($errorMessage)) :?>
                    <div class="error"><?= $errorMessage ?></div>
                <?php endif; ?>

                <form class="form-horizontal" action="/?model=product&action=save" method="post"
                      enctype="multipart/form-data">
                    <div class="card-body">
                        <input type="hidden" value="<?= $one['id'] ?? '' ?>" name="id">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Заголовок</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $one['title'] ?? '' ?>" name="title" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Фотография</label>
                            <div class="col-sm-10">
                                <input type="file" value="<?= $one['picture'] ?? '' ?>" name="picture"
                                       class="form-control">
                            </div>
                            <?php if (!empty($one['picture'])) { ?>
                                <img src="http://localhost/shop/uploads/products/<?php print $one['picture']; ?>"
                                     style="width: 70px;">
                            <?php } ?>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Пред-просмотр</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $one['preview'] ?? '' ?>" name="preview"
                                       class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Содержание</label>
                            <div class="col-sm-10">
                                <textarea rows="7" name="content"
                                          class="form-control"><?= $one['content'] ?? '' ?></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Цена</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $one['price'] ?? '' ?>" name="price" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Статус</label>
                            <div class="col-sm-10">
                                <input type="text" value="<?= $one['status'] ?? '' ?>" name="status"
                                       class="form-control">
                            </div>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-info" value="Сохранить">
                        </div>
                    </div>
                </form>
            </div>
    </div>
    </section>
    </div>

<?php include_once __DIR__ . "/../footer.php"; ?>