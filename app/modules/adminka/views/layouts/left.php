<aside class="main-sidebar">

    <section class="sidebar">
<?php /*
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
*/ ?>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    [
                        'label' => 'Управление',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Пользователи', 'icon' => 'user-circle', 'url' => ['/adminka/users'],],
                            //['label' => 'Категории', 'icon' => 'dashboard', 'url' => ['/admin/category'],],
                            //['label' => 'Метки', 'icon' => 'dashboard', 'url' => ['/admin/tags'],],
                        ],
                    ],
                    [
                        'label' => 'Новостной раздел',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Публикации', 'icon' => 'file-code-o', 'url' => ['/admin/news'],],
                            ['label' => 'Категории', 'icon' => 'dashboard', 'url' => ['/admin/category'],],
                            ['label' => 'Метки', 'icon' => 'dashboard', 'url' => ['/admin/tags'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>