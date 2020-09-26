<?php 
//to print triangle on api home screen
function print_rectangle($rows, $columns) 
{ 
	$i; 
    $j; 
	for ($i = 1; $i <= $rows; $i++) 
	{ 
		for ($j = 1; $j <= $columns; $j++) 
		{ 
            //the matrix
			if ($i == 1 || $i == $rows){
                echo("*");		 
            }
            //first triangle
            if(($i>1 && $i<8) && ($j==(($columns/2)-$i) || $j==(($columns/2)+$i))){
                if($i ==7 && $j==(($columns/2)+$i)){
                    continue;
                }else{
                    echo ('*');
                }
            }
            //first connect line
            if($i==7 && $j>($columns/2)-$i && $j<($columns/2)+$i-7){
                echo ('*');
            }
            
            if(($i>7 && $i<15) && ($j==(($columns/2)-($i*2)+10) || $j==(($columns/2)+($i*2)-10))){
                echo ('*');
            }
            if($i>14 && $i<17 && ($j==(($columns/2)-($i*2)+4) || $j==(($columns/2)+($i*2)-11))){
                echo ('*');    
            }
            //second triangle
            if(($i>14 && $i<21) && ($j==(floor($columns/4)-$i) || $j==(floor($columns/2)+$i-50))){ 
                echo ('*');
            }
            //Third triangle
            if(($i>14 && $i<17) && ($j==(floor($columns/4)-$i+64) || $j==(floor($columns/2)+$i+14))){ 
                echo ('*');
            }
            //some finishing below
            if(($i>16 && $i<21) && ($j==(floor($columns/4)-$i+68) || $j==(floor($columns/2)+$i+18))){ 
                if($i==18 ){
                    continue;
                }else{
                    echo ('*');
                }
            }
            //second and third connect line
            if($i==18 && $j>(floor($columns/4)-$i+10) && $j<(floor($columns/2)+$i-22)){
                echo ('*');
            }		 
			else{
                echo str_repeat('&nbsp;', 1);	 
            }

		} 
		echo("</br>"); 
	} 

} 
	$rows = 21; 
	$columns = 90; 
	print_triangle($rows, $columns); 

?> 
