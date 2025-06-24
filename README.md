# Arden code test 

## Requirements

- Linux system running an ubuntu varient
- Apache 2.4
- PHP 8.3
- MySQL 8


### Git Clone the directory
Clone the directory into your home directory and then move the directory to `/var/www/`

```bash
git clone https://github.com/uchuuj/arden-test
sudo cp -r arden-test /var/www
cd /var/www/arden-test
```

### Setup Apache Virtual host
go into `/etc/apache2/sites-available`
copy the default config and rename it in this case, I'm calling it `arden.conf` and open it in your favourite editor with root privileges

```bash
sudo cp 000-default.conf arden.conf
sudo emacs arden.conf
```

Change:

```bash
	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/html 
```

to: 
```bash
	ServerName arden-test.local
	ServerAdmin webmaster@localhost
	DocumentRoot /var/www/arden-test

```

enable site and restart apache with 

```bash
sudo a2ensite arden
sudo service apache2 restart
```

Add arden-test.local to `/etc/hosts` via your favourite text editor

```bash
sudo emacs /etc/hosts
```
inside the file add the following and save: 
```bash
127.0.0.1 arden-test.local
```

This should allow us to access the site via arden-test.local


### Setting up the Database
Next we're going to need to set up the database. 
Setting up an database user is out of the scope of this tutorial
So I'm going to assume you have a user set up.

log into your MySQL server and run the following 

```sql
CREATE DATABASE arden;
```

logout and import the sql data that's in the repo
```bash
cd /var/www/arden-test
mysql -uUSER_GOES_HERE -pPASSWORDGOESHERE arden < arden-tables.sql
```

### Setting up .env
copy the `.env.sample` file to `.env`
And add your database credientials to the file. 

And voila if you go to the site http://arden-test.local the site should work.

### Asset Credits
Image credits are located in ASSET-LISCENCES and are liscened under CC.
