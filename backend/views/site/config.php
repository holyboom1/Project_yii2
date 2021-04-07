<?php
use common\widgets\tables\CrudTable;
use common\models\User;
use common\models\Config;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;

$this->title = 'Параметры и настройки';
$value_type=[1=>'input'];
if(isset($_GET['id'])){
    $one=Config::findOne($_GET['id']);
    if($one && $one->value_type)
        $value_type=Json::decode($one->value_type);
}

?>
<div class="site-index">
    <div class="body-content">
        <a href="/config?phpinfo">PHPinfo</a> | <a href="/config-sendemail">SendEmail</a> | <?=$_SERVER['REMOTE_ADDR'];?> | <?=date("d.m.Y H:i:s",time());?>
        <p>
            <?php

            echo CrudTable::widget([
                'ListURL' => '/config',
                'className' => 'common\models\Config',
                'Coloumns' => [
                    ['id','{id}'],
                    ['key','"<td style=\"\"><a href=?action=edit&id=".{id}.">".{key}."</a></td>"'],
                    ['description','"<td style=\"\"><a href=?action=edit&id=".{id}.">".{description}."</a></td>"'],
                    ['value','{value}'],
                ],
                'Fields' => [
                    ['key','input'],
                    [0=>'value'] + $value_type,
                    ['value_type','input'],
                    ['description','textarea'],
                ],
                'Filters' => [
                    'username' => [
                        'type' => 'text',
                        'field' => 'key',
                    ],
                ],
                'sortBy' => 'key desc',
                'deleteButton' => true,
            ]);
            ?>
    </div>
</div>