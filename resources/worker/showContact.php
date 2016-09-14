<?php


function searchCandidates(){

    global $app;

   
    $area_id = $app->request()->get('area_id');
  
    $profession_id = $app->request()->get('profession_id');

 
    $area_str = ($area_id!=null)?" AND area_id = :area_id  ":"";
  

    $sql = "SELECT id,name,gender,age,area,profession_id FROM candidates WHERE profession_id =:profession_id  AND area IN (SELECT area FROM candidates Where area_id=:area_id ) "
                          
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