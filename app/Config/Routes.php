<?php

use CodeIgniter\Router\RouteCollection;

use App\Controllers\Building; 

/**
 * @var RouteCollection $routes
 */
$routes->get('/', [Building::class, 'index']);
$routes->get('building/create', [Building::class, 'create']);  
$routes->get('building/type/(:segment)', [Building::class, 'type']);
$routes->get('building/state/(:segment)', [Building::class, 'state']);
$routes->get('building/report', [Building::class, 'report']);
$routes->post('building/ajaxDatatable', [Building::class, 'ajaxDatatable']);
$routes->post('building/store', [Building::class, 'store']);
$routes->get('building/(:segment)', [Building::class, 'show']);    
$routes->get('building/(:segment)/edit', [Building::class, 'edit']);
$routes->get('building/(:segment)/delete', [Building::class, 'delete']);
