<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * Este es la clase modelo para la tabla "MOBILIARIO".
 *
 * @property int $IdMobiliario
 * @property string $Nombre
 * @property int $Cantidad
 * @property string $Descripcion
 * @property string $Material
 */
class Mobiliarios extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'MOBILIARIO';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Cantidad', 'Descripcion', 'Material'], 'required'],
            [['Cantidad'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['Descripcion'], 'string', 'max' => 200],
            [['Material'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdMobiliario' => 'Id Mobiliario',
            'Nombre' => 'Nombre del Mueble',
            'Cantidad' => 'Cantidad',
            'Descripcion' => 'Descripción',
            'Material' => 'Material',
        ];
    }
}