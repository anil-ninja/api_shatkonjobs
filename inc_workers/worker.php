<?php

$sql = "SELECT *
FROM `shatkonjobs`.`workers`
WHERE 1";

$result = mysqli_query($db_handle, $sql);
//echo $sql;


for($costsArr = array(); $cost = mysqli_fetch_assoc($result); $costsArr[] = $cost);

echo "{\"root\":{\"workers\":";
print json_encode($costsArr);
echo "}}";

?>
