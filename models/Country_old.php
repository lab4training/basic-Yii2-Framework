<?php
namespace app\models;

use yii\db\ActiveRecord;

class Country extends ActiveRecord {

//eventuali proprietà e metodi

public function rules(){

  return [
      [['name', 'code', 'population'], 'required'],
      [['name'], 'string', 'max' => 52],
      [['code'], 'string', 'max' => 3],
      [['population'], 'integer'],
  ];

}

}

?>
