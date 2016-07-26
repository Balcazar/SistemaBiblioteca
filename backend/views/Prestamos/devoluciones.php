<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Libros;
use app\models\Clientes;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\PrestamosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Devoluciones');
$this->params['breadcrumbs'][] = $this->title;
?>
<!--'C:\xampp\htdocs\SisConBic2\backend\views\Prestamos\devoluciones.php'-->
<div class="prestamos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
           <?= Html::a(Yii::t('app', 'Cancel'), ['index'], ['class'=>'btn btn-primary']) ?>
    </p>
 
      <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'idLibro',
            'nombre',
            'status',
['class' => 'yii\grid\ActionColumn']
    ],
 ]); ?>
    
    
</div>

    