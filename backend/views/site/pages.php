<?php
use common\widgets\tables\CrudTable;
use common\models\User;
use yii\helpers\ArrayHelper;

$this->title = 'Текстовые страницы';
?>
<div class="site-index">
    <div class="body-content">
      <?php

      echo CrudTable::widget([
        'ListURL' => '/pages',
	'className' => 'common\models\Pages',
	'Coloumns' => [
			['id','{id}'],
			['name','"<td style=\"\"><a href=?action=edit&id=".{id}.">".{name}."</a></td>"'],
			],
	'Fields' => [
			['name','input'],
			['content','ckeditor'],
			],
	'Filters' => [
		],
	'UploadPictures' => true,
	'sortBy' => 'name',
      ]);
      ?>
    </div>
</div>