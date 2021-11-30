<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Appointment */

$this->title = 'Update Appointment: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Appointments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="appointment-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cars'  => $cars,
    ]) ?>

</div>
