REQUIREMENTS
------------

The minimum requirement by this project that your Web server supports PHP 7.


INSTALLATION
------------

You can install this project using the following commands:

~~~
git clone git@github.com:Muravinets/ebc-test-task.git

composer install
~~~

Make directories writable for webserver:
    
    /runtime
    
    /web/assets

CONFIGURATION
-------------

### Database

Copy the file `config/db.php.sample` to the file `config/db.php`
 
Edit the file `config/db.php` with real data, for example:

```php
return [
    'class' => 'yii\db\Connection',
    'dsn' => 'mysql:host=localhost;dbname=ebc-test-task',
    'username' => 'root',
    'password' => '1234',
    'charset' => 'utf8',
];
```

**NOTES:**
- Yii won't create the database for you, this has to be done manually before you can access it.

MIGRATION
---------

Run command to install DB:

~~~
php yii migrate
~~~

TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
There are 2 test suites:

- `unit`
- `api`

### Configuring tests DB

Copy `config/test_db.php.sample` to `config/test_db.php` to enable test DB configuration

Edit the file `config/test_db.php` with real data

### Configuring REST API tests suite

Copy `tests/api.suite.yml.sample` to `tests/api.suite.yml` to enable suite configuration

Edit the file `tests/api.suite.yml` with real REST url

### Run tests

Tests can be executed by running

```
./vendor/bin/codecept run
```

The command above will execute unit and api tests. Unit tests are testing the system components, while api
tests are for testing REST API interface.

RUN
-------------

### REST API JSON


### Console

php yii test-task N 5,2,3 user_id[optional]