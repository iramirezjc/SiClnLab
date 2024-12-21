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
class Usuarios extends ActiveRecord implements IdentityInterface
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
            'NombreUsuario' => 'Nombre de Usuario',
        ];
    }

    /**
     * // Busca el usuario por Matricula
     * {@inheritdoc}
     */
    public static function findIdentity($Matricula)
    {
        return static::findOne($Matricula);
    }

    /**
     * Busca el usuario por nombre de usuario
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($NombreUsuario)
    {
        return static::findOne(['NombreUsuario' => $NombreUsuario]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->Matricula;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Si el campo "accessToken" está en tu tabla, lo usas para buscar
        return static::findOne(['accessToken' => $token]);
    }

     /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Valida la contraseña del usuario
     *
     * @param string $Contrasenia
     * @return bool
     */
    public function validatePassword($Contrasenia)
    {
        // Verifica que la contraseña coincida con la guardada en la base de datos
        return $this->Contrasenia === $Contrasenia;
    }
}
