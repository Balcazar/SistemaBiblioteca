<?php

namespace app\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Prestamos;

/**
 * PrestamosSearch represents the model behind the search form about `app\models\Prestamos`.
 */
class PrestamosSearch extends Prestamos
{
    public $nombre;
    public $status;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'idLibro', 'idCliente'], 'integer'],
            [['nombre','status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Prestamos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'idLibro' => $this->idLibro,
            'idCliente' => $this->idCliente,
            'fechaPrestamo' => $this->fechaPrestamo,
        ]);

        return $dataProvider;
    }
    
        public function prestados($params)
    {
        $query = Prestamos::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->select(['idLibro','nombre','status','nombre'])->innerJoin('libros','libros.id=prestamos.idLibro')->andFilterWhere([
            'id' => $this->id,
            'idLibro' => $this->idLibro,
            'nombre' => $this->nombre,
            'idCliente' => $this->idCliente,
            'fechaPrestamo' => $this->fechaPrestamo,
            'status'=>'Prestado',
            'nombre' => $this->nombre
        ]);

        return $dataProvider;
    }
}
