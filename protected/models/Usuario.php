<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id_usuario
 * @property string $nombre
 * @property string $apellido
 * @property string $usuario
 * @property string $clave
 * @property string $usuario_dropbox
 * @property string $password_dropbox
 * @property string $email
 * @property string $token
 *
 * The followings are the available model relations:
 * @property Libreta[] $libretas
 */
class Usuario extends CActiveRecord {

    public $verifyCode;
    public $clave2;

    /**
     * Metodo que permite obtener la lista de usuario, que trae el id del usuario
     * como el KeyValue  
     */
    public function getArray($find = '') {

        $users;

        if ($find) {

            $users = self::model()->findAll($find);
        } else {

            $users = self::model()->findAll();
        }
        $ret = array();
        foreach ($users as $user) {

            $ret[$user->id_usuario] = $user->nombre . ' ' . $user->apellido;
        }

        return $ret;
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Usuario the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'usuario';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            
            array('usuario', 'unique'),
            array('email', 'email'),
            array('token', 'safe'),
            array('nombre, apellido, usuario, clave, clave2, usuario_dropbox, password_dropbox, email', 'length', 'max' => 30),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id_usuario, nombre, apellido, usuario, clave, usuario_dropbox, password_dropbox, email, token', 'safe', 'on' => 'search'),
            array('verifyCode', 'captcha', 'allowEmpty' => TRUE),
            array('clave2', 'compare', 'compareAttribute' => 'clave'),
            
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'libretas' => array(self::HAS_MANY, 'Libreta', 'id_usuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_usuario' => 'Id Usuario',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'usuario' => 'Usuario',
            'clave' => 'Clave',
            'clave2' => 'Repita Su Password',
            'usuario_dropbox' => 'Usuario Dropbox',
            'password_dropbox' => 'Password Dropbox',
            'email' => 'Email',
            'verifyCode' => 'Verification Code',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_usuario', $this->id_usuario);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('apellido', $this->apellido, true);
        $criteria->compare('usuario', $this->usuario, true);
        $criteria->compare('clave', $this->clave, true);
        $criteria->compare('usuario_dropbox', $this->usuario_dropbox, true);
        $criteria->compare('password_dropbox', $this->password_dropbox, true);
        $criteria->compare('email', $this->email, true);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

    public function exportXML() {
        $export = Yii::getPathOfAlias('ext.array2XML');
        include_once ( $export . DIRECTORY_SEPARATOR . 'Array2XML.php');
        $array = $this->getAttributes();
        $arrayLibretas = array();

        foreach ($this->libretas as $libreta) {
            $arrayLibreta = $libreta->getAttributes();
            $arrayLibretas = array_merge($arrayLibretas, array($arrayLibreta));
            $arrayNotas = array();
            foreach ($libreta->notas as $notas) {

                $arrayNotas = array_merge($arrayNotas, array($notas->getAttributes()));
            }

            $arrayLibreta['notas'] = $arrayNotas;
            $arrayLibretas = array_merge($arrayLibretas, array($arrayLibreta));
        }
        $array['libretas'] = $arrayLibretas;
        return Array2XML::createXML('usuario', $array);
    }

    public function importXML($xml) {
        $export = Yii::getPathOfAlias('ext.array2XML');
        include_once ( $export . DIRECTORY_SEPARATOR . 'Array2XML.php');

        $xml = xml2array($xml);
        $array = $xml['usuario'];
        $usuario= new Usuario();
        if (isset($array['id_usuario'])) {
            $usuario = Usuario::model()->findByPk($array['id_usuario']);
            if(!$usuario)
               $usuario= new Usuario();
        }
        $usuario->setAttributes($array);
        $usuario->clave2=$usuario->clave;
        if ($usuario->save()) {
            $arrayLibretas = $array['libretas'];
            if(is_array($arrayLibretas))
            foreach ($arrayLibretas as $arrayLibreta) {
                $libreta = new Libreta();
                if (isset($arrayLibreta['id_libreta'])) {
                    $libreta = Libreta::model()->findByPk($arrayLibreta['id_libreta']);
                    if(!$libreta)
                        $libreta= new Libreta();
                }
                $libreta->setAttributes($arrayLibreta);
                $libreta->id_usuario=$usuario->id_usuario;
                if ($libreta->save()) {
                    $arrayNotas=array();
                    if(isset($arrayLibreta['notas']))
                    $arrayNotas = $arrayLibreta['notas'];
                    if(is_array($arrayNotas))
                    foreach ($arrayNotas as $arrayNota) {
                        $nota = new Nota();
                        if (isset($arrayNota['id_nota'])) {
                            $nota = Nota::model()->findByPk($arrayNota['id_nota']);
                            if(!$nota)
                                $nota= new Nota();
                        }
                        $nota->setAttributes($arrayNota);
                        $nota->id_libreta=$libreta->id_libreta;
                        if (!$nota->save()) {
                            Yii::log('La libreta no se puse guardar', 'error');
                            return false;
                        }
                    }
                } else {
                    Yii::log('La libreta no se puse guardar', 'error');
                    return false;
                }
            }
        } else {
            //echo CHtml::errorSummary($usuario);
            Yii::log('El usuario tiene informacion inconsistente', 'error');
            
            return false;
            
        }
        return true;
    }

}