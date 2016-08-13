<?php

class Guestbook { 
    private $entries = array(
        array('name' => 'Kirk', 'message' => 'Hi, I\'m Kirk'),
        array('name' => 'Teresa', 'message' => 'Hi, I\'m Teresa')
    );
    
    public function viewAll() {
        return $this->entries;
    }
    
    public function deleteAll() {
        $this->entries = array();
        return true;
    }
    
    public function add($name, $message) {
        $this->entries[] = array(
            'name' => $name,
            'message' => $message
        );
        return true;
    }
}