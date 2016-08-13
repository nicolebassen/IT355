<?php

require_once('Guestbook.php');

class GuestbookTest extends PHPUnit_Framework_TestCase {
    
    private $guestbook;
    
    public function setUp() {
        $this->guestbook = new Guestbook();
    }
    
    public function tearDown() {
        unset($this->guestbook);
    }
    
    // Test to ensure that the guestbook
    // contains at least one entry
    public function testCountGuestbookEntries() {
        $entries = $this->guestbook->viewAll();
        $this->assertInternalType('array', $entries);
        $this->assertTrue(count($entries) > 0);
    }
    
    // Test to ensure that the deleteAll() function
    // returns true and creates an empty array
    public function testDeleteAll(){
        $return = $this->guestbook->deleteAll();
        $this->assertTrue($return);
        $entries = $this->guestbook->viewAll();
        $this->assertInternalType('array', $entries);
        $this->assertTrue(count($entries) == 0);
    }
    
    function testAdd() {
        // Add a new record
        $this->guestbook->add("Bob", "Hi, I'm Bob.");
        // Get the entries
        $entries = $this->guestbook->viewAll();
        // Pop the last entry
        $entry = array_pop($entries);
        //Examine the last entry
        $this->assertTrue(isset($entry['name']));
        $this->assertTrue($entry['name'] == 'Bob');
        $this->assertTrue(isset($entry['message']));
        $this->assertTrue($entry['message'] == "Hi, I'm Bob.");
    }
}