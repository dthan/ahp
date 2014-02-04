<!--
    code by : muhammad deden firdaus
    website : dthan.net
 -->
<html>
<head>
	<title>Form Perhitungan AHP</title>
	<link rel="stylesheet" href="css.css" type="text/css" media="screen">
	<script type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="jquery-ui-1.8.16.custom.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		  //menentukan jumlah kriteria
		 $("#ahp").submit(function() {		   
			 var jml = $("#jml_kriteria").val();
			 $('#loading1').show();
			  $.ajax({
			     type: "POST",
			     url : "buat_form.php",    
				 data: "jml="+jml+"",
			     success: function(data){ 
			    $('#loading1').hide();
			    $('#hasil').show();
			     document.getElementById("hasil").innerHTML = data;
			 
		       }	 
		     });
		     return false;
	    });
          
          //mengambil dari form kriteria
		  $("#hasil").submit(function() {		    
			 var jml = $("#jumlah_kriteria").val();
			 var i=1;
			 var kriteria = new Array();
			 for (i ; i <= jml; i++) {
			 	kriteria[i]=$('#kriteria-'+i+'').val();
			 }
			  $('#loading2').show();
			  $.ajax({
			     type: "POST",
			     url : "buat_tabel.php",    
				 data: "jml="+jml+"&kriteria="+kriteria,
				     success: function(data){ 
				     $('#loading2').hide();
				     $('#tabel').show();
				     document.getElementById("tabel").innerHTML = data;
				 }	 
		     });
		     return false;
	    });

          //mengambil dari form input pembobotan
		   $("#input_ahp").submit(function() {
		   	  //var n = $('#tabel2')[0].scrollHeight;
		   	  $('#loading3').show();
			  $.ajax({
			     type: "POST",
			     url : "hitung_ahp.php",    
			     data: $("#input_ahp").serialize(),
				     success: function(data){ 
				    
				     $('#loading3').hide();
				     $('#tabel2').show();
					 document.getElementById("tabel2").innerHTML = data;
					 $('#mulai').show();
					 $('#mulai').focus();
				 }	 
		     });
		     return false;
	    });

		$("#mulai").click(function() {
		    	$('#hasil').hide();
		    	 $('#tabel').hide();
		    	 $('#tabel2').hide();
		    	 $('#mulai').hide();
		    	return false;
		 });


   $("#jml_kriteria").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 || 
             // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) || 
             // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
              
				event.preventDefault(); 
				
            }   
        }
    });
	});
	</script>
</head>
<body>
<div class='container'>
<center>
	<div class='header'>
	<table>
    <tr><h1><br>Form Penghitungan</h1></tr>
	<tr><h1>Analytical Hierarcy Process (AHP)</h1></tr>
	</table>
	</div>
	<div class='tabel'>
	<form id="ahp" action="" method="post">
		<table>
		<tr></tr>
		<tr></tr>
		<tr></tr>
		<tr>
		<td>Jumlah kriteria</td>
        <td><input required = "required" type="number" name="jml_kriteria" id="jml_kriteria"></td>
		</tr>
		<tr>
		<td></td>
		<td><input type="submit" value="hitung"><img id='loading1' style='position:relative; top:10px; display:none' src='image/loading.gif' /></td>
		</tr>
		</table>
	</form>
   
	<form id="hasil" action="" method="post" >
	</form>
	<form id="input_ahp" action="" method="post">
	   <table id="tabel" border="1">
	   </table>
	</form>
	<div id="tabel2">
	</div>
		<button id='mulai' style='display:none'>Reset</button>
	</div>

    </center>
	<div class='footer'>
	<p align='center'><br><br>Copyright &copy; Dthan 2013</p>
	</div>
</div>
</body>
</html>