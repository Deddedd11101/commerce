<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

// Создайте ActiveForm
$form = ActiveForm::begin();

// Выведите поле для выбора квартала
echo $form->field($model, 'scope')->textInput(['type' => 'number']);
echo $form->field($model, 'symbol')->dropDownList([
   '>'=> '>',
   '<'=> '<',
   '='=> '=',
]);

echo Html::submitButton('Выполнить запрос', ['class' => 'btn btn-primary']);

ActiveForm::end();

if (!empty($result)){
echo GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider([
        'allModels' => $result,
    ]),
    'columns' => [
        'Otdel',
        'Scope',
    ],
]);
}
?>