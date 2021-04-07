<?php
use common\widgets\tables\CrudTable;
use yii\helpers\ArrayHelper;

$this->title = 'Меню системы управления';
?>
<div class="site-index">
    <div class="body-content">
<a href="https://fontawesome.com/v4.7.0/icons/" target="_blank">Список иконок</a><br>&nbsp;<br>
      <?php

      echo CrudTable::widget([
        'ListURL' => '/adminmenu',
	'className' => 'common\models\AdminMenu',
	'Coloumns' => [
			['id','{id}'],
			['name','"<td style=\"\"><a href=?action=edit&id=".{id}."><i class=\"fa fa-".{icon}."\"></i>&nbsp;&nbsp;&nbsp;".{name}."</a></td>"'],
			['url','"<a href=\"".{url}."\">".{url}."</a>"'],
			['icon',''],
			],
	'Fields' => [
			['name','input'],
			['url','input'],
			['icon','input'],
			],
	'sortBy' => 'order',
	'orderButton' => true,
      ]);
      ?>
    </div>
</div>