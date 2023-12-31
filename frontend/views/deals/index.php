<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DealsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('messages', 'Deals');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deals-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('messages', 'Create Deals'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'attribute' => 'category',
                'label' => Yii::t('messages', 'Category'),
                'value'     => function ( $data ) {
                    return $data->category->name;
                },
            ],
            [
                'attribute' => 'created_at',
                'label' => Yii::t('messages', 'Created At'),
                'value'     => function ( $data ) {
                    return Yii::$app->formatter->asDatetime( $data->created_at, 'dd.MM.y HH:mm:ss' );
                },
            ],
            [
                'attribute' => 'updated_at',
                'label' => Yii::t('messages', 'Updated At'),
                'value'     => function ( $data ) {
                    return Yii::$app->formatter->asDatetime( $data->created_at, 'dd.MM.y HH:mm:ss' );
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
