<?php

namespace app\models;


use yii\base\Model;

class QuarterForm extends Model
{  
    public $quarter;
    public $minCount;
    public function rules()
    {
        return [
            ['quarter', 'safe'],
        ['minCount','safe'],
        ];
           
    }
 }