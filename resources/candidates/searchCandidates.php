<?php
/**
 * Created by PhpStorm.
 * User: spider-ninja
 * Date: 6/4/16
 * Time: 1:32 PM
 */

function searchCandidates(){

    global $app;

    $age = $app->request()->get('age');
    $area = $app->request()->get('area');
    $gender = $app->request()->get('gender');
    $profession_id = $app->request()->get('profession_id');

    $sql = "SELECT * FROM candidates WHERE profession_id = :profession_id "
                            .isset($age)?" AND age < :age  ":""
                            .isset($area)?" AND area = :area  ":""
                            .isset($gender)?" AND gender = :gender ":"";
    try {
        $db = getDB();
        $stmt = $db->query($sql);

        if(isset($age)) $stmt->bindParam("age", $age);
        if(isset($area)) $stmt->bindParam("area", $area);
        if(isset($gender)) $stmt->bindParam("gender", $gender);

        $stmt->bindParam("profession_id", $profession_id);

        $candidates = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"candidates": ' . json_encode($candidates) . '}';

    } catch (PDOException $e) {
        //error_log($e->getMessage(), 3, '/var/tmp/php.log');
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }

}