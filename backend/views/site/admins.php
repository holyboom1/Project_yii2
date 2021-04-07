<?php
use common\widgets\tables\CrudTable;
use common\models\User;
use yii\helpers\ArrayHelper;

$this->title = 'Администраторы';
?>
<div class="site-index">
    <div class="body-content">
      <?php

      echo CrudTable::widget([
        'ListURL' => '/admins',
	'className' => 'common\models\User',
	'Where' => 'type=0',
	'Coloumns' => [
			['id','{id}'],
			['username','"<td style=\"\"><a href=?action=edit&id=".{id}.">".{username}."</a></td>"'],
			['fio','{fio}'],
			['phone','{phone}'],
			['status','"".common\models\User::StatusList()[{status}].""'],
			],
	'Fields' => [
			['username','input'],
			['password_hash','hash'],
			['type','hidden',0],
			['phone','input'],
			['fio','input'],
			['address','input'],
			['gender','SelectOne',User::GenderList()],
			['datebirth','date'],
			['status','SelectOne',User::StatusList()],
			['created_at','staticdate'],
			],
	'Filters' => [
		'username' => [
			'type' => 'text',
			'field' => 'username',
			],
		],
	'sortBy' => 'created_at desc',
      ]);
      ?>
    </div>
</div>