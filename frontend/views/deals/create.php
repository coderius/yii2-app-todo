<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Deals */

$this->title = Yii::t('messages', 'Create Deals');
$this->params['breadcrumbs'][] = ['label' => Yii::t('messages', 'Deals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deals-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'categoriesDropdown' => $categoriesDropdown,
    ]) ?>

</div>
