<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Appointment */
/* @var $form yii\widgets\ActiveForm */

$carList = ArrayHelper::map($cars, 'id', 'plate');
?>

<div class="appointment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['aangevraagd' => 'Aangevraagd', 'bezig' => 'Bezig', 'voldaan' => 'Voldaan',], ['prompt' => '']) ?>

    <?= $form->field($model, 'car_id')->dropDownList($carList, ['prompt' => ''])->label('Car') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>