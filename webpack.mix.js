const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/axios.js', 'public/dist/js')
    .js('resources/js/app.js','public/dist/js')
    .js('resources/js/user/create.js','public/dist/js/user')
    .js('resources/js/user/edit.js','public/dist/js/user')
    .js('resources/js/dealer/create.js','public/dist/js/dealer')
    .js('resources/js/dealer/edit.js','public/dist/js/dealer')
    .js('resources/js/buyer/create.js','public/dist/js/buyer')
    .js('resources/js/buyer/edit.js','public/dist/js/buyer')
    .js('resources/js/category/create.js','public/dist/js/category')
    .js('resources/js/category/edit.js','public/dist/js/category')
    .js('resources/js/faq/create.js','public/dist/js/faq')
    .js('resources/js/faq/edit.js','public/dist/js/faq')
    .js('resources/js/faq_question/create.js','public/dist/js/faq_question')
    .js('resources/js/faq_question/edit.js','public/dist/js/faq_question')
    .js('resources/js/contact/create.js','public/dist/js/contact')
    .js('resources/js/contact/edit.js','public/dist/js/contact')
    .js('resources/js/promotion/create.js','public/dist/js/promotion')
    .js('resources/js/promotion/edit.js','public/dist/js/promotion')
    .js('resources/js/subcategory/create.js','public/dist/js/subcategory')
    .js('resources/js/subcategory/edit.js','public/dist/js/subcategory')
    .js('resources/js/import/create.js','public/dist/js/import')
    .js('resources/js/import/edit.js','public/dist/js/import')
    .js('resources/js/sale/create.js','public/dist/js/sale')
    .js('resources/js/sale/edit.js','public/dist/js/sale')
    .js('resources/js/product/create.js','public/dist/js/product')
    .js('resources/js/product/edit.js','public/dist/js/product')
    .js('resources/js/banner/edit.js','public/dist/js/banner')
    .js('resources/js/slider/edit.js','public/dist/js/slider')
    .js('resources/js/template/create.js','public/dist/js/template')
    .js('resources/js/template/edit.js','public/dist/js/template')
    .js('resources/js/adminAuth/login.js','public/dist/js/adminAuth')
    .js('resources/js/profile/password.js','public/dist/js/profile')
    .js('resources/js/profile/avatar.js','public/dist/js/profile')
    .js('resources/js/profile/info.js','public/dist/js/profile')
    .sass('resources/sass/app.scss', 'public/css')
    .sass('resources/css/profile.scss', 'public/css');
