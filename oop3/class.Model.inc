<?php
    
    /**
     *shared interface for interactions
     */
    interface Model {
        /**
         *load a model
         *@param int $address_id
         */
        static function load($address_id);
        
        /**
         *save a model
         */
        function save();
        
    }
?>