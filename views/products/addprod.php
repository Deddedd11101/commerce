<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?= $form->field($products, 'Name') ?>
    <?= $form->field($products, 'Unit') ?>
    <?= $form->field($products, 'Price') ?>
    <?= $form->field($products, 'Otdel')->dropdownList(
  ArrayHelper::map($departments, 'id', 'Name'), // отображаем названия
) ?>
    

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>