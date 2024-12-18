<?php

namespace app\controllers;

use app\models\Mobiliarios;
use app\models\searchs\BuscaMobiliario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MobiliariosController implementacion del CRUD acciones para el modelo Mobiliario.
 */
class MobiliariosController extends Controller
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
     * Lista todos los Muebles.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BuscaMobiliario();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort = false;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Pantalla simple de Equipos model.
     * @param int $IdMobiliario Id Edel Mueble
     * @return string
     * @throws NotFoundHttpException si el modelo no es encontrado
     */
    public function actionView($IdMobiliario)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdMobiliario),
        ]);
    }

    /**
     * Registra un nuevo Mueble.
     * si la creacion es realizada, el navegador es direccionado a la pagina 'view'.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Mobiliarios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'IdMobiliario' => $model->IdMobiliario]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Actualiza Mobliario existete.
     * Si la actualizacion es realizada, el navegador es direccionado a la pagina view.
     * @param int $IdMobiliario Id Mobiliario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionUpdate($IdMobiliario)
    {
        $model = $this->findModel($IdMobiliario);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdMobiliario' => $model->IdMobiliario]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Elimina un equipo Existente.
     * Si la eliminación es realizada, el navegador es direccionado a la pagina index.
     * @param int $IdMobiliario Id Mobiliario
     * @return \yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionDelete($IdMobiliario)
    {
        $this->findModel($IdMobiliario)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Busca los equipos, basandose en el valor de la clave primaria.
     * Si el modelo no es encontrado, lanza una excepsion 404 HTTP.
     * @param int $IdMobiliario Id Mobiliario
     * @return Mobiliarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdMobiliario)
    {
        if (($model = Mobiliarios::findOne(['IdMobiliario' => $IdMobiliario])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página solicitada no existe.');
    }
}
