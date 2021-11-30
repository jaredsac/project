<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BestellingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$medewerkerlist = ArrayHelper::map($medewerkers, 'id', 'naam');
$Menulist = ArrayHelper::map($menus, 'id', 'naam');

$this->title = 'Bestellingen';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bestelling-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Maak Bestelling', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); 
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'naam',
            [
                'attribute' => 'medewerker_id',
                'label'     => 'Medewerker',
                'filter'    => $medewerkerlist,
                'value'     => 'medewerker.naam'
            ],
            [
                'attribute' => 'menu_id',
                'label'     => 'Menu',
                'filter'    => $Menulist,
                'value'     => 'menu.naam'
            ],
            'status',
            //'timestamp',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>