<?PHP
use yii\helpers\Html;
?>

<h2><?PHP echo $model['name'];?></h2>

<?= Html::a('Update', ['country/update', 'code' => $model->code],
['class' => 'btn btn-primary']) ?>

<?= Html::a('Delete', ['country/delete', 'code' => $model->code], [
           'class' => 'btn btn-danger',
           'data' => [
               'confirm' => 'Are you sure you want to delete this item?',
               'method' => 'post',
           ],
       ]) ?>
<p>
<ul>
  <li><?PHP echo Html::encode($model['code']);?></li>
  <li><?PHP echo Html::encode($model['name']);?></li>
  <li><?PHP echo Html::encode($model['population']);?></li>
</ul>
</p>
