<?php


use common\models\Equipment;
use common\models\MainSlider;
use common\models\Req;
use common\models\Services;
use common\widgets\tables\CrudTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\jui\Slider;

$this->title = 'оборудование ';
?>
<div class="site-index">
    <div class="body-content">
        <?php

        echo CrudTable::widget([
            'ListURL' => '/equipment',
            'className' => 'common\models\Equipment',
            'Coloumns' => [
                ['id', '{id}'],
                ['lang', '{lang}'],
                ['main_name', '{main_name}'],
                ['name', '{name}'],
                ['text_1', '{text_1}'],
                ['text_2', '{text_2}'],
                ['text_3', '{text_3}'],
                ['text_4', '{text_4}'],
                ['text_5', '{text_5}'],



            ],
            'Fields' => [
                ['lang', 'SelectOneRequired', Equipment::LangList()],
                ['main_name', 'hidden', 'Поставка оборудования и ПО'],
                ['name', 'input' ],
                ['text_1', 'input'],
                ['text_2', 'input'],
                ['text_3', 'input'],
                ['text_4', 'input'],
                ['text_5', 'input'],
            ],
            'Filters' => [
                'lang' => [
                    'type' => 'select',
                    'field' => 'lang',
                    'data' => ['' => 'Все'] + Equipment::LangList(),
                ],
            ],
//            'addButton' => true,
            'deleteButton' => true,
        ]);
        ?>
    </div>
</div>