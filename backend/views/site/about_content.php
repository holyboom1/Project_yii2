<?php

use common\models\About_content;
use common\widgets\tables\CrudTable;
use common\models\Blocks;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

$this->title = 'Содержимое Блоков О компании';
?>
<div class="site-index">
    <div class="body-content">
        <?php

        echo CrudTable::widget([
            'ListURL' => '/about_content',
            'className' => 'common\models\About_content',
            'Coloumns' => [
                ['id', '{id}'],
                ['lang', '{lang}'],
                ['text', '{text}'],
            ],
            'Fields' => [
                ['lang', 'SelectOneRequired', About_content::LangList()],
                ['text', 'input'],

            ],
            'Filters' => [
                'lang' => [
                    'type' => 'select',
                    'field' => 'lang',
                    'data' => ['' => 'Все'] + About_content::LangList(),
                ],
            ],
            'addButton' => false,
            'deleteButton' => false,
        ]);
        ?>
    </div>
</div>