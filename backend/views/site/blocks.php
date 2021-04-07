<?php

use common\widgets\tables\CrudTable;
use common\models\Blocks;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

$this->title = 'Блоки';
?>
<div class="site-index">
    <div class="body-content">
        <?php

        echo CrudTable::widget([
            'ListURL' => '/blocks',
            'className' => 'common\models\Blocks',
            'Coloumns' => [
                ['id', '{id}'],
                ['lang', '{lang}'],
                ['name', '{name}'],
            ],
            'Fields' => [
                ['name', 'input'],
                ['lang', 'SelectOneRequired', Blocks::LangList()],
                ['type', 'SelectOneRequired', Blocks::TypeList()],
                ['text_2', 'input'],
                ['text_3', 'input'],
                ['text_4', 'input'],
                ['text', 'mediumckeditor'],
                ['image', 'image', 'uploads/Blocks/image-{id}.jpg'],
                ['link', 'input'],
                ['button', 'input'],
            ],
            'Filters' => [
                'lang' => [
                    'type' => 'select',
                    'field' => 'lang',
                    'data' => ['' => 'Все'] + Blocks::LangList(),
                ],
                'type' => [
                    'type' => 'select',
                    'field' => 'type',
                    'data' => ['' => 'Все'] + Blocks::TypeList(),
                ],
            ],
            'addButton' => false,
            'deleteButton' => false,
        ]);
        ?>
    </div>
</div>