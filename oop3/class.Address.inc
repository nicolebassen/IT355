<?php
    
    /**
     * Nicole Bassen
     * Physical address class
     * OOP II - IT 355
     */
    abstract class Address implements Model {
        
        const ADDRESS_TYPE_RESIDENCE = 1;
        const ADDRESS_TYPE_BUSINESS = 2;
        const ADDRESS_TYPE_PARK = 3;
        
        // address types
        public static $valid_address_types = array(
            Address::ADDRESS_TYPE_RESIDENCE => 'Residence',
            Address::ADDRESS_TYPE_BUSINESS => 'Business',
            Address::ADDRESS_TYPE_PARK => 'Park'
        );
        
        // address properties
        public $street_address_1;
        public $street_address_2;
        public $city_name;
        public $subdivision_name;
        protected $_postal_code;
        public $country_name;
        protected $_address_type_id;
        
        // primary key of an address
        protected $_address_id;

        // time of address creation and last update
        protected $_time_created;
        protected $_time_updated;
        
        /**
         *post clone behavior
         */
        function __clone() {
            $this->_time_created = time();
            $this->_time_updated = NULL;
        }
        
        /**
         *constructor
         *@param array $data optional array of property names and values
         */
        function __construct($data = array()) {
            $this->_init();
            $this->_time_created = time();
            
            // ensure that the Address can be populated
            if (!is_array($data)) {
                trigger_error('Unable to construct adress with a ' . get_class($name));
            }
            
            // if there is at least one value, populate the address with it
            if (count($data) > 0) {
                foreach ($data as $name => $value) {
                    // special case for protected properties
                    if (in_array($name, array(
                        'time_created',
                        'time_updated'
                    ))) {
                        $name = '_' . $name;
                    }
                    $this->$name = $value;
                }
            }
        }
        
        /**
         *magic __get
         *@param string $name
         *@return mixed
         */
        function __get($name) {
            // postal code lookup if unset
            if (!$this->_postal_code) {
                $this->_postal_code = $this->_postal_code_guess();
            }
            
            // attempt to return a protected property by name
            $protected_property_name = '_' . $name;
            
            if (property_exists($this, $protected_property_name)) {
                return $this->$protected_property_name;
            }
            
            // unable to access property; trigger error
            trigger_error('Undefined property via __get: ' . $name);
            return null;
        }
        
        /**
         *magic __set
         *@param string $name
         *@param string $value
         */
        function __set($name, $value) {
            
            // allow anything to set the postal code
            if ('postal_code' == $name) {
                $this->$name = $value;
                return;
            }
            
            // unable to access property; trigger error
            trigger_error('Undefined or unallowed property via __set: ' . $name);
        }
        
        /**
         *magic __toString()
         *@return string
         */
        function __toString() {
            return $this->display();
        }
        
        /**
         *force extending classes to implement init method
         */
        abstract protected function _init();
        
        /**
         *guess the postal code given the subdivision and city name
         *@todo replace with a database lookup
         *@return string
         */
        protected function _postal_code_guess() {
            $db = Database::getInstance();
            $mysqli = $db->getConnection();
            $query = 'SELECT postal_code FROM location ';
            $city_name = $mysqli->real_escape_string($this->city_name);
            $query .= 'WHERE city_name = "' . $city_name . '" ';
            $subdivision_name = $mysqli->real_escape_string($this->subdivision_name);
            $query .= 'AND subdivision_name = "' . $subdivision_name . '"';
            $result = $mysqli->query($query);
            
            if ($row = $result->fetch_assoc()) {
                return $row['postal_code'];
            }
            
            return 'LOOKUP';
        }
        
        // display the address in HTML
        function display() {
            $output = '';
            
            // street address
            $output .= $this->street_address_1;
            if ($this->street_address_2) {
                $output .= '<br>' . $this->street_address_2;
            }
            
            // city, subdivision, and postal code
            $output .= '<br>' . $this->city_name . ', ' . $this->subdivision_name;
            $output .= ' ' . $this->postal_code;
            
            // country
            $output .= '<br>' . $this->country_name;
            
            return $output;
        }
        
        /**
         *determine if an address type is valid
         *@param int $address_type_id
         *@return boolean
         */
        public static function isValidAddressTypeId($address_type_id) {
            return array_key_exists($address_type_id, self::$valid_address_types);
        }
        
        /**
         *if valid, set the address type id
         *@param int $address_type_id
         */
        protected function __setAddressTypeId($address_type_id) {
            if (self::isValidAddressTypeId($address_type_id)) {
                $this->_address_type_id = $address_type_id;
            }
        }
        
        /**
         * load an address
         * @param int $address_id
         */
        public static final function load($address_id) {}
        
        /**
         * save an address
         */
        public final function save() {}
    }

?>