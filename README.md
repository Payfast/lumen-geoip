# GeoIP for Lumen

Determine the geographical location of website visitors based on their IP addresses. [Homepage](http://lyften.com/projects/laravel-geoip/)

----------

## Installation

- [GeoIP for Lumen on GitHub](https://github.com/ReLiCRSA/lumen-geoip)

To get the latest version of GeoIP simply require it in your `composer.json` file.

~~~
"relicrsa/lumen-geoip": "dev-master"
~~~

You'll then need to run `composer update` to download it and have the autoloader updated.

Once GeoIP is installed you need to register the service provider with the application. Open up `bootstrap/app.php` and find the `Register Service Providers` section.

```php
$app->register(ReLiCRSA\GeoIP\GeoIPServiceProvider::class);
class_alias(ReLiCRSA\GeoIP\GeoIPFacade::class, "GeoIP");
$app->configure('geoip');
```

### Configuration files

Browse to `vendors/relicrsa/lumen-geoip/src/config`

Copy `geoip.php` to your `config` directory

### Update max mind cities database

~~~
$ php artisan geoip:update
~~~

**Database Service**: To use the database version of [MaxMind](http://www.maxmind.com) services download the `GeoLite2-City.mmdb` from [http://dev.maxmind.com/geoip/geoip2/geolite2/](http://dev.maxmind.com/geoip/geoip2/geolite2/) and extract it to `storage/app/geoip.mmdb`. And that's it.

## Usage

Get the location data for a website visitor:

```php
$location = GeoIP::getLocation();
```

> When an IP is not given the `$_SERVER["REMOTE_ADDR"]` is used.

Getting the location data for a given IP:

```php
$location = GeoIP::getLocation('232.223.11.11');
```

### Example Data

```php
array (
    "ip"           => "196.2.33.103",
    "isoCode"      => "ZA",
    "country"      => "South Africa",
    "city"         => null,
    "state"        => null,
    "postal_code"  => null,
    "lat"          => -29.0,
    "lon"          => 24.0,
    "timezone"     => "Africa/Johannesburg",
    "continent"    => "AF",
    "default"      => false
);
```

#### Default Location

In the case that a location is not found the fallback location will be returned with the `default` parameter set to `true`. To set your own default change it in the configurations `config/geoip.php`