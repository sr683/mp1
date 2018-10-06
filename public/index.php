<?php
/**
 * Created by PhpStorm.
 * User: shafiur
 * Date: 10/6/18
 * Time: 5:26 PM
 */

main::start( "studentinfo.csv");

class main {

    static public function start($filename) {
        
        $records = csv::getRecords($filename); 
        print_r($records);           

    }

}

class csv {
    
    
    static public function getRecords($filename) {
        
        $file = fopen( $filename, "r");

        while (! feof($file)) 
        {

            $record  = fgetcsv($file);

            $records [] = $record;
        }

        fclose($file);
        return$records;
    }
    
}
