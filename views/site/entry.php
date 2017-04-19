<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//inizio form
 $form = ActiveForm::begin();
//i campi
echo $form->field($model, 'name');
/*
scrivo nella form un campo input type='text'
associando a questo campo il valore della proprietà
name del model
stessa cosa per email
*/

echo $form->field($model, 'email');

//il pulsante di submit
?>
<div class="form-group">
<?PHP  echo Html::submitButton('Submit',
['class' => 'btn btn-primary']);?>
</div>
<?PHP
ActiveForm::end();
//fine form
?>
