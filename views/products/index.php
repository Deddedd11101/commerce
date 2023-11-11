<?php

use yii\grid\GridView;
use yii\helpers\Html;

echo '<h1>Products</h1>';

echo Html::a("Добавить товар", ["add"], ["class"=> "btn btn-info"]);

echo GridView::widget([
  "dataProvider"=> $productsDataProvider,
  'columns'=>[
    '',
    'Unit',
    'Price',
    [
      'attribute' => 'otdel.Name', 
      'label' => 'Otdel', 
  ],
    ['class'=> 'yii\grid\ActionColumn']
  ]
  ]);
?>
