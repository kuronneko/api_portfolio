<template>
    <div class="font-monospace text-white">
        <div class="text-center text-white">
            <p><a href="https://laravel.com" target="_blank"><img
                        src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
                        width="400"></a></p>
            <p>
                <a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg"
                        alt="Build Status"></a>
                <a href="https://packagist.org/packages/laravel/framework"><img
                        src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
                <a href="https://packagist.org/packages/laravel/framework"><img
                        src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
                <a href="https://packagist.org/packages/laravel/framework"><img
                        src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
            </p>
        </div>
        <div class="text-start">
            <br>
            <h1>PortfolioGestor9000</h1>
            <br>
            <h4>Description:</h4>
            <p>PortofolioGestor9000 is an API developed with Laravel and VueJS technologies. The API was developed with
                Laravel using a relational database design from scratch, and VueJS+Boostrap5 was used for the user
                interface and managing the database content via the API.</p>
            <p>The purpose of this project is to consume this content (JSON Persona profile) in a portfolio developed with raw languages and
                hosted in github pages.</p>
        </div>

        <div class="text-start">
            <h4>Features:</h4>
            <ul>
                <li>Relational Database desing from Scratch</li>
                <li>Laravel API using Laravel Passport</li>
                <li>VueJS to asyncronous request</li>
                <li>Bootstrap 5 for the UI</li>
                <li>Forms Validate with Vuelidate</li>
                <li>Pop-up Messages with SweetAlert2</li>
                <li>Loader effect with VueLoader</li>
                <li>SPA Design</li>
            </ul>
        </div>

        <div class="text-start">
            <h4>Technologies/Libraries:</h4>
            <ul>
                <li>Laravel 8, VueJS 3, PHP 7.4, Bootstrap 5, CSS, Javascript, Laravel-Passport, Vue-SweetAlert2,
                    Vuelidate,
                    Vue-Loader, Vue-Fontawesome, Vue-Router, Vue-Axios</li>
            </ul>
        </div>

        <div class="text-start">
            <h4>Preview:</h4>
            <p> <img src="https://raw.githubusercontent.com/kuronneko/kuronneko.github.io/master/assets/img/portfolioapi.png"
                    width="450"> </p>
        </div>

        <div class="text-start">
            <h4>How to install</h4>
            <ul>
                <li>cp .env.example .env</li>
                <li>composer install</li>
                <li>php artisan key:generate</li>
                <li>php artisan migrate:refresh --seed</li>
                <li>php artisan passport:install --force</li>
                <li>npm install && npm run dev</li>
                <li>demo user: admin@gmail.com:12345678</li>
            </ul>
        </div>

        <div class="text-start">
            <h4>License</h4>
            <p>
                The Laravel framework is open-sourced software licensed under the [MIT
                license](https://opensource.org/licenses/MIT).</p>
        </div>
    </div>

</template>
