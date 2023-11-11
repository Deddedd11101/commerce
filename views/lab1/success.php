<h1>Лабораторная работа No1</h1>

<?php
use yii\helpers\Html;
?>
<h2>Данные успешно сохранены:</h2>
<p>Компания: <?= Html::encode($model->company) ?></p>
<p>Модель: <?= Html::encode($model->model) ?></p>
<p>Цена: <?= Html::encode($model->price) ?></p>
<p>Отдел: <?= Html::encode($model->department) ?></p>
<a href="javascript:history.back()" class="btn btn-secondary">Назад</a>
 