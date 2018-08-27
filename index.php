<?php

/**
 *
 * @category     Charts
 * @author       Adrian Villamayor Sanchez
 * @version      1.0
 * @description  Generate a pure css pie chart with php
 */

public function pieGenerator(){
    $sum = 0;
    $percentages = array(11, 10, 61, 14, 4);
    foreach($percentages as $key){
        $sum = $sum + $key;
    }
    if($sum == 100){
        $pieSize = 200; 
        $baseColor = "#fff";
        $colors = array('#66b9e4', '#AFD8F8', '#a5c14a', '#EDC240', '#EA6941');
        $numberOfSlices = count($percentages);
        
        $sizeNum = $pieSize;
        $pieSize = $pieSize."px"; 
        
        //PIECONTAINER
        $chart = '<div style="display: inline-block;">';
            //PIEBACKGROUND
            $chart .= '<div class="pieBackground" style="width:'.$pieSize.';height:'.$pieSize.';position:relative;border-radius:'.$pieSize.';background-color:'.$baseColor.'">';
            $beforeDegree = 0;
            $degree = 0;

            for($i=0;$i<$numberOfSlices;$i++){
                //NEWSLICE
                $chart .= '<div style="width:'.$pieSize.'; height:'.$pieSize.';position:absolute;border-radius:'.$pieSize.';top:0px; left:0px; clip:';

                $piePercentage = $percentages[$i];

              if($piePercentage<=50){
                  $degree = floatval((180*$piePercentage)/50);

                  $chart.= "rect(0px,".$pieSize.",".$pieSize.",".(($sizeNum)/2)."px);";
                  if($i != 0){
                      $chart.= "transform: rotate(".$beforeDegree."deg);";
                  }
                  $chart .='">';
                      //PIE
                      $chart .= '<div style="width:'.$pieSize.'; height:'.$pieSize.';position:absolute;border-radius:'.$pieSize.'; background-color:'.$colors[$i].'; top:0px; left:0px; clip:rect(0px, '.(($sizeNum)/2).'px, '.$pieSize.', 0px);';

                      $chart .= 'transform: rotate('.$degree.'deg);';
                      $chart .='"></div>';
                      //FIN PIE

                  $chart .='</div>';
                  
                  $beforeDegree += $degree; 

              }else{
                  $chart.= "rect(0px,".($sizeNum)."px,".($sizeNum)."px,".(($sizeNum-100)/2)."px);";
                  $chart.= "transform: rotate(".$beforeDegree."deg);";
                  $chart .='">';

                      //PIE
                      $chart .= '<div style="width:'.$pieSize.'; height:'.$pieSize.';position:absolute;border-radius:'.$pieSize.'; background-color:'.$colors[$i].'; top:0px; left:0px; clip:rect(0px, '.(($sizeNum)/2).'px, '.$pieSize.', 0px);';

                      $chart .= 'transform: rotate(180deg);';
                      $chart .='"></div>';
                      //FIN PIE

                  $chart .='</div>';

                  //NEW NEWSLICE
                  $chart .= '<div style="width:'.$pieSize.'; height:'.$pieSize.';position:absolute;border-radius:'.$pieSize.';top:0px; left:0px; clip:rect(0px,'.$pieSize.','.$pieSize.','.(($sizeNum)/2).'px);';
                  
                  if($i != 0){
                      $beforeDegree = $beforeDegree - 1;
                      $chart.= "transform: rotate(".(180+$beforeDegree)."deg);";
                      $chart .='">';

                  }
                  if($i != 0){
                      $beforeDegree = $beforeDegree + 1;
                          //PIE
                          $chart .= '<div style="width:'.$pieSize.'; height:'.$pieSize.';position:absolute;border-radius:'.$pieSize.'; background-color:'.$colors[$i].'; top:0px; left:0px; clip:rect(0px, '.(($sizeNum)/2).'px, '.$pieSize.', 0px);';
                          
                      $degree = floatval((($piePercentage-50)*180)/50);
                  }
                  if($i != 0){
                      $degree = $degree + 1;
                      $chart .= 'transform: rotate('.$degree.'deg);';
                  }
                  if($i != 0){
                      $degree = $degree - 1;
                      $chart .='"></div>';
                      $beforeDegree += (180+$degree);
                  }
                  $chart .='</div>';
              }
            }
            $chart .='</div>';

        $chart .='</div>';
    }
}
?>
