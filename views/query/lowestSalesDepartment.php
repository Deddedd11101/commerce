<?php
use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => new \yii\data\ArrayDataProvider([
        'allModels' => [$result],
    ]),
    'columns' => [
        'Otdel',
        'Scope',
    ],
]);