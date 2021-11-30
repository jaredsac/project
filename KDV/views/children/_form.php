<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Children */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="children-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'First_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Day_of_birth')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
