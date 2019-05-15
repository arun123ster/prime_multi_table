<?php 
if(php_sapi_name() === 'cli'){ // check if executed thru command line or not
  @$limit = $_SERVER['argv'][1];
  if($limit > 0){
    $primeNumbers = getPrimeNumbers($limit);    
    echo "\t";
    $primCount = count($primeNumbers);    
    for($c=0;$c<$primCount;$c++) {
      echo $primeNumbers[$c]."\t"; // Print X axis
    }
    echo "\n";
    for($i=0;$i<$primCount;$i++) {
        if($primeNumbers[$i]>9) // check digits if 2 digit adding extra space for formatting
            echo $primeNumbers[$i]."  |\t";
        else
            echo $primeNumbers[$i]."   |\t";
        for($j=0;$j<$primCount;$j++) {
            echo $primeNumbers[$i] * $primeNumbers[$j] ."\t"; //Printing product 
        }
        echo "\n";
    }
  } else {
    echo "\nInvalid Limit";
  }
} else {
  echo "\nNot Allowed";
}

function getPrimeNumbers($limit=0): array {
  $primeArray = array();
  if(!empty($limit)) {    
    $n = 2 ;
    $cnt = 0 ; // variable counter for each obtained prime number
    while ($cnt < $limit) {
      $divCnt=0;
      for ( $i=1;$i<=$n;$i++) {
        if (($n%$i)==0) {
          $divCnt++;
        }
      }
      if ($divCnt<3) { //check division count -- <3 means prime as it's divisible by same and 1 
        array_push($primeArray, $n);
        $cnt++;
      }
      $n++;
    }
  }
  return $primeArray;
}
?>