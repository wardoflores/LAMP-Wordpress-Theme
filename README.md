# Website-Templates

## Server

Apache

## Dev Logs

### Wordpress setup

- `wget https://wordpress.org/latest.tar.gz` to initialize Wordpress in the repository

- `tar xvzf latest.tar.gz` to extract compressed Wordpress contents

- Applied new theme template to repository named "BaseWebsite0.1"

- Edited `/etc/hosts` to have sites for Wordpress

- **mod_rewrite** module ￼enabled￼ by ￼uncommenting `LoadModule rewrite_module modules/mod_rewrite.so`￼ in ￼`/etc/httpd/conf/httpd.conf`￼.

- Created config file `/etc/httpd/conf/extra/httpd-wordpress.conf`

- Initialized wordpress at `usr/share/webapps`for `/etc/httpd/conf/extra/httpd-wordpress.conf` file.

- Added `Include conf/extra/httpd-wordpress.conf` to `/etc/httpd/conf/httpd.conf`.

- Added `DirectoryIndex index.php` within the `<IfModule dir_module>` block of `/etc/httpd/conf/httpd.conf`.

- Installed `MariaDB` and `phpmyadmin`.

 To install mariaDB

```
mariadb-install-db --user=mysql --basedir=/usr --datadir=/var/lib/mysql
```

- Enabled and started `mariadb.service`

- Improved initial security `sudo mysql_secure_installation`

- Logged in as root in `MariaDB` and added a user.

- User is `joey@localhost` pass is the usual. Followed guide and added permissions for database `mydb`.

```
CREATE USER 'joey'@'localhost' IDENTIFIED BY '***';
```

```
GRANT ALL PRIVILEGES ON mydb.* TO 'joey'@'localhost';
```

```
FLUSH PRIVILEGES;
```

```
quit
```

- Added `wordpress` database and added access to user `joey`.

```
CREATE DATABASE wordpress;
```

> note that the Identified by parameter is the database password.

```
GRANT ALL PRIVILEGES ON wordpress.* TO "joey"@"localhost" IDENTIFIED BY "***";
```

```
FLUSH PRIVILEGES;
```

```
quit
```

- Set up Apache to use PHP as outlined in the [Apache HTTP Server#PHP](https://wiki.archlinux.org/title/Apache_HTTP_Server#PHP "Apache HTTP Server") article.

- Create the Apache configuration file:

```
sudo nano /etc/httpd/conf/extra/phpmyadmin.conf
```

```

Alias /phpmyadmin "/usr/share/webapps/phpMyAdmin"
<Directory "/usr/share/webapps/phpMyAdmin">
    DirectoryIndex index.php
    AllowOverride All
    Options FollowSymlinks
    Require all granted
</Directory>
```

- And include it in `/etc/httpd/conf/httpd.conf`

```
Include conf/extra/phpmyadmin.conf
```

#### phpMyAdmin configuration

- After making changes to the Apache configuration file, [restart](https://wiki.archlinux.org/title/Restart "Restart") `httpd.service`.

```
sudo systemctl restart httpd.service
```

- To allow the usage of the phpMyAdmin setup script

```
sudo mkdir /usr/share/webapps/phpMyAdmin/config
```

```
sudo chown http:http /usr/share/webapps/phpMyAdmin/config
```

```
sudo chmod 750 /usr/share/webapps/phpMyAdmin/config
```

- Went to `http://localhost/phpmyadmin/setup` to set up phpMyAdmin

- Installed `php-apache`

- edit `/etc/php/php.ini` to uncomment bz2 extension and added mariadb `extension=pdo_mysql`
`extension=mysqli` and iconv extensions.

- Setup PHP in Apache using the libphp method

```
sudo nano /etc/httpd/conf/httpd.conf
```

- commented `#LoadModule mpm_event_module modules/mod_mpm_event.so`

- uncommented `LoadModule mpm_prefork_module modules/mod_mpm_prefork.so`

Place this at the end of the `LoadModule` list:

```

LoadModule php_module modules/libphp.so
AddHandler php-script .php
```

Place this at the end of the `Include` list:

```
Include conf/extra/php_module.conf
```

```
sudo systemctl restart httpd.service
```

- Removed `/usr/share/webapps/phpMyAdmin/config.ini.php` to fix Error at setup script site that says `Configuration already exists, setup is disabled!`

- Logged in phpMyAdmin at `http://127.0.0.1/phpmyadmin` using my MariaDB credentials

- went to `http://joey/wordpress` where it redirected me to `http://joey/wordpress/wp-admin/setup-config.php` to setup Wordpress.

- `sudo nano /<https://github.com/wilsmex/blog-site-template.gitaccess> it:

```
chown http:http -R /usr/share/webapps/wordpress/
```

### Theming Setup

Cloned theme-template from `https://github.com/wilsmex/blog-site-template.git`

Added template files to new theme folder called `base-website`

- Add subfolders to the `newthemehere` folder
  - assets
    - css
    - fonts
    - images
    - javascript
  - classes (For PHP classes)
  - inc (Includes - misc files)
  - template-parts (for splitting up parts of template)
  - templates

- Setup files required for wordpress themes
  - style.css (Master style sheet for website)
  - index.php (serves as the fallback if no specified template file in the file hierarchy is found by wordpress)

- Add file for serving a Server error page
  - 404.php

- Add file responsible for deliverring an archive (Like list of blogs)
  - archive.php

- For displaying and serving up comments in theming
  - comments.php

- Bottom section file
  - footer.php

- Top secftion file
  - header.php

- file for overide and initiate different features of your theme
  - functions.php

- File for displaying static pages
  - page.php

- File to display search results
  - search.php

- File for displaying single blog posts
  - single.php

- For basic legal and reminders (and dev logs)
  - read.md

- Image for what that theme lookslike
  - screenshot.png

- File for front-page of the Template
  - front-page.php

### Template Building

- Copied `index.html` @ `blog-site-theme-template` to `front-page.php`

- Enqueued stylesheets in `functions.php`

- Replaced hardcoded stylesheets in `front-page.php` into 

```
<?php

	// wordpress injects all of the stylesheets by itself
	wp_head();

?>
```

- Added dynamic version variable in `functions.php`

- lorem
