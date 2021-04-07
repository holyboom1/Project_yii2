<?php


use common\models\MainSlider;
use common\models\Services;
use common\models\Solutions;
use common\widgets\tables\CrudTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\jui\Slider;

$this->title = 'Блок решения ';
?>
<div class="site-index">
    <div class="body-content">
        <?php

        echo CrudTable::widget([
            'ListURL' => '/solutions',
            'className' => 'common\models\Solutions',
            'Coloumns' => [
                ['id', '{id}'],
                ['lang', '{lang}'],
                ['name', '{name}'],



            ],
            'Fields' => [
                ['lang', 'SelectOneRequired', Solutions::LangList()],
                ['name', 'input'],
                ['sub_name', 'input'],
                ['text_1', 'input'],
                ['text_2', 'input'],
                ['text_3', 'input'],
                ['text_4', 'input'],

            ],
            'Filters' => [
                'lang' => [
                    'type' => 'select',
                    'field' => 'lang',
                    'data' => ['' => 'Все'] + Solutions::LangList(),
                ],
            ],
            'addButton' => false,
            'deleteButton' => false,
        ]);
        ?>
    </div>
</div>