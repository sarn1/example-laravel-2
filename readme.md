<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb combination of simplicity, elegance, and innovation give you tools you need to build any application with which you are tasked.

## Learning Laravel

Laravel has the most extensive and thorough documentation and video tutorial library of any modern web application framework. The [Laravel documentation](https://laravel.com/docs) is thorough, complete, and makes it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 900 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for helping fund on-going Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](http://patreon.com/taylorotwell):

- **[Vehikl](http://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Styde](https://styde.net)**
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](http://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).

## Other Notes

### Team TreeHouse Laravel 4 Basics
[Course Website](https://teamtreehouse.com/library/laravel-4-basics)

To get started:
* Download and install [Virtual Box](https://www.virtualbox.org/wiki/Downloads)
* Download and install [Vagrant](https://www.vagrantup.com/)

You will be using Homestead, here's a quick description of what it is:
* Laravel Homestead: *Laravel Homestead is an official, pre-packaged Vagrant box that provides you a wonderful development environment without requiring you to install PHP, a web server, and any other server software on your local machine. No more worrying about messing up your operating system! Vagrant boxes are completely disposable. If something goes wrong, you can destroy and re-create the box in minutes!*
* The following setup below can be read in further details :https://laravel.com/docs/5.4/homestead

### Vagrant & Virtual Box Setup

This command will install a Laravel Homestead image by adding this "box" to our Vagrant.  
```
vagrant box add laravel/homestead
```

Best to do the following plan in a centralized Homestead directory.  I did this in /Websites and it created /Websites/Homestead

```
git clone https://github.com/laravel/homestead.git Homestead
```

In the homestead directory, if you do not see a Homestead.yaml

```
type init.sh
```

[Now edit the Homestead.yaml file](https://abbasharoon.me/homestead-yaml-explained-a-z/)

[Vagrant Up vs. Artisan Serve](https://laracasts.com/discuss/channels/laravel/vagrant-up-vs-artisan-serve)

While in the homestead directory….

```
vagrant up
```

```
vagrant ssh
```
This spuns up an Ubuntu Linux server.

Do the following within the sites folder in Vagrant.  If you ls in there, it should link to websites on the local machine since that’s what we setup in the .yml file.

```
composer create-project laravel/laravel ExampleLaravel2 --prefer-dist
```

(This installs Laravel.  But I didn’t have to do this since I have a test Laravel already up and running.)

Once you cd into the ExampleLaravel2 project and do a pwd.

```
pwd
```

The directory structure should match the sites: to: in the .yml file.

Both http://127.0.0.1:8000/ and http://192.168.10.10/ and http://laravel.dev:8000/ should work.  To remove the port 8000, to exit vagrant type
```
exit
```

```
cd /etc
vim hosts
```


While in vagrant:
- cd to homestead and run vagrant up
- navigate into the Sites/ExampleLaravel2
php artisan routes:list


### The Programming

Resource controllers
https://laravel.com/docs/5.4/controllers#resource-controllers

We will be using artisan to make a controller called TodoListController.

```
php artisan make:controller TodoListController
```

Which will generate a controller template here.

```
app > Http > Controllers > TodoListController.php
```

#### The Database

https://laravel.com/docs/5.4/homestead#connecting-to-databases-

From within your project in Vagrant.  Let's access mySQL to create a new database.

```
mysql -u homestead -p
secret

show databases;

create database odot;

show databases;

```

Let's now add the database credentials into the Laravel project.  To do this, navigate to:

config/database.php

... and set database on 46-48

```
'database' => env('DB_DATABASE', 'odot'),
'username' => env('DB_USERNAME', 'homestead'),
'password' => env('DB_PASSWORD', 'secret'),
```

But preferable do it in the .env for this particular project.  

Then test db by going to route http://127.0.0.1:8000/db

The code is in the GET /db route.

Query & Query Builder
https://laravel.com/docs/5.4/queries

#### Migration

In Vagrant:

```
php artisan make:migration create_todo_lists_table2 —create=todo_lists2
```

#### Demo site links:
* http://127.0.0.1:8000/todolist/create
* http://127.0.0.1:8000/todolist/1
* http://127.0.0.1:8000/todolist
* http://127.0.0.1:8000/db
* http://127.0.0.1:8000/hello/ { any string }
* http://127.0.0.1:8000/foundation-array
* http://127.0.0.1:8000/foundation
