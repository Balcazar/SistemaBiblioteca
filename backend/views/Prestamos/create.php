<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Prestamos */

$this->title = Yii::t('app', 'Create Prestamos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Prestamos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prestamos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
