<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medewerker */

$this->title = 'Update Medewerker: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Medewerkers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="medewerker-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
