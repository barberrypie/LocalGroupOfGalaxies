<?php

use Illuminate\Support\Facades\Route;



$router->get('', ['uses' => 'App\Http\Controllers\GalaxysController@select'])->name('galaxy');
$router->post('/galaxy/insert/', ['uses' => 'App\Http\Controllers\GalaxysController@insert']);
$router->post('/galaxy/delete/', ['uses' => 'App\Http\Controllers\GalaxysController@delete']);
$router->post('/galaxy/update/', ['uses' => 'App\Http\Controllers\GalaxysController@update']);

$router->get('/galaxytypes/', ['uses' => 'App\Http\Controllers\GalaxyTypesController@select'])->name('galaxytypes');
$router->post('/galaxytypes/insert/', ['uses' => 'App\Http\Controllers\GalaxyTypesController@insert']);
$router->post('/galaxytypes/delete/', ['uses' => 'App\Http\Controllers\GalaxyTypesController@delete']);
$router->post('/galaxytypes/update/', ['uses' => 'App\Http\Controllers\GalaxyTypesController@update']);

$router->get('/planets/', ['uses' => 'App\Http\Controllers\PlanetsController@select'])->name('planets');
$router->post('/planets/insert/', ['uses' => 'App\Http\Controllers\PlanetsController@insert']);
$router->post('/planets/delete/', ['uses' => 'App\Http\Controllers\PlanetsController@delete']);
$router->post('/planets/update/', ['uses' => 'App\Http\Controllers\PlanetsController@update']);

$router->get('/satellites/', ['uses' => 'App\Http\Controllers\SatellitesController@select'])->name('satellites');
$router->post('/satellites/insert/', ['uses' => 'App\Http\Controllers\SatellitesController@insert']);
$router->post('/satellites/delete/', ['uses' => 'App\Http\Controllers\SatellitesController@delete']);
$router->post('/satellites/update/', ['uses' => 'App\Http\Controllers\SatellitesController@update']);

$router->get('/starclusters/', ['uses' => 'App\Http\Controllers\StarClustersController@select'])->name('starclusters');
$router->post('/starclusters/insert/', ['uses' => 'App\Http\Controllers\StarClustersController@insert']);
$router->post('/starclusters/delete/', ['uses' => 'App\Http\Controllers\StarClustersController@delete']);
$router->post('/starclusters/update/', ['uses' => 'App\Http\Controllers\StarClustersController@update']);

$router->get('/stars/', ['uses' => 'App\Http\Controllers\StarsController@select'])->name('stars');
$router->post('/stars/insert/', ['uses' => 'App\Http\Controllers\StarsController@insert']);
$router->post('/stars/delete/', ['uses' => 'App\Http\Controllers\StarsController@delete']);
$router->post('/stars/update/', ['uses' => 'App\Http\Controllers\StarsController@update']);

$router->get('/startypes/', ['uses' => 'App\Http\Controllers\StarTypesController@select'])->name('startypes');
$router->post('/startypes/insert/', ['uses' => 'App\Http\Controllers\StarTypesController@insert']);
$router->post('/startypes/delete/', ['uses' => 'App\Http\Controllers\StarTypesController@delete']);
$router->post('/startypes/update/', ['uses' => 'App\Http\Controllers\StarTypesController@update']);

$router->get('/clusterclasses/', ['uses' => 'App\Http\Controllers\ClusterClassesController@select'])->name('clusterclasses');
$router->post('/clusterclasses/insert/', ['uses' => 'App\Http\Controllers\ClusterClassesController@insert']);
$router->post('/clusterclasses/delete/', ['uses' => 'App\Http\Controllers\ClusterClassesController@delete']);
$router->post('/clusterclasses/update/', ['uses' => 'App\Http\Controllers\ClusterClassesController@update']);
