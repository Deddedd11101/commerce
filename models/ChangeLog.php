<?php

namespace app\models;

use yii\db\ActiveRecord;

class ChangeLog extends ActiveRecord
{
    public static function tableName()
    {
        return 'logs'; // Название таблицы логов
    }

    public function rules()
    {
        return [
            [['date', 'category', 'old_value', 'new_value'], 'required'],
        ];
    }

    // Дополнительно, если ты хочешь задать атрибуты для модели, можно сделать это здесь

    public $id;
    public $date;
    public $category;
    public $old_value;
    public $new_value;
}
