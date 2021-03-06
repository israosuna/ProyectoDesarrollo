<!DOCTYPE html>
<html lang="en">
    <head>
        
                <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.4.2.js" ></script>
<meta charset="utf-8">
        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>

<!-- <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/reset.css" type="text/css" media="all"> -->
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/layout.css" type="text/css" media="all">
        <link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" media="all">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/proyecto.css" />
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-yui.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/cufon-replace.js"></script> 
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/Myriad_Pro_300.font.js"></script>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/Myriad_Pro_400.font.js"></script>
        <!--[if lt IE 9]>
                <script type="text/javascript" src="http://info.template-help.com/files/ie6_warning/ie6_script_other.js"></script>
                <script type="text/javascript" src="js/html5.js"></script>
        <![endif]-->
    </head>
    <body id="page1">
        <div class="body1"></div>
        <div class="body2">
            <div class="main"><div class="inner_copy">More <a href="http://www.templatemonster.com/">Website Templates</a> at TemplateMonster.com!</div>
                <!--header -->
                <header>
                    <div class="wrapper">
                        <nav>

                            <div id="mainmenu">
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'Inicio', 'url' => array('/site/index')),
                                        array('label' => 'Acerca', 'url' => array('/site/page', 'view' => 'about')),
                                        array('label' => 'Contacto', 'url' => array('/site/contact')),
                                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                        array('label' => 'Registro', 'url' => array('/usuario/registrar'), 'visible' => Yii::app()->user->isGuest),
                                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                                    ), 'id' => 'menu'
                                ));
                                ?>
                            </div><!-- mainmenu -->

                        </nav>
                    </div>
                    <div class="wrapper">
                        <article class="col1 pad_left2">
                            <div class="text1">Evernote+DropBox <span>Best App Ever</span></div>
                        </article>
                    </div>
                </header>
            </div>
        </div>
        <!--header end-->
        <!--content -->
        <div class="body3">
            <div class="main">
                <section id="content_top">

                </section>
            </div>
        </div>
        <div class="main">
            <section id="content">
<?php echo $content; ?>

            </section>
        </div>
        <!--content end-->
        <!--footer -->
        <div class="body4">
            <div class="main">
                <div id="footer_menu">
                    <nav>
                      
                                <?php
                                $this->widget('zii.widgets.CMenu', array(
                                    'items' => array(
                                        array('label' => 'Inicio', 'url' => array('/site/index')),
                                        array('label' => 'Acerca', 'url' => array('/site/page', 'view' => 'about')),
                                        array('label' => 'Contacto', 'url' => array('/site/contact')),
                                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                        array('label' => 'Registro', 'url' => array('/usuario/registrar'), 'visible' => Yii::app()->user->isGuest),
                                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                                    ), 
                                ));
                                ?>
                    </nav>
                </div>
            </div>
        </div>
        <div class="body5">
            <div class="main">
                <footer>
                    <a href="http://www.templatemonster.com/" target="_blank">Israel Osuna</a> Graciela Lucena & Diego Vierma<br>
                </footer>
            </div>
        </div>
        <!--footer end-->
        <script type="text/javascript"> Cufon.now(); </script>
    </body>
</html>