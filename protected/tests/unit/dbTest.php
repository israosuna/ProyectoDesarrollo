<?php
class DbTest extends CTestCase
{
    /*
     * Test if we have database driver active
     */
    public function testConnection()
    {
        
        $this->assertNotEquals(NULL, Yii::app()->db);
    }
}