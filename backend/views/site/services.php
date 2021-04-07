<?php


use common\models\MainSlider;
use common\models\Services;
use common\widgets\tables\CrudTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\jui\Slider;

$this->title = 'Блок услуги ';
?>
<div class="site-index">
    <div class="body-content">
        <?php

        echo CrudTable::widget([
            'ListURL' => '/services',
            'className' => 'common\models\Services',
            'Coloumns' => [
                ['id', '{id}'],
                ['lang', '{lang}'],
                ['name', '{name}'],



            ],
            'Fields' => [
                ['lang', 'SelectOneRequired', Services::LangList()],
                ['name', 'input'],
                ['text_1', 'input'],
                ['text_2', 'input'],
                ['text_3', 'input'],
                ['text_4', 'input'],
                ['text_5', 'input'],
                ['text_6', 'input'],
            ],
            'Filters' => [
                'lang' => [
                    'type' => 'select',
                    'field' => 'lang',
                    'data' => ['' => 'Все'] + Services::LangList(),
                ],
            ],
            'addButton' => false,
            'deleteButton' => false,
        ]);
        ?>
    </div>
</div>