<?php


function requestContact(){

global $app;



    $age = $app->request()->get('age');
    $area_id = $app->request()->get('area_id');
    $gender = $app->request()->get('gender');
    $profession_id = $app->request()->get('profession_id');
    $mobile = $app->request()->get('mobile');
   

  

    $sql = "SELECT id,name,gender,age,profession_id,native_address,mobile FROM candidates WHERE profession_id =:profession_id  AND area IN (SELECT area FROM candidates Where area_id=:area_id limit 0,3) "
                          
        $db = getDB();
        $stmt = $db->prepare($sql);

      
        if($area_id!=null) $stmt->bindParam("area_id", $area_id);
      

        $stmt->bindParam("profession_id", $profession_id);

        $stmt->execute();
        $candidates = $stmt->fetchAll(PDO::FETCH_OBJ);
        $db = null;
        echo '{"candidates": ' . json_encode($candidates) . '}';

    } catch (PDOException $e) {
        //error_log($e->getMessage(), 3, '/var/tmp/php.log');
        echo '{"error":{"text":' . $e->getMessage() . '}}';
    }

}   