<?php

use common\models\Services;
use common\widgets\tables\CrudTable;


$this->title = 'Feedback';
?>
<div class="site-index">
    <div class="body-content">
        <?php

        echo CrudTable::widget([
            'ListURL' => '/feedback',
            'className' => 'common\models\Feedback',
            'Coloumns' => [
                ['id', '{id}'],
                ['name', '{name}'],
                ['email', '{email}'],
                ['text', '{text}'],
                ['tel', '{tel}'],

            ],
            "sortBy" => 'id',


            'editButton' => false,
            'addButton' => false,
            'deleteButton' => true,
        ]);
        ?>
    </div>
</div>