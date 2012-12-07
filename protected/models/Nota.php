<?php

/**
 * This is the model class for table "Nota".
 *
 * The followings are the available columns in table 'Nota':
 * @property integer $id_nota
 * @property integer $id_libreta
 * @property string $titulo
 * @property string $contenido
 */

class Nota extends CActiveRecord {

    public $hash_etiquetas;

    /**
     * Returns the static model of the specified AR class.
     * @return Nota the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'Nota';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_libreta, titulo', 'required'),
            array('titulo, contenido', 'length', 'max' => 300),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_nota, id_libreta, titulo, contenido', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'etiquetas' => array(self::MANY_MANY, 'Etiqueta', 'etiqueta_nota(id_nota, id_etiqueta)'),
            'etiqueta_nota' => array(self::HAS_MANY, 'etiqueta_nota', 'id_nota'),
            'libreta' => array(self::BELONGS_TO, 'Libreta', 'id_libreta'),
            'archivo_adjuntos' => array(self::MANY_MANY, 'ArchivoAdjunto', 'nota_adjunto(id_nota, id_adjunto)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_nota' => 'Id Nota',
            'id_libreta' => 'Nombre Libreta',
            'titulo' => 'Titulo',
            'contenido' => 'Contenido',
            'hash_etiquetas' => 'Introduzca Etiquetas con # (ejm. #Calculo).'
        );
    }

  public function afterFind(){
      $this->hash_etiquetas='';
            foreach ($this->etiquetas as $etiqueta_nota){
                $this->hash_etiquetas.="#".$etiqueta_nota->nombre.' ';
                
            }
   
    return parent::afterFind();
        }

  /**
  * Metodo que se ejecuta antes de guardar la nota en la Base de datos.
  * @return type 
  */
    public function beforeSave() {

        
        if($this->hash_etiquetas){
            
            $etiquetas= explode('#',  $this->hash_etiquetas );
            
            foreach ($this->etiqueta_nota as $etiqueta_nota){
                
                $etiqueta_nota->delete();
            }
            
            
            foreach ($etiquetas as $etiqueta){
                $etiqueta=  trim($etiqueta);
                
                if(empty($etiqueta))                    continue;
                $model= Etiqueta::model()->find("nombre='$etiqueta'");
                if(!$model){
                    $model= new Etiqueta();
                    $model->nombre= $etiqueta;
                    $model->save();
                }
                $etiqueta_nota= new etiqueta_nota();
                $etiqueta_nota->id_nota= $this->id_nota;
                $etiqueta_nota->id_etiqueta = $model->id_etiqueta;
                $etiqueta_nota->save();
            }
        }
        return parent::beforeSave();
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_nota', $this->id_nota);

        $criteria->compare('id_libreta', $this->id_libreta);

        $criteria->compare('titulo', $this->titulo, true);

        $criteria->compare('contenido', $this->contenido, true);

        return new CActiveDataProvider('Nota', array(
                    'criteria' => $criteria,
                ));
    }

}