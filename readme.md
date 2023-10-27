<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>
<h3> Quick Quiz – Laravel Quiz and Exam System </h3>

- [Overview](#overview)
- [Installation](#installation)

## Overview

Don't you think you should upgrade the test/exam pattern of your institute? As we all know, we are moving forward rapidly with new technology. So why stick to the old pattern of taking exams? It's better to update your test and exam segments with our developed platform named "Quick Quiz."

"Quick Quiz" is a platform for schools, colleges, institutes, and coaching centers. With this platform, you can conduct online and offline exams, quizzes, tests, quiz competitions, challenges, and more.

### Key Features

- Quiz and Exam System
- Support for LAN
- Admin Panel
- Login System
- Secure login and change password
- Secure password
- FAQ Pages
- Custom Pages
- Mail Settings through Admin Panel
- PayPal Payment Gateway
- Paid and Free Quiz
- Bootstrap 3 Framework
- Vue.js
- Based on 1170px grid
- W3C Valid Markup
- Smooth Transition Effects
- Free Icon Fonts
- Font Awesome Icons
- Google Fonts
- Cross-Browser Compatible
- Mobile and Tablet Support
- Responsive Design
- Documentation Included
- Unique and Exclusive Idea
- Unique and Creative Project

## Installation

### Introduction

Before installation, make sure you have the proper server requirements:

- PHP 7.2 or greater
- OpenSSL PHP Extension
- PHP Fileinfo extension
- PHP Zip Archive

File and folder permissions:

- /bootstrap: 775
- /public/: 775
- /storage: 775

### Installation with Apache

Before installing, make sure mod_rewrite is enabled.
```
cd /home/user/
unzip quickquiz.zip
```
For the Apache virtual host configuration:
```
<VirtualHost *:80>
    ServerName yoursite.com
    DocumentRoot "/home/user/quickquiz/public"
    Options Indexes FollowSymLinks
    <Directory "/home/user/quickquiz/public">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```
Change the directory/file’s owner to Apache’s running user (e.g., www-data) to ensure proper permissions:
```
sudo chown www-data:www-data -R /home/user/quickquiz
sudo chmod 775 -R /home/user/quickquiz
```
Then restart Apache.

### Shared Hosting Install
Consider that this is the webroot folder for your quickquiz website: `/home/myusername/public_html/`

Put all the main folder’s files in your quickquiz website at `/home/myusername/public_html/`

Create a MySQL database, add a user with full permissions, and import the `quiz_db.sql` file.

Open the `.env` file and fill in the database details:
```
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
MAIL_DRIVER=smtp  # (Sometimes sendmail)
MAIL_HOST=smtp.gmail.com  # (For Gmail = smtp.gmail.com)
MAIL_PORT=2525  # (For Gmail = 465)
MAIL_USERNAME=youremailid
MAIL_PASSWORD=yourpassword
MAIL_ENCRYPTION=null  # (For Gmail = ssl)
MAILCHIMP_API_KEY=yourapikey
MAILCHIMP_LIST_ID=yourlistid
```
Open and edit `app -> Http -> Controllers -> mailChimpController.php`:
```
protected $listId = 'yourmailchimplistid';
```
#### Remove Public From URL
To remove `public` from the URL, create an `.htaccess` file in the root folder and write the following code:
```
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>
```

#### Default login
Default Login Details
Admin:
Username: admin@info.com
Password: 123456

> for development purposes run the script on `php artisan serve`