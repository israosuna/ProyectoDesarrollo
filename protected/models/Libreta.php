<?php

/**
 * This is the model class for table "libreta".
 *
 * The followings are the available columns in table 'libreta':
 * @property integer $id_libreta
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $fecha
 *
 * The followings are the available model relations:
 * @property Usuario $idUsuario
 * @property Nota[] $notas
 */
class Libreta extends CActiveRecord
{
	/**
         * Regresa un arreglo  con las libretas que tiene el usuario disponible
         */
    
        public function getArray($find=''){
            
            $libretas;
            
            if ($find) {
            
                $libretas=self::model()->findAll($find);
                
            }
            else{
                
                $libretas=  self::model()->findAll();
            }
            $ret= array();
            foreach ($libretas as $libreta){
                
                $ret[$libreta->id_libreta]=$libreta->nombre;
                
                
            }
        
            return $ret;
        }

        /**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Libreta the static model class
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
		return 'libreta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_usuario', 'required'),
			array('id_libreta, id_usuario', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>30),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_libreta, id_usuario, nombre, fecha', 'safe', 'on'=>'search'),
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
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'id_usuario'),
			'notas' => array(self::HAS_MANY, 'Nota', 'id_libreta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_libreta' => 'Id Libreta',
			'id_usuario' => 'Id Usuario',
			'nombre' => 'Nombre',
			'fecha' => 'Fecha',
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

		$criteria->compare('id_libreta',$this->id_libreta);
		$criteria->compare('id_usuario',$this->id_usuario);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fecha',$this->fecha,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}