<?php

     /*
      for AHP calculation
      https://github.com/dthan
      dthan.net
      */

  $jml=$_POST['jml'];

     for ($i=1; $i <=$jml  ; $i++) { 
     	echo "<tr><td>nama kriteria ke $i : </td><td><input required='' type='text' id='kriteria-$i' /></td></tr><br>";
     }

  echo "<tr>
        <td><input type='hidden' id='jumlah_kriteria' value='$jml'/></td>
        <td><input type='submit' value='submit' /><img id='loading2' style='position:relative; top:10px; display:none' src='image/loading.gif' /></td>
        </tr>
         ";
?>
