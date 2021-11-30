<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bestelling */

$this->title = 'Create Bestelling';
$this->params['breadcrumbs'][] = ['label' => 'Bestellings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bestelling-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'medewerkers'=> $medewerkers,
        'menus' => $menus
    
    ]) ?>

</div>
