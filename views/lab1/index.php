<h1>Лабораторная работа No1</h1>

<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'company')->label('Компания') ?>

<?= $form->field($model, 'model')->label('Модель') ?>

<?= $form->field($model, 'price')->input('number')->label('Цена') ?>

<?= $form->field($model, 'department')->dropDownList([1 => 'Мобильные телефоны', 2 => 'Ноутбуки', 3 => 'Бытовая техника'])->label('Отдел') ?>

<?= Html::submitButton('save', ['class' => 'btn btn-primary'])?>

<?php ActiveForm::end(); ?> 