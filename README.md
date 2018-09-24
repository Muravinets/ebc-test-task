REQUIREMENTS
------------

The minimum requirement by this project that your Web server supports PHP 7.


INSTALLATION
------------

You can install this project using the following command:

~~~
git clone git@github.com:Muravinets/ebc-test-task.git
~~~

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

TESTING
-------

Tests are located in `tests` directory. They are developed with [Codeception PHP Testing Framework](http://codeception.com/).
There are 3 test suites:

- `unit`
- `functional`
- `api`

Tests can be executed by running

```
vendor/bin/codecept run
```

The command above will execute unit and api tests. Unit tests are testing the system components, while api
tests are for testing REST API interface.


### Configuring tests

Copy `config/test_db.php.sample` to `config/test_db.php` to enable suite configuration

Edit the file `config/test_db.php` with real data
