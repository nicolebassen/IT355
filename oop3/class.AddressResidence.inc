<?php

    /**
     *Residential address
     */
    class AddressResidence extends Address {
        /**
         *initialization
         */
        protected function _init() {
            $this->__setAddressTypeId(Address::ADDRESS_TYPE_RESIDENCE);
        }
    }


?>