<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "prestamos".
 *
 * @property integer $id
 * @property integer $idLibro
 * @property integer $idCliente
 * @property string $fechaPrestamo
 *
 * @property Clientes $idCliente0
 * @property Libros $idLibro0
 */
class Prestamos extends \yii\db\ActiveRecord
{
    public $nombre;
    public $status; 
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'prestamos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idLibro', 'idCliente'], 'integer'],
            [['nombre','status','nombre','fechaPrestamo'], 'safe'],
            [['idCliente'], 'exist', 'skipOnError' => true, 'targetClass' => Clientes::className(), 'targetAttribute' => ['idCliente' => 'id']],
            [['idLibro'], 'exist', 'skipOnError' => true, 'targetClass' => Libros::className(), 'targetAttribute' => ['idLibro' => 'id']],
             [['idCliente', 'idLibro', 'fechaPrestamo'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'idLibro' => Yii::t('app', 'Id Libro'),
            'idCliente' => Yii::t('app', 'Id Cliente'),
            'fechaPrestamo' => Yii::t('app', 'Fecha Prestamo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCliente0()
    {
        return $this->hasOne(Clientes::className(), ['id' => 'idCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdLibro0()
    {
        return $this->hasOne(Libros::className(), ['id' => 'idLibro']);
    }
}
