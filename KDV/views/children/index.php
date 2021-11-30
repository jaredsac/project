<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ChildrenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Childrens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="children-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Children', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'First_name',
            'Last_name',
            [
                'label' => 'Geboortedatum',
                'attribute' => 'Day_of_birth',
            ],
            [
                'label' => 'Groep',
                'attribute' => 'team',
                'value' => function($data) {
                    return $data->team->Name;
               }

            ],
            [
                'label' => 'Kleur',
                'attribute' => 'color',
                'value' => function($data) {
                    return $data->team->color;
               }

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>