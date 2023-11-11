<?php
namespace app\models;

use yii\db\ActiveRecord;

class Sales extends ActiveRecord
{
    public function getProducts()
  {
    return $this->hasOne(Products::className(), ['Article' => 'Article']);
  }

  
  public function rules()
{ return [
  [['Article', 'Date', 'Count'], 'required'],
];
}
}