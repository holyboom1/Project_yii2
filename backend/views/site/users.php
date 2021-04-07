<?php
use common\widgets\tables\CrudTable;
use common\models\User;
use common\models\Pharmacies;
use common\models\Barcodes;
use yii\helpers\ArrayHelper;

$this->title = 'Пользователи';

?>
<div class="site-index">
    <div class="body-content">
      <?php

      echo CrudTable::widget([
        'ListURL' => '/users',
	'className' => 'common\models\User',
	'Coloumns' => [
			['id','{id}'],
			['username','"<td style=\"\"><a href=?action=edit&id=".{id}.">".{username}."</a></td>"'],
			['fio','{fio}'],
			['phone','{phone}'],
			['type','"".common\models\User::TypeList()[{type}].""'],
			['status','"".common\models\User::StatusList()[{status}].""'],
			],
	'Fields' => [
			['username','input'],
			['password_hash','hash'],
			['email','input'],
			['type','SelectOne',User::TypeList()],
			['phone','input'],
			['fio','input'],
			['address','input'],
//			['id_pharmacy','SelectOne',ArrayHelper::map(Pharmacies::find()->select('id,name')->asArray()->all(),'id','name'),'{type}==3'],
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