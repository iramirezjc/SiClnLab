<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * Este es la clase modelo para la tabla "REACTIVOS".
 *
 * @property int $IdReactivo
 * @property string $Nombre
 * @property string $Formula
 * @property string $PeligroSalud
 * @property string $PeligroInflamable
 * @property string $PeligroReactividad
 * @property string $PeligroEspecifico
 * @property int $Cantidad
 * @property int $Unidad
 */
class Reactivos extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'REACTIVOS';
    }

    /**
     * Relación con el modelo "UNIDADES".
     * Esto devuelve el modelo "UNIDADES" asociado a REACTIVOS.
     */
    public function getUnidad()
    {
        return $this->hasOne(Unidades::class, ['IdUnidad' => 'IdUnidad']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'Nombre', 'Formula', 'PeligroSalud', 'PeligroInflamable', 
                    'PeligroReactividad', 'PeligroEspecifico', 'Cantidad', 'IdUnidad'
                ], 'required'
            ],
            [['Nombre'], 'string', 'max' => 100],
            [['Formula'], 'string', 'max' => 100],
            [['PeligroSalud'], 'string', 'max' => 1],
            [['PeligroInflamable'], 'string', 'max' => 1],
            [['PeligroReactividad'], 'string', 'max' => 1],
            [['PeligroEspecifico'], 'string', 'max' => 10],
            [['Cantidad'], 'integer'],
            [['IdUnidad'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdReactivo' => 'Id Reactivo',
            'Nombre' => 'Nombre del Reactivo', 
            'Formula' => 'Fórmuna Quimica', 
            'PeligroSalud' => 'Riesgo Salud', 
            'PeligroInflamable' => 'Inflamabilidad', 
            'PeligroReactividad' => 'Reactividad', 
            'PeligroEspecifico' => 'Peligro Especifico', 
            'Cantidad' => 'Cantidad', 
            'IdUnidad' => 'Unidad de Medida',
        ];
    }
}
