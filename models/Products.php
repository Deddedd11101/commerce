<?php
namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord 
{
    public static function tableName()
{
    return '{{products}}'; 
}

public function getOtdel()
{
  return $this->hasOne(Otdel::className(), ['id' => 'Otdel']); 
}

public function getSale()  
{
  return $this->hasOne(Sales::className(), ['Article' => 'Article']);
}

public function afterSave($insert, $changedAttributes)  
{
  \Yii::info('Product updated'); 
}

public function getOldAttribute($attribute) {
  return isset($this->oldAttributes[$attribute]) ? $this->oldAttributes[$attribute] : null;
}


public function rules() {
  return [
    [['Otdel'], 'integer'],
    [
      ['Name', 'Unit', 'Price'], 'required'
    ],
  ];
}
}