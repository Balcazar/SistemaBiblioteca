<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Libros */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="libros-form">

    <?php $form = ActiveForm::begin(); ?>
   
    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'autor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'categoria')->textInput(['maxlength' => true]) ?>
        
    <?= $form->field($model, 'sinopsis')->textarea(['rows' => 6]) ?>
        
    <?= $form->field($model, 'imgFile')->fileInput(['maxlength' => true]) ?>
       
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
