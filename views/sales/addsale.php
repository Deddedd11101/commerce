<?php
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;



$form = ActiveForm::begin([
    'id' => 'login-form',
    'options' => ['class' => 'form-horizontal'],
]) ?>
    <?=$form->field($sales, 'Article')->dropdownList(
    ArrayHelper::map($products, 'Article', 'Name'),
    ['prompt' => 'Выберите товар']
) ?>
    <?= $form->field($sales, 'Date') ?>
    <?= $form->field($sales, 'Count') ?>
   
    

    <div class="form-group">
        <div class="col-lg-offset-1 col-lg-11">
            <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>