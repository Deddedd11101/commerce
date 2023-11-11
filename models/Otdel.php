<?php
namespace app\models;

use yii\db\ActiveRecord;

class Otdel extends ActiveRecord
{
    public function getProducts()
  {
    return $this->hasMany(Products::className(), ['Otdel' => 'id']);
  } 


  
  public function rules() {
    return [
      [
        ['Name', 'fio', 'number'], 'required'
      ],
    ];
}
}