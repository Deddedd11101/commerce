<?
use yii\helpers\Html;
?>

<h1>Запросы</h1>

<div class="button-container mb-4">
    <?= Html::a('Объем реализации менее x', ['query/min-sum'], ['class' => 'btn btn-dark']) ?>
</div>

<div class="button-container mb-4">
    <?= Html::a('Самый маленький объем реализации', ['query/lowest-sales-department'], ['class' => 'btn btn-dark']) ?>
</div>

<div class="button-container mb-4">
    <?= Html::a('Менее n продаж в x квартале', ['query/low-sales-first-quarter'], ['class' => 'btn btn-dark']) ?>
</div>

<div class="button-container mb-4">
    <?= Html::a('Товары проданные в x месяце', ['query/current-month-sales'], ['class' => 'btn btn-dark']) ?>
</div>

<div class="button-container mb-4">
    <?= Html::a('Товары проданные в текущем месяце', ['query/september-sales-count'], ['class' => 'btn btn-dark']) ?>
</div>
