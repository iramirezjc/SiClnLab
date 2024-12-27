<?php

namespace app\models;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;

use Yii;

/**
 * Este es la clase modelo para la tabla "USUARIOS".
 *
 * @property int $Matricula
 * @property string $Nombre
 * @property string $Apellido
 * @property string $Contrasenia
 * @property string $FechaNacimiento
 * @property string $Telefono
 * @property int $IdNivelUsuario
 * @property string $NombreUsuario
 */
class Usuarios extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'USUARIOS';
    }

    /**
     * Relación con el modelo "NIVELUSUARIOS".
     * Esto devuelve el modelo "NIVELUSUARIOS" asociado a USUARIOS.
     */
    public function getNivelUsuario()
    {
        return $this->hasOne(NivelUsuarios::class, ['IdNivelUsuario' => 'IdNivelUsuario']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                [
                    'Matricula', 'Nombre', 'Apellido', 'Contrasenia', 
                    'FechaNacimiento', 'Telefono', 'IdNivelUsuario', 'NombreUsuario'
                ],
                 'required'
            ],
            [['Matricula'], 'integer'],
            [['Nombre'], 'string', 'max' => 100],
            [['Apellido'], 'string', 'max' => 100],
            [['Contrasenia'], 'string', 'max' => 45],
            [['FechaNacimiento'], 'string', 'max' => 10],
            [['Telefono'], 'string', 'max' => 20],
            [['IdNivelUsuario'], 'integer'],
            [['NombreUsuario'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Matricula' => 'Matricula', 
            'Nombre' => 'Nombre(s)', 
            'Apellido' => 'Apellido(s)', 
            'Contrasenia' => 'Contraseña', 
            'FechaNacimiento' => 'Fecha de Nacimiento', 
            'Telefono' => 'Teléfono', 
            'IdNivelUsuario' => 'Nivel de Usuario', 
            'NombreUsuario' => 'Usuario',
        ];
    }
}
