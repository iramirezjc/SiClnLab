<?php

namespace app\models;
use \yii\db\ActiveRecord;

use Yii;

/**
 * Este es la clase modelo para la tabla "EQUIPOS".
 *
 * @property int $IdEquipo
 * @property string $Nombre
 * @property int $Cantidad
 * @property string $Descripcion
 * @property string $TipoEquipo
 */
class Equipos extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'EQUIPOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre', 'Cantidad', 'Descripcion', 'TipoEquipo'], 'required'],
            [['Cantidad'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['Descripcion'], 'string', 'max' => 200],
            [['TipoEquipo'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdEquipo' => 'Id Equipo',
            'Nombre' => 'Nombre del Equipo',
            'Cantidad' => 'Cantidad',
            'Descripcion' => 'Descripción',
            'TipoEquipo' => 'Tipo de Equipo',
        ];
    }
}
