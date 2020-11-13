<?php

if(!function_exists('preview')) {
       function preview($arr){
           echo '<pre>';
           print_r($arr);
           echo '</pre>';
       }
}
if(!function_exists('department')){
    function department(){
         $db = \Config\Database::connect();
        $query = $db->query("SELECT * FROM department;");
        $department = array();

        foreach ($query->getResult('array') as $row) {
            $id = $row['departmentID'];
            $department[$id] = $row['departmentName'];
        }
        return $department;
    }
}