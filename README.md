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

The configuration of apache server includes setting the document root and enables URL rewrite, you can start from editing the apache config file in `/etc/apache2/apache2.conf`. Below is the example configure marking lines to be edited.

``` text
<Directory />
        Options FollowSymLinks
        AllowOverride None
        Require all denied
</Directory>
<Directory /usr/share>
        AllowOverride None
        Require all granted
</Directory>

<Directory /home/ewind/n7books/>
        Options Indexes FollowSymLinks
        AllowOverride None
        Require all granted
</Directory>
```

Then, check if `/etc/apache2/mods-enabled` contails `rewrite.load`. If not, just execute this.
 
``` bash
$ sudo cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled
```

Then edit `/etc/apache2/sites-enabled/000-default.conf`

```
DocumentRoot /path/to/n7books/app/webroot
<Directory />
        Options FollowSymLinks
        AllowOverride All
</Directory>
<Directory /path/to/n7books/app/webroot>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        Allow from all
</Directory>
<Directory "/usr/lib/cgi-bin">
        AllowOverride None
        Options +ExecCGI -MultiViews +SymLinksIfOwnerMatch
        Order allow,deny
        Allow from all
</Directory>

```

Now the configuration to BookFace is completed. To start BookFace, just `$ sudo service apache2 restart` to see.
