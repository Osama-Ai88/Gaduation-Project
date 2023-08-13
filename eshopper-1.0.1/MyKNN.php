<?php
    //Function to count (x1 - x2)^2 , (y1-y2)^2 , etc

function forMin($sample,  $predictData,$Minn=0)
    {

        $lengthPredict = count($predictData);
        $length = count($sample);
        
        for ($i = 0; $i < $length; $i++) {
            for ($j = 0; $j < $lengthPredict; $j++) {
                if(gettype($predictData[$j])=="string"){
                    if($predictData[$j]==$sample[$i][$j]){
                        $resultForMin[$i][$j] = 0;
                    }

                    else{
                        //echo  $predictData[1]."<br>";
                        $resultForMin[$i][$j] = pow($predictData[1]-$Minn+$j,2);

                     }
                    
                }
                else{
                    $resultForMin[$i][$j] = pow($predictData[$j] - $sample[$i][$j], 2);

                }
                
            }
            $resultForMin[$i][] = $sample[$i][$lengthPredict];
            //$resultForMin = array_unique($resultForMin);
            //print_r($resultForMin);
            //echo "<br>";
        }

        $sendToSquare = square($resultForMin, $length, $lengthPredict);
        $result = getLable($sendToSquare);
        return $result;


    }


    function square($resultForMin, $length, $lengthPredict)
    {

        for ($i = 0; $i < $length; $i++) {

            $resultSquare[] = [sqrt(array_sum($resultForMin[$i]))  ,   $resultForMin[$i][$lengthPredict]];
        }
        sort($resultSquare);
        //print_r(($resultSquare));
        return $resultSquare;
    }

    function getLable($result){
        return $result;
    }













?>
