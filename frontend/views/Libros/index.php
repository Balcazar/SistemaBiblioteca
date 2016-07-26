<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Libros;
use aa\controllers\LibrosController;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\LibrosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Libros');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Libros'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nombre',
            'autor',
            'categoria',
            'sinopsis:ntext',
            'status',
            
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
