<?php

class LibretaTest extends WebTestCase
{
	public $fixtures=array(
		'libretas'=>'Libreta',
	);

	public function testShow()
	{
		$this->open('?r=libreta/view&id=1');
	}

	public function testCreate()
	{
		$this->open('?r=libreta/create');
	}

	public function testUpdate()
	{
		$this->open('?r=libreta/update&id=1');
	}

	public function testDelete()
	{
		$this->open('?r=libreta/view&id=1');
	}

	public function testList()
	{
		$this->open('?r=libreta/index');
	}

	public function testAdmin()
	{
		$this->open('?r=libreta/admin');
	}
}
