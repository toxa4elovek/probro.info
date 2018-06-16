/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


$(document).ready(function () {

    $('.message-tips').each(function (index, elem) {
        let time = (index + 1) * 2000;

        setTimeout(function () {
            $(elem).fadeOut();
        }, time);
    })
});

console.log('app');