<?php

namespace app\models;


use yii\base\Model;

class ScopeForm extends Model
{  
    public $scope;
    public $symbol;
    public function rules()
    {
        return [
            ['scope' , 'safe'],
            ['symbol' , 'safe']
        ];
           
    }
 }