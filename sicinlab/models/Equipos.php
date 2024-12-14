<?php

namespace app\models;

use Yii;

/**
 * Este es el model class para la table "EQUIPOS".
 *
 * @property int $IdEquipo
 * @property string $Nombre
 * @property int $Cantidad
 * @property string $Descripcion
 * @property string $TipoEquipo
 */
class Equipos extends \yii\db\ActiveRecord
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
            'Nombre' => 'Nombre',
            'Cantidad' => 'Cantidad',
            'Descripcion' => 'Descripcion',
            'TipoEquipo' => 'Tipo Equipo',
        ];
    }
}
