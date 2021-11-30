<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bestelling */
/* @var $form yii\widgets\ActiveForm */

$medewerkerlist = ArrayHelper::map($medewerkers, 'id', 'naam');
$Menulist = ArrayHelper::map($menus, 'id', 'naam');

?>

<div class="bestelling-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'naam')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'medewerker_id')->dropDownList($medewerkerlist) ?>

    <?= $form->field($model, 'menu_id')->dropDownList($Menulist) ?>

    <?= $form->field($model, 'status')->dropDownList(['besteld' => 'Besteld', 'klaar' => 'Klaar', 'geleverd' => 'Geleverd', '' => '',], ['prompt' => '']) ?>

    <?= $form->field($model, 'timestamp')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>