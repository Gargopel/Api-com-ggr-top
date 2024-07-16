<?php
// config for Westreels/WestreelsMain/gameconfig
return [


    /*
    |--------------------------------------------------------------------------
    | Application Casino Settings
    |--------------------------------------------------------------------------
    | Storing env values here so we can later easily enable roadrunner cache (www.roadrunner.dev)
    */

    /* Toggle API between local and external, set 'api_key_setting' to 'external' to use external api verification, else the variable is the apikey  */
    'api_key_setting' => 'apikey2020202',
    'api_key_local_var' => [
        'ip_allowed' => '127.0.0.1',
        'balance_url' => 'https://rdev1.bets.sh/staging/testBalanceCallback/game/balance',
        'result_url' => 'https://rdev1.bets.sh/staging/testBalanceCallback/game/bet',
        'cashier_url' => 'https://rdev1.bets.sh/cashier',
    ],


    /* Server ip used for internal router middleware */
    'server_ip' => env('APP_SERVER_IP', '109.74.201.107'),
    'api_base_url' => 'https://gameservice.pragmaticgaming.net',
    'api_playerlogin_prefix' => '/player/login',
    'api_session_create' => '/player/start',


    /* Generate hashmac for header in API on testing purposes */
    'hashmac_sign_creator' => true,

    /* Absolute Filepath location of the westreels main package */
    'package_main_path' => '/bets/rdev3-mainapi/worker-package',
    'raw_db_storage' => '/bets/rdev3-mainapi/worker-package/database/raw_database_storage',
    'js_script_storage' => '/bets/rdev3-mainapi/worker-package/resources/js_script_store',

    /*
    |--------------------------------------------------------------------------
    | Cache Settings for Casino Functions
    |--------------------------------------------------------------------------
    | In development areas, set the APP_ENV to local in .env - this will disable the caching, while you can leave value below like you wish for production
    */

    'data_cache' => [
		'cache_gamelist_length' => 15,
		'cache_presets_length' => 10,
    ],

    /*
    |--------------------------------------------------------------------------
    | Pragmatic Specific Settings
    |--------------------------------------------------------------------------
    |
    | Game delays are in seconds, set to 0.00 to disable - please note that adding extra delay should only be done on low loads to emulate regular casino play. 
    | Setting 'device_url' is for sideloading extra content, if not using simply set to your staitc proxy URL.
    | Proxy static url should be rewriting with caching in nginx to pragmatic.
    */

    'pragmaticplay' => [
        'minilobby_url' => 'https://static-assets.pragmaticgaming.net/gs2c/minilobby/start',
        'static_proxy_url_vs' => 'https://static-assets.pragmaticgaming.net/vs/',
        'static_proxy_url_cs' => 'https://static-assets.pragmaticgaming.net/cs/',
        'device_url' => 'static-assets.pragmaticgaming.net',
        'api_url' => 'https://gameservice.pragmaticgaming.net',
        'realtoken' => 'AUTHTOKEN@e184b018550444e6e24296124da9015e38accac4bdb12b89c653b00a89484785~stylename@sfws_betssw~SESSION@c528fc8b-650e-4e36-933b-bda11499a599~SN@c120117a',
        'game_delay_trigger' => '0.00',
    	'game_delay_extra' => '0.01',
    ],

];
