<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# PortfolioGestor 9000
### Description: 
PortofolioGestor9000 is an API developed with Laravel and VueJS technologies. The API was developed with Laravel using a relational database design from scratch, and VueJS+Boostrap5 was used for the user interface and managing the database content via the API.

The purpose of this project is to consume this content in a portfolio developed with raw languages and hosted in github pages.

### Features:
* Relational Database desing from Scratch
* Laravel API
* VueJS to asyncronous request
* Bootstrap 5 for the UI
* Forms Validate with Vuelidate
* Pop-up Messages with SweetAlert2
* Loader effect with VueLoader

### Technologies/Libraries:
* Laravel 8, VueJS 3, PHP 7.4, Bootstrap 5, CSS, Javascript, Laravel-Passport, Vue-SweetAlert2, Vuelidate, Vue-Loader, Vue-Fontawesome, Vue-Router, Vue-Axios

### Preview:
<p> <img src="https://github.com/kuronneko/kuronneko.github.io/blob/master/assets/img/portfolioapi.png" width="450"> </p>

### How to install
* cp .env.example .env
* composer install
* php artisan key:generate
* php artisan migrate:refresh --seed
* npm install && npm run dev
* login as admin@gmail.com:12345678

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
