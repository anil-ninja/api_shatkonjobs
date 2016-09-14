<?php

require_once "header.php";

include 'db.php';
require 'Slim/Slim.php';


//candidates resource
require_once "resources/candidates/deleteCandidate.php";
require_once "resources/candidates/getCandidatesToCall.php";
require_once "resources/candidates/insertCandidate.php";
require_once "resources/candidates/searchCandidates.php";
require_once "resources/candidates/updateCandidate.php";
require_once "resources/auth/postUserAuth.php";

<<<<<<< HEAD

require_once "resources/worker/requestContact.php";
require_once "resources/worker/searchArea.php";
require_once "resources/worker/showContact.php";
=======
>>>>>>> 660f81891738fe567bc7fa6c6ef4c4d1e8368a84
//professions resource
require_once "resources/professions/getAllProfessions.php";

//areas resource
require_once "resources/areas/getAllAreas.php";

//app
require_once "app.php";




?>