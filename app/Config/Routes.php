<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');
$routes->get('student', 'StudentController::menu');
$routes->get('student/register', 'StudentController::register');
$routes->post('student/store', 'StudentController::store');
$routes->get('student/display', 'StudentController::display');
$routes->get('student/search', 'StudentController::search');
$routes->match(['get', 'post'], 'student/update', 'StudentController::update');
$routes->match(['get', 'post'], 'student/delete', 'StudentController::delete');