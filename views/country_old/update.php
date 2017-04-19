<?php
use yii\helpers\Html;
?>
<h2>Update <?= $model->name; ?></h2>
<?php
echo $this->render('_form', [
        'model' => $model,

    ]) ?>
