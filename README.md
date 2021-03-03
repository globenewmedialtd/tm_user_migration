# tm_user_migration
Drupal 8 to Drupal 8 User Migration Module

## Dependencies
The following modules must be enabled:
- migrate_tools
- migrate_drupal_d8

The module migrate_drupal_d8 is still needed.
Read why: https://www.drupal.org/project/migrate_drupal_d8

## Installation
Install like any other drupal module

## Configuration
Make sure you have the following added to your settings.php
Please note if you have an remote host, make sure that the mysql server on the remote server is reachable from outside.
In the case it is, you can enter your server name at 'host' => YOUR_SOURCE_SERVER

```php
$databases['d8_source_site']['default'] = array(
    'database' => 'YOUR_SOURCE_DB',
    'username' => 'YOUR_SOURCE_DB_USER',
    'password' => 'YOUR_SOURCE_DB_PW',
    'host' => 'localhost',
    'port' => '3306',
    'namespace' => 'Drupal\\Core\\Database\\Driver\\mysql',
    'driver' => 'mysql',
);
```


