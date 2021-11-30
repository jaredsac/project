<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Children */

$this->title = 'Create Children';
$this->params['breadcrumbs'][] = ['label' => 'Childrens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
