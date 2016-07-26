<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "clientes".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellidos
 * @property string $fechaNacimiento
 * @property string $direccion
 * @property string $telefono
 *
 * @property Prestamos[] $prestamos
 */
class Clientes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clientes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fechaNacimiento'], 'safe'],
            [['nombre', 'apellidos', 'direccion', 'telefono'], 'string', 'max' => 255],
             [['nombre', 'apellidos', 'fechaNacimiento', 'direccion', 'telefono'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellidos' => Yii::t('app', 'Apellidos'),
            'fechaNacimiento' => Yii::t('app', 'Fecha Nacimiento'),
            'direccion' => Yii::t('app', 'Direccion'),
            'telefono' => Yii::t('app', 'Telefono'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::className(), ['idCliente' => 'id']);
    }
}
