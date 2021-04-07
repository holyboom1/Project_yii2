<?php
use adminlte\widgets\Menu;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\AdminMenu;

$items=AdminMenu::ItemsForWidget();

?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?=
        Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' =>  $items,
                ]
        )
        ?>

    </section>
    <!-- /.sidebar -->
</aside>
