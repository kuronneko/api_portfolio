<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="font-monospace text-white">
                    <div class="text-center text-white">
                        <p><img class="img-fluid"
                                    src="https://raw.githubusercontent.com/kuronneko/kuronneko.github.io/master/assets/img/laravel-vue.png"
                                    width="450"></p>
                        <p>
                           <img
                                    src="https://travis-ci.org/laravel/framework.svg" alt="Build Status">
                            <img
                                    src="https://img.shields.io/packagist/dt/laravel/framework"
                                    alt="Total Downloads">
                           <img
                                    src="https://img.shields.io/packagist/v/laravel/framework"
                                    alt="Latest Stable Version">
                            <img
                                    src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
                        </p>
                    </div>
                    <div class="text-start">
                        <br>
                        <h1>PortfolioGestor9000</h1>
                        <br>
                        <h4>Description:</h4>
                        <p>Laravel API REST, capable to generate and modify a JSON with information about a persona profile, you can use it as a web service (through the UI) and consume the JSON in your static portfolio website to make dynamic it.</p>
                        <p>The purpose of this project is manage the information of a static portfolio website developed with raw languages and hosted in github pages.</p>
                    </div>

                    <div class="text-start">
                        <h4>Features:</h4>
                        <ul>
                            <li>Relational Database desing from Scratch</li>
                            <li>Laravel API REST using Laravel Passport</li>
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
                            <li>Laravel 8, VueJS 3, PHP 7.4, Bootstrap 5, CSS, Javascript, Laravel-Passport,
                                Vue-SweetAlert2,
                                Vuelidate,
                                Vue-Loader, Vue-Fontawesome, Vue-Router, Vue-Axios</li>
                        </ul>
                    </div>

                    <div class="text-start">
                        <h4>Preview:</h4>
                        <p> <a href="https://raw.githubusercontent.com/kuronneko/kuronneko.github.io/master/assets/img/portfolioapi.png" target="_blank"><img class="img-fluid" src="https://raw.githubusercontent.com/kuronneko/kuronneko.github.io/master/assets/img/portfolioapi.png"
                                width="450"></a></p>
                    </div>

                    <div class="text-start">
                        <h4>How to install:</h4>
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
                        <h4>Database Design:</h4>
                        <p><a href="https://raw.githubusercontent.com/kuronneko/kuronneko.github.io/master/assets/img/portfoliodb.png" target="_blank"><img class="img-fluid" src="https://raw.githubusercontent.com/kuronneko/kuronneko.github.io/master/assets/img/portfoliodb.png"
                                width="450"></a></p>
                    </div>

                    <div class="text-start">
                        <h4>How to use:</h4>
                        <ul>
                            <li>Create an Account</li>
                            <li>Create New Persona [+]</li>
                            <li>Add New Skills to your Persona</li>
                            <li>Add New Socials to your Persona</li>
                            <li>Add New Project to your Persona</li>
                            <li>Add Details to your Project</li>
                            <li>Enable Persona Changing Status Switch</li>
                            <li>Click on the top right corner of the index table to get JSON URL and TOKEN info</li>
                            <li>Consumes the JSON everywhere you want</li>
                        </ul>
                    </div>
                    <br>
                    <div class="text-center">
                        <h4>License</h4>
                        <p>
                            The Laravel framework is open-sourced software licensed under the [MIT
                            license](https://opensource.org/licenses/MIT).</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
