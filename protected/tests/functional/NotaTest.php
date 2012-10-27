<?php

class NotaTest extends WebTestCase
{
	public $fixtures=array(
		'notas'=>'Nota',
	);

	public function testShow()
	{
		$this->open('?r=nota/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=nota/create');
	}

	public function testUpdate()
	{
		$this->open('?r=nota/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=nota/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=nota/index');
	}

	public function testAdmin()
	{
		$this->open('?r=nota/admin');
	}
}
