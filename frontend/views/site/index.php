<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>


<div class="site-search-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="input-group">
                <?= $form->field($model, "txtSearch", ["template" => "{input}\n{hint}"])->textInput(['maxlength' => true, 'placeholder' => 'Search', 'id' => 'txtSearch']) ?>
                <div class="input-group-btn">
                    <?= Html::submitButton("<span class=\"glyphicon glyphicon-search\"></span>", ['class' => 'btn btn-success']) ?>
                </div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>

<!-- <form action="/hms/accommodations" method="GET">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search" id="txtSearch" />
                <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form> -->