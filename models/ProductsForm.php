<?php

namespace app\models;


use yii\base\Model;

class ProductsForm extends Model
{   
    public $company;
    public $model;
    public $price; 
    public $rostest;
    public $department;
 


    public function rules()
{
  return [
    [['model', 'price', 'company'], 'required', 'message' => 'Заполните поле*'],

    ['model', 'string', 'max' => 255, 'message' => 'Слишком длинное название'],

    ['company', 'string', 'max' => 255, 'message' => 'Слишком длинное название'],
    
    ['price', 'number'],

    ['department', 'safe'],

    ['price', 'compare', 'compareValue' => 500, 'operator' => '>=', 'type' => 'number', 'message' => 'Должно быть не менее 500'],
    
  ];
}
}