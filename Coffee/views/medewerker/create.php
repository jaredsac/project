<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Medewerker */

$this->title = 'Create Medewerker';
$this->params['breadcrumbs'][] = ['label' => 'Medewerkers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="medewerker-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
