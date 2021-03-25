<?php include_once __DIR__ . "/../header.php"; ?>

    <div class="width1024">
        <?php if (empty($items) || !is_array($items)) : ?>
            <div>
                <div><br><br><br></div>
                <p>Корзина Пуста</p>
                <div><br><br><br></div>
            </div>
        <?php else : ?>
            <div id="basket-container" class="body">

                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th class="picture">Picture</th>
                        <th>Title</th>
                        <th class="qty">Quantity</th>
                        <th class="price">Price</th>
                        <th class="Sum">Sum</th>
                        <th class="actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($items as $key => $item) : ?>
                        <tr>
                            <td><?= ++$key ?></td>
                            <td>
                                <a href="/?model=product&action=view&id=<?= $item['product_id'] ?>">
                                    <img style="width: 150px; height: 200px;"
                                         src="http://localhost/shop/uploads/products/<?= $item['product']['picture'] ?>">
                                </a>
                            </td>
                            <td>
                                <a href="/?model=product&action=view&id=<?= $item['product_id'] ?>">
                                    <?= $item['product']['title'] ?>
                                </a>
                            </td>
                            <td>
                                <form action="/?model=basket&action=change" method="post">
                                    <input type="hidden" name="product_id" value="<?= $item['product']['id'] ?>">
                                    <input type="number" name="qty" value="<?= $item['quantity'] ?>">
                                    <input type="submit" value="change">
                                </form>
                            </td>
                            <td><?= $item['product']['price'] ?></td>
                            <td><?= $item['product']['sum'] ?></td>
                            <td>
                                <form action="/?model=basket&action=delete" method="post">
                                    <input type="hidden" name="product_id" value="<?= $item['product']['id'] ?>">
                                    <button>Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan="6" class="total">Total:</td>
                        <td><?= $total ?></td>
                    </tr>
                    </tbody>
                </table>
                <a href="/?model=order&action=index" id="btn-create-order">Create Order</a>

            </div>
        <?php endif; ?>
    </div>

<?php include_once __DIR__ . "/../footer.php"; ?>