<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Deals */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('messages', 'Deals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="deals-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('messages', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('messages', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('messages', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'id_category',
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
        ],
    ]) ?>

</div>
