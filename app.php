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

/* Starting routes */

$app->get('/candidates/to-call','getCandidatesToCall');
$app->post('/candidates', 'insertCandidate');
$app->put('/candidates/:id','updateCandidate');
$app->delete('/candidates/:id','deleteCandidate');
$app->get('/candidates/search','searchCandidates');

/* Ending Routes */

$app->run();