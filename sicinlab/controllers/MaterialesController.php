<?php

namespace app\controllers;

use app\models\Materiales;
use app\models\searchs\BuscaMaterial;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaterialesController implementacion del CRUD acciones para Materiales model.
 */
class MaterialesController extends Controller
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
     * Lista todos los Materiales.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BuscaMaterial();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort = false;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Pantalla simple muestra el detalle de Materiales model.
     * @param int $IdMaterial => Id Material
     * @return string
     * @throws NotFoundHttpException si el modelo no es encontrado
     */
    public function actionView($IdMaterial)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdMaterial),
        ]);
    }

    /**
     * Registra un nuevo Material.
     * si la creacion es realizada, el navegador es direccionado a la pagina 'view'.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Materiales();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'IdMaterial' => $model->IdMaterial]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Actualiza Materiales model existetes.
     * Si la actualizacion es realizada, el navegador es direccionado a la pagina view.
     * @param int $IdMaterial Id Material
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionUpdate($IdMaterial)
    {
        $model = $this->findModel($IdMaterial);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMaterial' => $model->IdMaterial]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Elimina un Material Existente.
     * Si la eliminación es realizada, el navegador es direccionado a la pagina index.
     * @param int $IdMaterial Id Material
     * @return \yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionDelete($IdMaterial)
    {
        $this->findModel($IdMaterial)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Busca los equipos, basandose en el valor de la clave primaria.
     * Si el modelo no es encontrado, lanza una excepsion 404 HTTP.
     * @param int $IdMaterial Id Material
     * @return Materiales the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdMaterial)
    {
        if (($model = Materiales::findOne(['IdMaterial' => $IdMaterial])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página solicitada no existe.');
    }
}
