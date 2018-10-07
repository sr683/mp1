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
        $table = html::generateTable($records);


    }

}

class html {

    public static function generateTable ($records) {

        $count = 0;
        foreach ($records as $record);
        {
            if ($count == 0) {

                $array = $record->returnArray();

                $fields = array_keys($array);

                $values = array_values($array);

                print_r($fields);

                print_r($values);

            } else {

                $array = $record->returnArray();
                $values = array_values($array);
                print_r($values);

            }
            $count++;

        }
    }

}

public static function generateHeader($fields)
{

    echo '<html> <body> <table class="table table-bordered"><thead><tr>';

    $y = count($fields);

    for ($x = 0; $x < $y; x++){

        $num = $fields[$x];

        echo '<th>' . $num . '</th>';
    }

    echo '</tr></thead>';
}

Public static function generateValues ($values){

    $y = count($values);

    echo 'tr';

    for(z = 0; $z; < $y; $z++)
    {
        $
    }


    </body> </html>

}


class csv {
    
    
    static public function getRecords($filename) {
        
        $file = fopen( $filename,"r");
        $fieldNames = array ();
        $count=0;

        while (! feof($file)) 
        {

            $record  = fgetcsv($file);
            if ($count == 0) {

                $fieldNames = $record;

            }
            else {

                $records[] = recordFactory::create ($fieldNames, $record);
            }

            $count++;
        }

        fclose($file);

        return $records;
    }
    
}

class record {

    public function __construct (Array $fieldNames = null, $values = null )
    {
        $record = array_combine ($fieldNames, $values);

        foreach ($record as $property=> $value) {

            $this->createProperty($property, $value);

        }

    }

    public function returnArray () {

        $array = (array) $this;

        return $array;
}

    public function createProperty ($name = 'student ID', $value = "0001") {

        $this->{$name} = $value;

    }

}


class recordFactory {

    public static function create (Array $fieldNames = null, Array $values= null) {

        $record = new record($fieldNames, $values);
        return $record;
    }
}




