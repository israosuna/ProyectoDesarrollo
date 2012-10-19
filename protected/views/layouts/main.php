<!DOCTYPE html>
<html lang="en">
    <head>
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
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.4.2.js" ></script>
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
                                        array('label' => 'Home', 'url' => array('/site/index')),
                                        array('label' => 'About', 'url' => array('/site/page', 'view' => 'about')),
                                        array('label' => 'Contact', 'url' => array('/site/contact')),
                                        array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                                    ), 'id' => 'menu'
                                ));
                                ?>
                            </div><!-- mainmenu -->

                        </nav>
                    </div>
                    <div class="wrapper">
                        <article class="col1 pad_left2">
                            <div class="text1">Discovering New Ways <span>of Scientific Thinking</span></div>
                            <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis prae sentium voluptatum deleniti atque corrupti quos dolores et quas molestias excep turi sint occaecati cupiditate non provident. <a href="#" class="link1">Read More</a> </p>
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
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li><a href="Researches.html">Researches</a></li>
                            <li><a href="Services.html">Services</a></li>
                            <li><a href="Events.html">Events</a></li>
                            <li class="bg_none"><a href="Contacts.html">Contacts</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="body5">
            <div class="main">
                <footer>
                    <a href="http://www.templatemonster.com/" target="_blank">Website template</a> designed by TemplateMonster.com<br>
                    <a href="http://www.templates.com/product/3d-models/" target="_blank">3D Models</a> provided by Templates.com
                </footer>
            </div>
        </div>
        <!--footer end-->
        <script type="text/javascript"> Cufon.now(); </script>
    </body>
</html>