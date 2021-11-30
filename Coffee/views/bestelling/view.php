<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bestelling */


$this->title = 'Bestelling van '    . $model->naam;
$this->params['breadcrumbs'][] = ['label' => 'Bestelling', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bestelling-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Bijwerken', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Verwijderen', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'naam',
            [
                'attribute' => 'medewerker_id',
                'label'     => 'Medewerker',
                'value'     => function ($data) {
                    return $data->medewerker->naam;
                }
            ],
            [
                'attribute' => 'menu_id',
                'label'     => 'Menu',
                'value'     => function ($data) {
                    return $data->menu->naam;
                }
            ],
            'status',
            'timestamp',
        ],
    ]) ?>

</div>