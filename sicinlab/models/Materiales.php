<?php

namespace app\models;

use Yii;

/**
 * Este es la clase modelo para la tabla "MATERIALES".
 *
 * @property int $IdMaterial
 * @property string $Nombre
 * @property int $Capacidad
 * @property int $Cantidad
 * @property string $Marca
 * @property int $IdUnidad
 */
class Materiales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'MATERIALES';
    }

    /**
     * Relación con el modelo "UNIDADES".
     * Esto devuelve el modelo "UNIDADES" asociado a MATERIALES.
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
            [['Nombre', 'Capacidad', 'IdUnidad', 'Cantidad', 'Marca'], 'required'],
            [['Nombre'], 'string', 'max' => 50],
            [['Capacidad'], 'integer'],
            [['IdUnidad'], 'integer'],
            [['Cantidad'], 'integer'],
            [['Marca'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMaterial' => 'Id Material',
            'Nombre' => 'Nombre del Material',
            'Capacidad' => 'Capacidad',
            'IdUnidad' => 'Unidad de medida',
            'Cantidad' => 'Cantidad',
            'Marca' => 'Marca',
        ];
    }
}
