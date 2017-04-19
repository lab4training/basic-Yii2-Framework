<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

//inizio form
 $form = ActiveForm::begin();
//i campi
echo $form->field($model, 'code');
echo $form->field($model, 'name');
echo $form->field($model, 'population');


//il pulsante di submit
?>
<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ?
          'Create' : 'Update',
          ['class' => $model->isNewRecord ?
          'btn btn-success' : 'btn btn-primary']) ?>
</div>

	<?php ActiveForm::end();
?>
