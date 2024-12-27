<?php

namespace app\models;

use yii\db\ActiveRecord;
use \yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    public $id;
    public $username;
    public $password;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        // Especifica el nombre de la tabla en la base de datos
        return 'USUARIOS';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        // Busca un usuario por su ID
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Si no usas el authKey o el accessToken, esta función se puede omitir o modificar según lo que necesites
        return null;
    }

    /**
     * Encuentra un usuario por su nombre de usuario
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // Busca un usuario por su nombre de usuario (sin distinción de mayúsculas)
        return static::findOne(['NombreUsuario' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Aquí ya no necesitas un authKey, así que podemos omitir este método
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * Aquí ya no validamos un authKey, así que podemos omitir este método
     */
    public function validateAuthKey($authKey)
    {
        return false;
    }

    /**
     * Valida la contraseña
     *
     * @param string $password
     * @return bool si la contraseña proporcionada es válida para el usuario actual
     */
    public function validatePassword($password)
    {
        // Asegúrate de que la contraseña almacenada esté correctamente cifrada y usa la misma técnica de cifrado que para almacenar las contraseñas.
        return $this->Contrasenia === $password;
    }
}
