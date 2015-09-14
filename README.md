## BookFace

Bookface is an online textbook plea market for USTCers.

### Get started

#### Get Bookface

You may get your LAMP environment installed first.

``` bash
$ git clone https://github.com/doodlewind/n7books.git
```

And change its file permission.

``` bash
$ sudo chmod -R www-data:www-data n7books
```

#### Configure MySQL and CakePHP

After downloaded the source code, you can then import the MySQL table structure.

``` bash
$ mysql -u root -p ustc_old_book < n7books/ustc_old_book.sql
```

Next step is to configure CakePHP for database. Create `n7books/app/Config/database.php` and config like below:

``` php
<?php
class DATABASE_CONFIG {
    public $default = array(
        'datasource' => 'Database/Mysql',
        'persistent' => false,
        'host' => '127.0.0.1',
        'login' => 'your_mysql_username',
        'password' => 'your_mysql_password',
        'database' => 'ustc_old_book',
        'encoding' => 'utf8'
    );
}
```

#### Configure Apache

The configuration of apache server includes setting the document root and enables URL rewrite, you can start from editing the apache config file in `/etc/apache2/sites-enables/000-default.conf`. Below is the example configure marking lines to be edited.

``` text
DocumentRoot /path/to/n7books
<Directory />
        Options FollowSymLinks
        AllowOverride All
</Directory>
<Directory /path/to/n7books>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        Allow from all
</Directory>
```
Then, check if `/etc/apache2/mods-enabled` contails `rewrite.load`. If not, just execute this.
 
``` bash
$ sudo cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
```

Now the configuration to BookFace is completed. To start BookFace, just `$ sudo service apache2 restart` to see.
