<?php
use yii\bootstrap\ActiveForm; 

$this->title='Test e-mail templates';

$form = ActiveForm::begin([
	'id' => 'mailform',
	'options' => ['enctype' => 'multipart/form-data'],
	]);
echo '<table style="width:1000px;">';
echo '<tr>';
echo '<td>'.$form->field($model, 'layout')->dropDownList($model->List['layouts']).'</td>';
echo '<td>'.$form->field($model, 'template')->dropDownList($model->List['templates']).'</td>';
echo '<td>'.$form->field($model,'email')->textInput([]).'</td>';
echo '<td><input type="submit" value="Show / Send"></td>';
echo '</tr>';
echo '</table>';
echo '<table style="width:500px;"><tr><th>Variable</th><th>Equal/Model</th><th>Value/id</th></tr>';
for($i=0;$i<5;$i++){
    echo '<tr>';
    echo '<td>'.$form->field($model,'vars['.$i.']')->textInput([])->label(false).'</td>';
    echo '<td>'.$form->field($model, 'models['.$i.']')->dropDownList($model->List['models'])->label(false).'</td>';
    echo '<td>'.$form->field($model,'values['.$i.']')->textInput([])->label(false).'</td>';
    echo '</tr>';
    }
echo '</table>';
ActiveForm::end();
?>