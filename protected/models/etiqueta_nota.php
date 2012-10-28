<?php

/**
 * This is the model class for table "etiqueta_nota".
 *
 * The followings are the available columns in table 'etiqueta_nota':
 * @property integer $id_nota
 * @property integer $id_etiqueta
 */
class etiqueta_nota extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return etiqueta_nota the static model class
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
		return 'etiqueta_nota';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_nota, id_etiqueta', 'required'),
			array('id_nota, id_etiqueta', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_nota, id_etiqueta', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_nota' => 'Id Nota',
			'id_etiqueta' => 'Id Etiqueta',
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

		$criteria->compare('id_etiqueta',$this->id_etiqueta);

		return new CActiveDataProvider('etiqueta_nota', array(
			'criteria'=>$criteria,
		));
	}
}