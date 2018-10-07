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


    }

}

class csv {
    
    
    static public function getRecords($filename) {
        
        $file = fopen( $filename,"r");
        $fieldNames = array ();
        $count=0;

        while (! feof($file)) 
        {

            $record  = fgetcsv($file);
            if ($count == 0 ) {

                $fileNames = $records;
            } else {

                $records[] = recordFactory::create ($fieldNames, $record);
            }

            $count++;

            $records [] = $record;
        }

        fclose($file);
        return $records;
    }
    
}


class recordFactory 



