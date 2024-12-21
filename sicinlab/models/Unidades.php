<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;

/**
 * Este es la clase modelo para la tabla "UNIDADES".
 *
 * @property int $IdUnidad
 * @property string $Nombre
 */
class Unidades extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'UNIDADES';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdUnidad' => 'Id Unidad',
            'Nombre' => 'Unidad',
        ];
    }
}
