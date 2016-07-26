<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Libros;
use app\models\Clientes;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PrestamosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Prestamos');
$this->params['breadcrumbs'][] = $this->title;
?>
<!--'C:\xampp\htdocs\SisConBic2\backend\views\Prestamos\devoluciones.php'-->
<div class="prestamos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Prestamos'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Devoluciones'), ['devolver'], ['class' => 'btn btn-success']) ?>   
    </p>
 
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute'=>'Nombre del Libro',
                'value'=>function ($model){
                  $nombreLibro=Libros::findOne($model->idLibro); 
                  return $nombreLibro->nombre;                  
                },
            ],
            [
                'attribute'=>'Nombre del Cliente',
                'value'=>function ($model){
                  $nombreCliente=Clientes::findOne($model->idCliente); 
                  return $nombreCliente->nombre;                  
                },
            ],
            'fechaPrestamo',

//            ['class' => 'yii\grid\ActionColumn'],
                        
['class' => 'yii\grid\ActionColumn',
    'template' => '{view} {delete}',]
    ],
 ]); ?>
</div>
