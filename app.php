<?php
/**
 * Created by PhpStorm.
 * User: spider-ninja
 * Date: 6/4/16
 * Time: 1:12 PM
 */

\Slim\Slim::registerAutoloader();

global $app;

if(!isset($app))
    $app = new \Slim\Slim();


//$app->response->headers->set('Access-Control-Allow-Origin',  'http://localhost');
$app->response->headers->set('Access-Control-Allow-Credentials',  'true');
/*$app->response->headers->set('Access-Control-Allow-Methods', 'GET,PUT,POST,DELETE,OPTIONS');
$app->response->headers->set('Access-Control-Allow-Headers', 'X-CSRF-Token, X-Requested-With, Accept, Accept-Version, Content-Length, Content-MD5, Content-Type, Date, X-Api-Version');
*/
$app->response->headers->set('Content-Type', 'application/json');

/* Starting routes */

$app->get('/candidates/to-call','getCandidatesToCall');
$app->post('/candidates', 'insertCandidate');
$app->put('/candidates/:id','updateCandidate');
$app->delete('/candidates/:id','deleteCandidate');
$app->get('/candidates/search','searchCandidates');
<<<<<<< HEAD
$app->get('/candidates/search','requestContact');
$app->post('/candidates/search','searchArea');
$app->post('/candidates/search','showContact');
=======






>>>>>>> 660f81891738fe567bc7fa6c6ef4c4d1e8368a84
$app->get('/professions','getAllProfessions');
$app->get('/areas','getAllAreas');

$app->post('/auth', 'userAuth');

/* Ending Routes */

$app->run();