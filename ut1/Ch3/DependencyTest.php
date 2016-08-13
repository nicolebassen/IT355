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
    //because OPS is sum total of on base percentage plus slugging average,
    //we can use the depends annotation
    public function testSlugging() {
        $baseball = new Baseball();
        $slg = $baseball->calc_slg(389, 106, 12, 4, 7);
        $expectedSlg = number_format(((106*1)+(12*2)+(4*3)+(7*4)) / 389, 3);
        $this->assertEquals($expectedSlg, $slg);
        return $slg;    
    }
    
    public function testOnBasePerc() {
        $baseball = new Baseball();
        $obp = $baseball->calc_obp(389, 23, 6, 7, 129);
        $expectedObp = number_format((129 + 23 + 6 + 7) / 389, 3);
        $this->assertEquals($expectedObp, $obp);
        return $obp;    
    }
    
    /**
     *@depends testSlugging
     *@depends testOnBasePerc
     */
    public function testOps($obp, $slg) {
        $baseball = new Baseball();
        $obp = $baseball->calc_ops($obp, $slg);
        $expectedOps = $obp + $slg;
        $this->assertEquals($expectedOps, $ops);
    }
 


 }  