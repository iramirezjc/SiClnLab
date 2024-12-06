<?php
namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Equipos;

class EquiposController extends Controller
{
    public function actionIndex()
    {
        $equipos = Equipos::find()->orderBy('Nombre')->all();

        return $this->render('index', [
            'equipos' => $equipos,
        ]);  
        /*
       $query = Equipos::find();

        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $query->count(),
        ]);

        $equipos = $query->orderBy('Nombre')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'equipos' => $equipos,
            'pagination' => $pagination,
        ]);*/
    }
}
?>