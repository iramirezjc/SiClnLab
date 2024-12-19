<?php

namespace app\controllers;

use app\models\Reactivos;
use app\models\searchs\BuscaReactivo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialesController implementacion del CRUD acciones para Materiales model.
 */
class ReactivosController extends Controller
{
    /**
     * restriccion para la accion delete, solo por POST
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lista todos los Reactivos.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BuscaReactivo();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort = false;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Pantalla simple muestra el detalle del Modelo Reajctivos.
     * @param int $IdReactivo => Id Reactivo
     * @return string
     * @throws NotFoundHttpException si el modelo no es encontrado
     */
    public function actionView($IdReactivo)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdReactivo),
        ]);
    }

    /**
     * Registra un nuevo Reactivo.
     * si la creacion es realizada, el navegador es direccionado a la pagina 'view'.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Reactivos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'IdReactivo' => $model->IdReactivo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Actualiza Reactivos model existetes.
     * Si la actualizacion es realizada, el navegador es direccionado a la pagina view.
     * @param int $IdReactivo Id Material
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionUpdate($IdReactivo)
    {
        $model = $this->findModel($IdReactivo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdReactivo' => $model->IdReactivo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Elimina un Reactivo Existente.
     * Si la eliminación es realizada, el navegador es direccionado a la pagina index.
     * @param int $IdReactivo Id Reactivo
     * @return \yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionDelete($IdReactivo)
    {
        $this->findModel($IdReactivo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Busca los Reactivos, basandose en el valor de la clave primaria.
     * Si el modelo no es encontrado, lanza una excepsion 404 HTTP.
     * @param int $IdReactivo Id Reactivo
     * @return Materiales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdReactivo)
    {
        if (($model = Reactivos::findOne(['IdReactivo' => $IdReactivo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página solicitada no existe.');
    }
}
