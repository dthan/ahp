<?php

    /*code by : muhammad deden firdaus
      website : dthan.net*/

  $jml=$_POST['jml'];
  $kolom=$jml+1;
  $data = explode(",", $_POST['kriteria']);
  for ($i=0; $i<$kolom; $i++) { 
     echo "<tr>";
     for ($j=0; $j<$kolom; $j++) { 
        if($i==0){
           if(($i==0) && ($j==0)){
             echo "<td style='width:150px'></td>";
           } 
           else {
              echo "<td style='width:150px;background-color:#00FFFF;text-align:center;'>".$data[$j]."</td>";
           }
        }
        else {
          if($j==0){
            echo "<td style='width:150px;background-color:#40E0D0;text-align:center;'>".$data[$i]."</td>";
          }
          else if($i==$j){
            echo "<td style='width:150px;background-color:#D3D3D3'>1</td>";
          }
          else if($j>$i){
            echo "<td style='width:150px;background-color:#40E0D0'><input required = 'required' type='number' id='t-$i-$j' name='t-$i-$j' /></td>";
          }
          else {
            echo "<td style='width:150px;background-color:#40E0D0'>0</td>";
          }
        }
     }
     echo "</tr><input type='hidden' id='jml_data' name='jml_data' value='$jml' />
           <input type='hidden' id='kriteria-$i' name='kriteria-$i' value='".$data[$i]."' />";
    }
     echo "<tr><td colspan='$i'><input type='submit' value='hitung' /><input type='reset' value='reset' /><img id='loading3' style='position:relative; top:10px; display:none' src='image/loading.gif' /></td></tr>";
  

?>