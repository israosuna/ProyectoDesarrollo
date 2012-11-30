<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>




<div class="span-19" id="colum2">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>

<div class="span-5 last">
	<div id="sidebar">
	<?php
		$this->beginWidget('zii.widgets.CPortlet', array(
			'title'=>'Operaciones',
		));
		$this->widget('zii.widgets.CMenu', array(
			'items'=>$this->menu,
			'htmlOptions'=>array('class'=>'operaciones'),
		));
                $this->widget('ext.Widget.EBackButtonWidget');
                 //echo CHtml::button('Volver', array(
            //'name' => 'btnBack',
            //'class' => 'uibutton loading confirm',
            //'style' => 'width:150px;',
            //'onclick' => "history.go(-1)",
                //));
		$this->endWidget();
	?>
	</div><!-- sidebar -->
</div>
    
    <?php $this->endContent(); ?>