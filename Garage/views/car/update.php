<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Car */

$this->title = 'Update Car: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="car-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'customers' => $customers,
    ]) ?>

</div>
