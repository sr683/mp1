<html>

  <head>

    <h1> Shafiur Rahman</h1>
    <h2>IS-601 Mini Project </h2>


    <br>

   </head>



 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</html>


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
        foreach ($records as $record)
        {
            if ($count == 0) {

                $array = $record->returnArray();

                $fields = array_keys($array);

                $values = array_values($array);

                self::generateHeader($fields);
                self::generateValues ($values);


            } else {

                $array = $record->returnArray();
                $values = array_values($array);

                self:: generateValues($values);

            }
            $count++;

        }
    }



    public static function generateHeader($fields)
{

      echo '<html> <body> <table class="table table-bordered"><th><tr>';

    $y = count($fields);

    for ($x = 0; $x < $y; $x++){

        $num = $fields[$x];

        echo '<th>' . $num . '</th>';
    }

    echo '</tr></td>';
}

    static public function generateValues ($values)
    {

        $y = count($values);

        echo 'tr';

        for ($z = 0; $z < $y; $z++) {

        $txt = $values [$z];

        echo '<td>' . $txt . '</td>';
    }


                echo '</tr></body> </html>';
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

        foreach ($record as $property => $value) {

            $this->createProperty($property, $value);

        }

    }

    public function returnArray () {

        $array = (array) $this;

        return $array;
}

    public function createProperty ($name = 'studentID', $value = "0001") {

        $this->{$name} = $value;

    }

}


class recordFactory {

    public static function create (Array $fieldNames = null, Array $values= null) {

        $record = new record($fieldNames, $values);
        return $record;
    }
}
