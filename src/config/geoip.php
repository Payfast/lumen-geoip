<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Service
	|--------------------------------------------------------------------------
	|
    | Current supported is
    | 'maxmind' = Use GeoIP2 (Via DB and Webservice)
    | 'legacy'  = Use Older Max Romonofsky GeoIP (Returns only ISOCODE)
    |
	*/

	'service' => 'maxmind',

    /*
    |--------------------------------------------------------------------------
    | Services settings
    |--------------------------------------------------------------------------
    |
    | Service specific settings.
    |
    */

    'legacy' => array(
        'database_path' => storage_path('app/GeoIP.dat'),
    ),

	/*
	|--------------------------------------------------------------------------
	| Services settings
	|--------------------------------------------------------------------------
	|
	| Service specific settings.
	|
	*/

	'maxmind' => array(
		'type'          => env('GEOIP_DRIVER', 'database'), // database or web_service
		'user_id'       => env('GEOIP_USER_ID'),
		'license_key'   => env('GEOIP_LICENSE_KEY'),
		'database_path' => storage_path('app/geoip.mmdb'),
		'update_url'    => 'https://geolite.maxmind.com/download/geoip/database/GeoLite2-City.mmdb.gz',
	),

	/*
	|--------------------------------------------------------------------------
	| Default Location
	|--------------------------------------------------------------------------
	|
	| Return when a location is not found.
	|
	*/

	'default_location' => array (
        "ip"           => "127.0.0.1",
		"isoCode"      => "ZA",
		"country"      => "South Africa",
		"city"         => "Johannesburg",
		"state"        => "GP",
		"postal_code"  => "2195",
		"lat"          => -29.0,
		"lon"          => 24.0,
		"timezone"     => "Africa/Johannesburg",
		"continent"    => "AF",
        "default"      => true
	),

);