<?php

    /**
     *Park address
     */
    class AddressPark extends Address {
        
        //public $country_name = 'Australia';
        
        /**
         *override display function
         */
        public function display() {
            $output = '<div style="background-color:PaleGreen;">';
            $output .= parent::display();
            $output .= '</div>';
            return $output;
        }
        
        /**
         *initialization
         */
        protected function _init() {
            $this->__setAddressTypeId(Address::ADDRESS_TYPE_RESIDENCE);
        }
    }


?>