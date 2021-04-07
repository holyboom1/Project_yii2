<?php


use common\models\MainSlider;
use common\widgets\tables\CrudTable;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\jui\Slider;

$this->title = 'Содержимое слайдера';
?>
<div class="site-index">
    <div class="body-content">
        <?php

        echo CrudTable::widget([
            'ListURL' => '/main_slider',
            'className' => 'common\models\MainSlider',
            'Coloumns' => [
                ['id', '{id}'],
                ['lang', '{lang}'],
                ['name', '{name}'],
                ['text', '{text}'],
                ['text_2', '{text_2}'],
                ['text_3', '{text_3}'],


            ],
            'Fields' => [
                ['lang', 'SelectOneRequired', MainSlider::LangList()],
                ['name', 'input'],
                ['text', 'input'],
                ['text_2', 'input'],
                ['text_3', 'input'],
                ['image', 'image', 'uploads\images\image-{id}.jpg'],
                ['image_2', 'image', 'uploads\images\image-{id}.jpg'],
            ],
            'Filters' => [
                'lang' => [
                    'type' => 'select',
                    'field' => 'lang',
                    'data' => ['' => 'Все'] + MainSlider::LangList(),
                ],
            ],
            'addButton' => false,
            'deleteButton' => false,
        ]);
        ?>
    </div>
</div>