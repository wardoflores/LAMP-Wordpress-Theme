# Website-Templates

## Setup

- Enable MySQL
- service: MariaDB

```
sudo systemctl enable --now mariadb.service
```

- Enable Web Server
- service: Apache

```
sudo systemctl enable --now httpd.service 
```

- login to phpmyadmin dashboard in browser: http://127.0.0.1/phpmyadmin/
	- USER: <set_username>

- Go to http://<set_username>/wordpress
