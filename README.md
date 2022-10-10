<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# PortfolioGestor 9000
### Description: 
PortfolioGestor9000 is an API REST developed with Laravel and VueJS technologies. The API was developed with Laravel using a relational database design from scratch, and VueJS+Boostrap5 was used for the user interface and managing the database content via the API.

The purpose of this project is to consume this content (JSON Persona profile) in a portfolio developed with raw languages and hosted in github pages.

### Features:
* Relational Database desing from Scratch
* Laravel API REST using Laravel Passport
* VueJS to asyncronous request
* Bootstrap 5 for the UI
* Forms Validate with Vuelidate
* Pop-up Messages with SweetAlert2
* Loader effect with VueLoader
* SPA Design

### Technologies/Libraries:
* Laravel 8, VueJS 3, PHP 7.4, Bootstrap 5, CSS, Javascript, Laravel-Passport, Vue-SweetAlert2, Vuelidate, Vue-Loader, Vue-Fontawesome, Vue-Router, Vue-Axios

### Preview:
<p> <img src="https://github.com/kuronneko/kuronneko.github.io/blob/master/assets/img/portfolioapi.png" width="450"> </p>

### How to install
* cp .env.example .env
* composer install
* php artisan key:generate
* php artisan migrate:refresh --seed
* php artisan passport:install --force
* npm install && npm run dev
* demo user: admin@gmail.com:12345678

### Database Design:
<p> <img src="https://raw.githubusercontent.com/kuronneko/kuronneko.github.io/master/assets/img/portfoliodb.png" width="450"> </p>

### How to use:
* Create an Account
* Create New Persona [+]
* Add New Skills to your Persona
* Add New Socials to your Persona
* Add New Project to your Persona
* Add Details to your Project
* Enable Persona Changing Status Switch
* Click on the top right corner of the index table to get JSON URL and TOKEN info
* Consumes the JSON everywhere you want

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
