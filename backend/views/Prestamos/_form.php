<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use app\models\Libros;
use app\models\Clientes;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="prestamos-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php $libros=ArrayHelper::map(Libros::find()->where(['status'=>'No Prestado'])->all(),'id','nombre'); ?>
    <?php $clientes=ArrayHelper::map(Clientes::find()->all(),'id','nombre'); ?>

    <?= $form->field($model,'idLibro')->dropDownList($libros)?>

    <?= $form->field($model, 'idCliente')->dropDownList($clientes) ?>

     <?= $form->field($model, 'fechaPrestamo')->widget(DatePicker::classname(), [
    'language' => 'es',
    'clientOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd'
    ]
    ]);?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class'=>'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
