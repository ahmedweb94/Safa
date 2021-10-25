#Safa Task

Safa Task is laravel project to filter the github repositories 

## Installation

clone the project
```bash
git clone https://github.com/ahmedweb94/Safa.git
``` 
then run 
```bash
composer update
``` 
change the .envexample to .env

run command
```bash
php artisan serve
``` 

## Usage
project has default filters you can send your filter in the url or on postman parameters

use(date) to filter about date format (Y-m-d)
use(language) to filter about language 
use(limit) for get only specific number of repositories
use(sort) to sort repositories by (default=>stars)
use(order) to order repositories  (asc,desc)
