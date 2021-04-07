<?php


use common\models\MainSlider;
use common\models\Req;
use common\models\Services;
use common\widgets\tables\CrudTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\jui\Slider;

$this->title = 'Реквезиты ';
?>
<div class="site-index">
    <div class="body-content">
        <?php

        echo CrudTable::widget([
            'ListURL' => '/req',
            'className' => 'common\models\Req',
            'Coloumns' => [
                ['id', '{id}'],
                ['lang', '{lang}'],
                ['name', '{name}'],
                ['ooo', '{ooo}'],
                ['adru', '{adru}'],
                ['adrf', '{adrf}'],
                ['inn', '{inn}'],
                ['dir', '{dir}'],
                ['buh', '{buh}'],
                ['rs', '{rs}'],
                ['email', '{email}'],
                ['tel', '{tel}'],


            ],
            'Fields' => [
                ['lang', 'SelectOneRequired', Req::LangList()],
                ['name', 'input'],
                ['ooo', 'ckeditor'],
                ['adru', 'ckeditor'],
                ['adrf', 'ckeditor'],
                ['inn', 'ckeditor'],
                ['dir', 'input'],
                ['buh', 'input'],
                ['rs', 'ckeditor'],
                ['email', 'input'],
                ['tel', 'input'],
            ],
            'Filters' => [
                'lang' => [
                    'type' => 'select',
                    'field' => 'lang',
                    'data' => ['' => 'Все'] + Req::LangList(),
                ],
            ],
            'addButton' => false,
            'deleteButton' => false,
        ]);
        ?>
    </div>
</div>