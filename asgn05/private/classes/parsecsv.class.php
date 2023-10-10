<?php

class ParseCSV {

  public static $delimiter = ',';

  private $filename;
  private $header;
  private $data=[];
  private $row_count = 0;

  // This function is used to set up a new object's properties. If the filename value is empty, it calls the file() function.
  public function __construct($filename='') {
    if($filename != '') {
      $this->file($filename);
    }
  }

  // This function checks if the filename exists and is readable. If not, it displays a message stating so. If it passes those checks, it assigns the file's name to the variable $filename within this class.
  public function file($filename) {
    if(!file_exists($filename)) {
      echo "File does not exist.";
      return false;
    } elseif(!is_readable($filename)) {
      echo "File is not readable.";
      return false;
    }
    $this->filename = $filename;
    return true;
  }

  // This function is used to sort through and retrieve the data from the used_bicycles.csv file. It first checks if the file has been set to the $filename variable. It forces it to begin reading from the beginning of the file used in the reset() function. It opens the file in read-only mode specified with the fopen() function.
  // It then makes sure that the entire file is read through using a while loop. It reads each line of the csv file using the fgetcsv() function, which makes sure the entire line is read using the value 0, and ensures that the delimiter is set to a comma previously assigned by the public static $delimiter variable. It sets the line's information into the $row variable. It then forces the program to continue if a row is empty. Then it makes sure the first line of the file is set as the header row (Brand, Model, Year, etc.). After the first loop, it will combine the next rows of data into an associative array associating the header row values as keys to the $data[] array values. Then it makes sure to move onto the next row.
  // It then closes the file and returns all of the parsed data from the file.
  public function parse() {
    if(!isset($this->filename)) {
      echo "File not set.";
      return false;
    }

    $this->reset();

    $file = fopen($this->filename, 'r');
    while(!feof($file)) {
      $row = fgetcsv($file, 0, self::$delimiter);
      if($row == [NULL] || $row === FALSE) { continue; }
      if(!$this->header) {
        $this->header = $row;
      } else {
        $this->data[] = array_combine($this->header, $row);
        $this->row_count++;
      }
    }
    fclose($file);
    return $this->data;
  }

  // This function would be used if you wanted to keep the results from a previous run of the parse() function, so that the data would still be stored. However, it isn't called anywhere in this class or bicycles.php.
  public function last_results() {
    return $this->data;
  }

  // This function returns the row count value when reading through the csv file, making sure that the value is stored in a controlled way within any new instance of the ParseCSV class created elsewhere.
  public function row_count() {
    return $this->row_count;
  }

  // This function is used to ensure that the file being parsed will start reading from the beginning of the file. It will only be used within this class and cannot be called elsewhere.
  private function reset() {
    $this->header = NULL;
    $this->data = [];
    $this->row_count = 0;
  }

}

// 

?>