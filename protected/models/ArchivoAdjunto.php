<?php

/**
 * This is the model class for table "archivo_adjunto".
 *
 * The followings are the available columns in table 'archivo_adjunto':
 * @property integer $id_adjunto
 * @property string $ruta_archivo
 * @property string $extension
 * @property string $nombre_archivo
 *
 * The followings are the available model relations:
 * @property Nota[] $notas
 */
class ArchivoAdjunto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ArchivoAdjunto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public $file;
        public static $autoload=FALSE;

        /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'archivo_adjunto';
	}

	
        /**
         *Funcion para subir el archivo de dropbox. 
         */
         public function subirArchivo($filepath,$userdata)
         {
             $nota= Nota::model()->findByPk($userdata);
             $tokens=  unserialize($nota->libreta->usuario->token);
                // $tokens = Yii::app()->user->getState('tokens');

        if(!self::$autoload){
        spl_autoload_unregister(array('YiiBase', 'autoload'));
        $dropbox = Yii::getPathOfAlias('ext.dropbox');
        include ( $dropbox . DIRECTORY_SEPARATOR . 'autoload.php');
        
        }
        try {
            $oauth = new Dropbox_OAuth_Curl(consumerKey, consumerSecret);
            $oauth->setToken($tokens);

            $dropbox = new Dropbox_API($oauth);
                $dropbox->putFile($filepath,dirname(__FILE__).'/../../'.$filepath);
                


            $info = $dropbox->getMetaData('/');
        } catch (Exception $e) {
            $error = "error: " . $e->getMessage();
            echo $error;
           // $this->redirect('dropbox/Authorize');
        }

        if(!self::$autoload)
        spl_autoload_register(array('YiiBase', 'autoload'));
        
        self::$autoload=true;
        
        chmod(dirname(__FILE__).'/../../'.$filepath, 0777);
        @unlink(dirname(__FILE__).'/../../'.$filepath);
        // Guardado de la ruta del archivo en la base de datos.
        $archivoAdjunto= new ArchivoAdjunto();
        $archivoAdjunto->ruta_archivo= $filepath;
        $archivoAdjunto->extension= substr($filepath,  stripos($filepath,'.'));
        $archivoAdjunto->nombre_archivo= substr($filepath, stripos($filepath,'/')+1);
        $archivoAdjunto->save();
        
        // Aqui guardo en la tabla M-N.
        
        $relacion = new nota_adjunto();
        $relacion->id_nota= $nota->id_nota;
        $relacion->id_adjunto= $archivoAdjunto->id_adjunto;
        $relacion->save();
        
               return TRUE;
         }
        
        
        /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_adjunto', 'numerical', 'integerOnly'=>true),
			array('ruta_archivo, extension, nombre_archivo', 'length', 'max'=>300),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_adjunto, ruta_archivo, extension, nombre_archivo', 'safe', 'on'=>'search'),
                       // array('file','file','types'=>'jpg, gif, png'),
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
			'notas' => array(self::MANY_MANY, 'Nota', 'nota_adjunto(id_adjunto, id_nota)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_adjunto' => 'Id Adjunto',
			'ruta_archivo' => 'Ruta Archivo',
			'extension' => 'Extension',
			'nombre_archivo' => 'Nombre Archivo',
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

		$criteria->compare('id_adjunto',$this->id_adjunto);
		$criteria->compare('ruta_archivo',$this->ruta_archivo,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('nombre_archivo',$this->nombre_archivo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}