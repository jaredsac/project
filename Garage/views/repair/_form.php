<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Repair */
/* @var $form yii\widgets\ActiveForm */

use yii\helpers\ArrayHelper;

$appointmentList = ArrayHelper::map($appointments, 'id', 'name');
$partList = ArrayHelper::map($parts, 'id', 'name');
?>

<div class="repair-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'appointment_id')->dropDownList($appointmentList, ['prompt' => ''])->label('Appointment') ?>


    <?= $form->field($model, 'part_id')->dropDownList($partList, ['prompt' => ''])->label('Part') ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>