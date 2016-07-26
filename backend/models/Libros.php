<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "libros".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $autor
 * @property string $categoria
 * @property string $sinopsis
 * @property string $status
 *
 * @property Prestamos[] $prestamos
 */
class Libros extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'libros';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sinopsis'], 'string'],
            [['nombre', 'autor', 'categoria', 'status'], 'string', 'max' => 255],
            [['nombre', 'autor', 'categoria', 'status'], 'required'],
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
            'autor' => Yii::t('app', 'Autor'),
            'categoria' => Yii::t('app', 'Categoria'),
            'sinopsis' => Yii::t('app', 'Sinopsis'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPrestamos()
    {
        return $this->hasMany(Prestamos::className(), ['idLibro' => 'id']);
    }
    
    #----------------subir img
    public $imgFile;

#-------metodo upload
    public function upload($idLibro) {
            if(!$this->imgFile==null){
            if($this->imgFile->saveAs('uploads/'.$idLibro.'.jpg','.png')) {
                return true;
                } 
                else {
                    return false;
                    }
            }
             return false;
      }

}
