<?php
return array(
    // set your paypal credential
    'client_id' => 'AWGOwZKqpDwNAa2OB09n4Qo8qTPNG_TDBnRvyFRIUP1XXRDu4IsyBZeDdmcRMmA4pIYn7QW2omOl-d0_',
    'secret' => 'EPDMSZi26JB890bMKLzQCieZU4PG-Xr2IIERqSiYd0KDitu3M7LzA6uGGPp__J7ylZUVJlfC1m2_VtgT',

    /**
     * SDK configuration 
     */
    'settings' => array(
        /**
         * Available option 'sandbox' or 'live'
         */
        'mode' => 'sandbox',

        /**
         * Specify the max request time in seconds
         */
        'http.ConnectionTimeOut' => 60,

        /**
         * Whether want to log to a file
         */
        'log.LogEnabled' => true,

        /**
         * Specify the file that want to write on
         */
        'log.FileName' => storage_path() . '/logs/paypal.log',

        /**
         * Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
         *
         * Logging is most verbose in the 'FINE' level and decreases as you
         * proceed towards ERROR
         */
        'log.LogLevel' => 'FINE'
    ),
);