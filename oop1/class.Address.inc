<?php
    
    /**
     * Nicole Bassen
     * Physical address class
     */
    class Address {
        // address properties
        public $street_address_1;
        public $street_address_2;
        public $city_name;
        public $subdivision_name;
        public $postal_code;
        public $country_name;
        
        // primary key of an address
        protected $_address_id;
        
        // time of address creation and last update
        protected $_time_created;
        protected $_time_updated;
        
        // display the address in HTML
        function display() {
            $output = '';
            
            // street address
            $output .= $this->street_address_1;
            if ($this->street_address_2) {
                $output .= '<br>' . $this->street_address_2;
            }
            
            // city, subdivision, and postal code
            $output .= '<br>' . $this->city_name . ', ' . $this->subdivision;
            $output .= ' ' . $this->postal_code;
            
            // country
            $output .= '<br>' . $this->country_name;
            
            return $output;
        }
    }

?>