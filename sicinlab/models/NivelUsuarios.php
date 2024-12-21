<?php

namespace app\models;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;

use Yii;

/**
 * Este es la clase modelo para la tabla "NIVELUSUARIOS".
 *
 * @property int $Matricula
 * @property string $Nombre
 */
class NivelUsuarios extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'NIVELUSUARIOS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdNivelUsuario', 'NombreNivel'],'required'],
            [['IdNivelUsuario'], 'integer'],
            [['NombreNivel'], 'string', 'max' => 20],
        ];
    }

    /**
     * @return array
     * Obtiene las opciones de nivel de usuario como un array para los radio buttons.
     */
    public static function getNivelUsuarioOptions()
    {
        // Recuperamos todos los registros de la tabla NIVELUSUARIOS
        $niveles = self::find()->select(['IdNivelUsuario', 'NombreNivel'])->asArray()->all();

        // Convertimos los resultados en un array para los radio buttons
        $options = [];
        foreach ($niveles as $nivel) {
            $options[$nivel['IdNivelUsuario']] = $nivel['NombreNivel'];
        }

        return $options;
    }

     /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdNivelUsuario' => 'Id Nivel de Usuario',
            'NombreNivel' => 'Nombre del Nivel',
        ];
    }
}
