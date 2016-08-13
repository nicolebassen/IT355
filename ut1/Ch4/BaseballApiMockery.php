<?php

use stats\Baseball;

class BaseballTest extends \PHPUnit_Framework_TestCase
{
    public function testCalculateAvgEquals()
    {
        $atbats = '389';
        $hits = '129';
        $baseball = new Baseball();
        $result = $baseball->calc_avg($atbats,$hits);
        $expectedresult = $hits/$atbats;
        $formatexpectedresult = number_format($hits/$atbats,3);
        $this->assertEquals($result,$formatexpectedresult); 
    //
    }

    public function testMockObject()
    {
        $baseball = $this->getMock('Baseball', array('submitAtBat'));
        $baseball->expects($this->any())
            ->method('submitAtBat')
            ->will($this->returnValue(true));
        $result = $baseball->submitAtBat('1','bh'); // returns true
        $expected = true;
        $this->assertEquals($expected,$result);
    }

    public function testMockery(){

        $someObj = new Baseball();
        $someVal = true;
        $mockeryMock = \Mockery::mock('Baseball');
        $mockeryMock->shouldReceive('submitAtBat')->with('1','bh')->once()->andReturn($someVal);
        $this->assertEquals($someVal, $someObj->submitAtBat('1','bh'));
        //

    }



}