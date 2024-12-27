<?php

namespace app\controllers;

use app\models\Equipos;
use app\models\searchs\BuscaEquipo;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * EquiposController implementacion del CRUD acciones para Equipos model.
 */
class EquiposController extends Controller
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
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ]
                    ],
                ],
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
     * Lista todos los Equipos.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BuscaEquipo();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort = false;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Pantalla simple de Equipos model.
     * @param int $IdEquipo Id Equipo
     * @return string
     * @throws NotFoundHttpException si el modelo no es encontrado
     */
    public function actionView($IdEquipo)
    {
        return $this->render('view', [
            'model' => $this->findModel($IdEquipo),
        ]);
    }

    /**
     * Registra un nuevo Equipo.
     * si la creacion es realizada, el navegador es direccionado a la pagina 'view'.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Equipos();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'IdEquipo' => $model->IdEquipo]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Actualiza Equipos model existetes.
     * Si la actualizacion es realizada, el navegador es direccionado a la pagina view.
     * @param int $IdEquipo Id Equipo
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionUpdate($IdEquipo)
    {
        $model = $this->findModel($IdEquipo);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'IdEquipo' => $model->IdEquipo]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Elimina un equipo Existente.
     * Si la eliminación es realizada, el navegador es direccionado a la pagina index.
     * @param int $IdEquipo Id Equipo
     * @return \yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionDelete($IdEquipo)
    {
        $this->findModel($IdEquipo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Busca los equipos, basandose en el valor de la clave primaria.
     * Si el modelo no es encontrado, lanza una excepsion 404 HTTP.
     * @param int $IdEquipo Id Equipo
     * @return Equipos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($IdEquipo)
    {
        if (($model = Equipos::findOne(['IdEquipo' => $IdEquipo])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página solicitada no existe.');
    }
}
