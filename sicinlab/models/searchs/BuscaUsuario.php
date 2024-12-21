<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * BuscaUsuario representa el modelo detras del formulario search de `app\models\Usuarios`.
 */
class BuscaUsuario extends Usuarios
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Matricula'], 'integer'],
            [['Nombre', 'Apellido', 'NombreUsuario',], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // gestionar los escenarios del modelo buscar usuario
        return Model::scenarios();
    }

    /**
     * Crea una instancia data provider con la sentencia search aplicada
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Usuarios::find();

        // agrega las condiciones que siempre deben aplicarse aquí

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        // Si la validación falla, simplemente retornar dato vacío
        if (!$this->validate()) {
            // descomenta la siguiente linea si no quieres retornar cualquier valor cuando la validación falla
            // $query->where('0=1');
            return $dataProvider;
        }

        //filtra la Matricula, el nombre, apellido, y el NombreUsuario
        $query->andFilterWhere([
            'Matricula' => $this->Matricula
        ]);

        $query->andFilterWhere(['like', 'Matricula', $this->Matricula])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellido', $this->Apellido])
            ->andFilterWhere(['like', 'NombreUsuario', $this->NombreUsuario]);

        return $dataProvider;
    }
}