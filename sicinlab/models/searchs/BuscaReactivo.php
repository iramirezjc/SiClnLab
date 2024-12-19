<?php

namespace app\models\searchs;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Reactivos;

/**
 * BuscaReactivo represents the model behind the search form of `app\models\Reactivos`.
 */
class BuscaReactivo extends Reactivos
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Nombre'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // gestionar los escenarios del modelo buscar reactivo
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
        $query = Reactivos::find();

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

        //solo filtra el nombre
        $query->andFilterWhere(['like', 'Nombre', $this->Nombre]);

        return $dataProvider;
    }
}
