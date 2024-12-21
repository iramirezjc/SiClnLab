<?php

namespace app\controllers;

use app\models\Usuarios;
use app\models\searchs\BuscaUsuario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuariosController implementacion del CRUD acciones para Usuarios model.
 */
class UsuariosController extends Controller
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
     * Lista todos los Usuarios.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BuscaUsuario();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->sort = false;

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Pantalla simple de Usuarios model.
     * @param int $Matricula Matricula usuario
     * @return string
     * @throws NotFoundHttpException si el modelo no es encontrado
     */
    public function actionView($Matricula)
    {
        return $this->render('view', [
            'model' => $this->findModel($Matricula),
        ]);
    }

    /**
     * Registra un nuevo Usuario.
     * si la creacion es realizada, el navegador es direccionado a la pagina 'view'.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Usuarios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'Matricula' => $model->Matricula]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Actualiza Usuarios model existetes.
     * Si la actualizacion es realizada, el navegador es direccionado a la pagina view.
     * @param int $Matricula matricula del usuario
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionUpdate($Matricula)
    {
        $model = $this->findModel($Matricula);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'Matricula' => $model->Matricula]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Elimina un Usuario Existente.
     * Si la eliminación es realizada, el navegador es direccionado a la pagina index.
     * @param int $Matricula matricula del usuario
     * @return \yii\web\Response
     * @throws NotFoundHttpException Si el modelo no es encontrado.
     */
    public function actionDelete($Matricula)
    {
        $this->findModel($Matricula)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Busca los Usuarios, basandose en el valor de la clave primaria.
     * Si el modelo no es encontrado, lanza una excepsion 404 HTTP.
     * @param int $Matricula matricula del usuario
     * @return Usuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($Matricula)
    {
        if (($model = Usuarios::findOne(['Matricula' => $Matricula])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página solicitada no existe.');
    }
}
