<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Default route for regular users
$routes->group('user', ['filter' => 'login'], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->post('analyzeAndSave', 'User::analyzeAndSave');
    $routes->get('uploadFotoProfil', 'User::uploadFotoProfil');
    $routes->post('saveCat', 'User::saveCat');
    $routes->get('profile', 'User::profile');
    $routes->post('updateProfile', 'User::updateProfile');
    $routes->get('fetchData', 'SensorController::fetchData');
});

$routes->post('saveData', 'SensorController::store');
$routes->get('fetchData', 'SensorController::fetchData');

// Route for admin
$routes->group('admin', ['filter' => 'role:admin'], function ($routes) {
    $routes->get('/', 'AdminController::index');
    $routes->get('manageuser', 'AdminController::manageuser');
    $routes->get('feedback', 'AdminController::feedback');
    $routes->post('deleteUser/(:num)', 'AdminController::deleteUser/$1');
    $routes->post('deleteFeedback/(:num)', 'AdminController::deleteFeedback/$1');
});

// Add route for login
// $routes->get('/', 'User::index');
// $routes->get('/', 'AdminController::index');
// $routes->get('/admin', 'AdminController::index', ['filter' => 'role:admin']);
// $routes->get('/admin/home', 'AdminController::index', ['filter' => 'role:admin']);
// $routes->get('/admin/manageuser', 'AdminController::manageuser', ['filter' => 'role:admin']);
// $routes->get('/admin/feedback', 'AdminController::feedback', ['filter' => 'role:admin']);
// $routes->get('/admin/index', 'AdminController::index', ['filter' => 'role:admin']);
// $routes->get('/admin/manageuser/(:num)', 'AdminController::detail/$1', ['filter' => 'role:admin']);
// $routes->get('/admin/detail', 'AdminController::detail', ['filter' => 'role:admin']);
// $routes->post('/user/saveData', 'SensorController::saveData');

// $routes->get('/user/sendSensorData', 'User::sendSensorData');
// $routes->get('/user/getLatestSensorData', 'User::getLatestSensorData');


// $routes->get('/', 'User::index');
// $routes->post('/user/saveFeedback', 'User::saveFeedback');
// $routes->get('/fillingpage', 'FillingPageController::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * This will load environment-based routes if they exist, allowing
 * for different configurations based on the current environment.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
