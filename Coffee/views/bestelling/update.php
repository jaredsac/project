<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bestelling */

$this->title = 'Update Bestelling: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Bestellings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bestelling-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'medewerkers' => $medewerkers,
        'menus' => $menus
    ]) ?>

</div>