<?php

/**
 * Nicole Bassen
 * 7/24/16
 * IT 355 - Unit Testing I
 */

namespace stats\Test;

use stats\BaseballApi;

class BaseballApiTest extends \PHPUnit_Framework_TestCase
{
    public function test_MockObject()
    {
       $baseball = $this->getMock('BaseballApi', array('submitAtBat'));
       print_r(get_class_methods($baseball));
       $baseball = $this->getMock('BaseballApi', array('submitAtBat'));
       $baseball->expects($this->any())
                ->method('submitAtBat')
                ->will($this->returnValue(true));
        $baseball->submitAtBat('1', 'bh');

    }
}

?>