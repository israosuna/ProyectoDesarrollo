<?php

/**
 * This is the model class for table "nota".
 *
 * The followings are the available columns in table 'nota':
 * @property integer $id_nota
 * @property integer $id_libreta
 * @property string $titulo
 * @property string $contenido
 *
 * The followings are the available model relations:
 * @property Etiqueta[] $etiquetas
 * @property Libreta $idLibreta
 * @property ArchivoAdjunto[] $archivoAdjuntos
 */
class Nota extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Nota the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'nota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_nota, id_libreta', 'required'),
			array('id_nota, id_libreta', 'numerical', 'integerOnly'=>true),
			array('titulo, contenido', 'length', 'max'=>30),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_nota, id_libreta, titulo, contenido', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'etiquetas' => array(self::MANY_MANY, 'Etiqueta', 'etiqueta_nota(id_nota, id_etiqueta)'),
			'idLibreta' => array(self::BELONGS_TO, 'Libreta', 'id_libreta'),
			'archivoAdjuntos' => array(self::MANY_MANY, 'ArchivoAdjunto', 'nota_adjunto(id_nota, id_adjunto)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_nota' => 'Id Nota',
			'id_libreta' => 'Id Libreta',
			'titulo' => 'Titulo',
			'contenido' => 'Contenido',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_nota',$this->id_nota);
		$criteria->compare('id_libreta',$this->id_libreta);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('contenido',$this->contenido,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}