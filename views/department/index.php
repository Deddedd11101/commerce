<?php

use yii\grid\GridView;
use yii\helpers\Html;




echo '<h1>Otdel</h1>';

echo Html::a("Добавить отдел", ["add"], ["class"=> "btn btn-info"]);
echo GridView::widget([
  'dataProvider' => $departmentDataProvider,
  'columns' => [
    'Name',
      'fio',
      'number',
      'scope',
      ['class'=> 'yii\grid\ActionColumn']
  ]
])
?>
