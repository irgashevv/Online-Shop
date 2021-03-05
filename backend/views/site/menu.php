<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item">
            <a href="/index.php?model=product&action=read" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Товары
                    <i class="fas fa-angle-left right">
                    </i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/index.php?model=product&action=create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Добавление Товара
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/index.php?model=product&action=read" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Список Товаров
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/index.php?model=category&action=read" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Категории
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/index.php?model=category&action=create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Дабовление Категории
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/index.php?model=category&action=read" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Список Категории
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/index.php?model=shop&action=read" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Магазины
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/index.php?model=shop&action=create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Дабовление Магазина
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/index.php?model=shop&action=read" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Список Магазинов
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/index.php?model=news&action=read" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Новости
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/index.php?model=news&action=create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Дабовление Новостей
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/index.php?model=news&action=read" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Список Новостей
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/index.php?model=order&action=read" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Orders
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/index.php?model=order&action=create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Create Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/index.php?model=order&action=read" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Order List
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/index.php?model=access&action=update" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Access
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/?model=access&action=update" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Manage Access
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/?model=permission&action=read" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Permission
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/?model=permission&action=create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Create Permission
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/?model=permission&action=read" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Permission List
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/?model=payment&action=read" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Payment
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/?model=payment&action=create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Create Payment
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/?model=payment&action=read" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Payment List
                        </p>
                    </a>
                </li>
            </ul>
        </li>

        <li class="nav-item">
            <a href="/?model=delivery&action=read" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                    Delivery
                    <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="/?model=delivery&action=create" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Create Delivery
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/?model=delivery&action=read" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                            Delivery List
                        </p>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>