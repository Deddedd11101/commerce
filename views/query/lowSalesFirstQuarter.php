<?php
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

// Создайте ActiveForm
$form = ActiveForm::begin();

// Выведите поле для выбора квартала
echo $form->field($model, 'quarter')->dropDownList([
    1 => '1-й квартал',
    2 => '2-й квартал',
    3 => '3-й квартал',
    4 => '4-й квартал',
]);

// Выведите поле для ввода количества продаж
echo $form->field($model, 'minCount')->textInput(['type' => 'number']);

echo Html::submitButton('Выполнить запрос', ['class' => 'btn btn-primary']);

ActiveForm::end();

// Если есть результаты запроса, выведите их
if (!empty($result)) {
    echo GridView::widget([
        'dataProvider' => new \yii\data\ArrayDataProvider([
            'allModels' => $result,
        ]),
        'columns' => [
            'Otdel',
            'Count',
        ],
    ]);
}
?>
