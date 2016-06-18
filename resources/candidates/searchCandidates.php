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
                            .($age!=null)?" AND age < :age  ":""
                            .($area!=null)?" AND area = :area  ":""
                            .($gender!=null)?" AND gender = :gender ":"";
    try {
        $db = getDB();
        $stmt = $db->query($sql);

        if($age!=null) $stmt->bindParam("age", $age);
        if($area!=null) $stmt->bindParam("area", $area);
        if($gender!=null) $stmt->bindParam("gender", $gender);

        $stmt->bindParam("profession_id", $profession_id);

        $candidates = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"candidates": ' . json_encode($candidates) . '}';

    } catch (PDOException $e) {
        //error_log($e->getMessage(), 3, '/var/tmp/php.log');
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }

}