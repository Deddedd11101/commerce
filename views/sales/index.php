<?php

use yii\grid\GridView;
use yii\helpers\Html;

echo '<h1>Sales</h1>';

echo Html::a("Добавить продажу", ["add"], ["class"=> "btn btn-info"]);

echo GridView::widget([
  'dataProvider' => $salesDataProvider,
  'columns' => [
    [
      'attribute' => 'products.Name', 
      'label' => 'Name', 
  ],
      'Date',
      'Count',
      ['class'=> 'yii\grid\ActionColumn']
  ]
  ]);