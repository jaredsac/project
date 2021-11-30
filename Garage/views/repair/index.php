<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RepairSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repairs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repair-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Repair', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'appointment_id',
                'label'     => 'Appointment',
                'value'     => 'appointment.name'
            ],
            [
                'attribute' => 'part_id',
                'label'     => 'Part',
                'value'     => 'part.name'
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>