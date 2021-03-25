<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}


$routes->group('auth', function ($routes) {
	$routes->get('sign-up', 			'Auth::signup', 		['as' => 'signup']);
	$routes->get('verify/(:any)', 		'Auth::verify/$1', 		['as' => 'verify']);
	$routes->get('sign-in', 			'Auth::signin', 		['as' => 'signin']);
	$routes->get('forgot-password', 	'Auth::forgot', 		['as' => 'forgot']);
	$routes->get('verify-password', 	'Auth::verifyforgot', 	['as' => 'verifyforgot']);
	$routes->get('destroy', 			'Auth::destroy', 		['as' => 'destroy']);
});
/**
 * Route untuk form edit password
 */
$routes->get(date('dmy') * date('dmy') . '/(:any)', 		'Auth::updatepassword/$1', ['filter' => 'forgot']);

$routes->get('dashboard', function () {
	return "HALAMAN DASHBOARD BERHASIL LOGIN";
}, ['as' => 'dashboard']);
