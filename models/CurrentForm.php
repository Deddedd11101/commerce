<?php

namespace app\models;


use yii\base\Model;

class CurrentForm extends Model
{  
    public $month;
    public function rules()
    {
        return [
            ['month' , 'safe']
        ];
           
    }
 }