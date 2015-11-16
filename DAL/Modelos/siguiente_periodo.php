<?php

function siguientePeriodo($periodoult, $periodoact, $anoult, $anoact) {
    $numperiodos=0;

    if ($periodoult === "vac1" or
        $periodoact === "vac1") {
        $arr = array(
            "bim1" => 1,
            "bim2" => 2,
            "vac1" => 3,
            "bim3" => 4,
            "bim4" => 5
                );
    } else {
        $arr = array("bim1" => 1,
            "bim2" => 2,
            "bim3" => 3,
            "bim4" => 4
        );
    }
    
    
    if($anoult==$anoact){
        $numperiodos=$arr[$periodoact]-$arr[$periodoult];
  
            $numperiodos--;
        
   }elseif($anoact-$anoult>=1){
       $numperiodosaux1=count($arr)-$arr[$periodoult];
      
       $numperiodosaux2=$arr[$periodoact]-1;
       $numperiodos=$numperiodosaux2 + $numperiodosaux1;
       if($anoact-$anoult>1){
           $numperiodos=$numperiodos + (($anoact-$anoult-1)*4);
       }
   }
   
    return $numperiodos;

}






?>
