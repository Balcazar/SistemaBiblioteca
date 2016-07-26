<?php

namespace backend\controllers;

use Yii;
use app\models\Prestamos;
use app\models\search\PrestamosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Libros;

/**
 * PrestamosController implements the CRUD actions for Prestamos model.
 */
class PrestamosController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Prestamos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PrestamosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Prestamos model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Prestamos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Prestamos();

        if ($model->load(Yii::$app->request->post()) ) {
            $this->actionCambiar($model->idLibro);
            $model->save();
            
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Prestamos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    
    
    public function actionCambiar($id)
    {
        $modell=  Libros::findOne($id);
        $model = $this->findModelLibros($id);
        $model-> status="Prestado";
        $model->nombre=$modell->nombre;
        $model->autor=$modell->autor;
        $model->categoria=$modell->categoria;
        $model->sinopsis=$modell->sinopsis;
        $model->save();
    }
    
    protected function findModelLibros($id)
    {
        if (($model = Libros::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * Deletes an existing Prestamos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Prestamos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Prestamos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Prestamos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionDevolver ()
    {
        $searchModel=new PrestamosSearch();
        $dataProvider=$searchModel->prestados(Yii::$app->request->queryParams);
        return $this->render('devoluciones',['searchModel'=>$searchModel,
            'dataProvider'=>$dataProvider]);
    }
}
