
require('bootstrap/dist/css/bootstrap.css');
require('@fortawesome/fontawesome-free/scss/fontawesome.scss');
require('../css/lift.scss');

const $ = require('jquery');
require('bootstrap');
require('popper.js');
require('@fortawesome/fontawesome-free/js/all');



$("#test").click(function (e) {
    e.preventDefault();
    alert("hello");
});
