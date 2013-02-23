# php-mvc-lite

Basic MVC Framework for PHP5 created by Henrique Ferreira on Feb.2013

## Usage

Setup your host server to /app

## Create your controllers

	/app/controllers/app_name.php

## Create your views

	/app/views/controller_name/action_name.php

## Examples

	http://www.your_site.com/ 

Calls default controller "application" and default action "index";
Loads /app/controller/application.php classes;
Loads Layout and View at /app/views/application/index.php;

	http://www.your_site.com/collections/item

Calls controller "collections" and default action "item";
Loads /app/controller/collections.php classes;
Loads Layout and View at /app/views/collections/item.php;
