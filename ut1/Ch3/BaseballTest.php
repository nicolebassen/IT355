<?php

/**
 * Nicole Bassen
 * 7/24/16
 * IT 355 - Unit Testing I
 */

namespace stats\Test;

use stats\Baseball;

class BaseballTest extends \PHPUnit_Framework_TestCase
{
  
  public function setUp()
  {
    $this->instance = new Baseball();
  }
    
  //tear down method
  public function tearDown()
  {
     unset($this->instance);
  }
    
  // access private methods by instantiating the public class
  public function testOps() {
    $obp = .363;
    $slg = .469;
    $ops = $this->instance->calc_ops($obp, $slg);
    $expectedOps = $obp + $slg;
    $this->assertEquals($expectedOps, $ops);
  }

  /**
   * access protected or private methods of a class using a reflection class
   *
   * @param object &$object instantiated object that we will run the method on
   * @param string $methodName the method name to call
   * @param array $parameters an array of parameters to pass into the method
   * @return mixed method return
   */
  public function invokeMethod(&$object, $methodName, array $parameters = array()) {
    $reflection = new \ReflectionClass(get_class($object));
    $method = $reflection->getMethod($methodName);
    $method->setAccessible(true);
    return $method->invokeArgs($object, $parameters);
  }
  
  public function testCalcAvg() {
    $avg = number_format(129/369, 3);
    $this->assertEquals($avg, $this->invokeMethod($this->instance, 'calc_avg', array(369, 129)));
  }
  
  
  // old tests (when the methods were public)
  
  public function testCalcAvgEquals() {
    $atBats = 389;
    $hits = 129;
    $baseball = new Baseball();
    $result = $baseball->calc_avg($atBats, $hits);
    var_dump($result);
    //$this->assertEquals($expectedResult, $result);
    $formatExpectedResult = number_format($hits/$atBats, 3);
    //$this->assertEquals($formatExpectedResult, $result);
  }
  
  public function testCalcHitsAreStrings() {
    $atBats = 389;
    $hits = 'wefwf';
    $baseball = new Baseball();
    $result = $baseball->calc_avg($atBats, $hits);
    $formatExpectedResult = 0.000;
    var_dump($result);
    $this->assertEquals($formatExpectedResult, $result);
  }
}



