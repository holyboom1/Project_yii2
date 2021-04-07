<?php

use common\models\BrandBox;
use common\widgets\tables\CrudTable;
use common\models\Navigation;


$this->title = 'Бренды';

?>

<div class="header__box">
    <div class="header__item">
        <nav class="header__nav nav">
            <?php
            echo CrudTable::widget([
                'ListURL' => '/brand_box',
                'className' => 'common\models\BrandBox',
                'Coloumns' => [
                    ['id', '{id}'],
                    ['code', '{code}'],
                ],
                'Fields' => [
                    ['code', 'input'],
                ],
                'sortBy' => 'order',
                'orderButton' => true,
            ]);
            ?>
        </nav>
        <button type="button" class="header-menu js-nav-mob-link"></button>
    </div>
</div>



