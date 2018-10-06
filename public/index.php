<?php
/**
 * Created by PhpStorm.
 * User: shafiur
 * Date: 10/6/18
 * Time: 5:26 PM
 */

main::start();

class main {

    static public function start() {

        $file = fopen( "studentinfo.csv",  "r");

        while (! feof($file))
        {

            $record [] = fgetcsv($file);

            $record [] = $record;
        }

        fclose($file);
        print_r($record);


    }



}


