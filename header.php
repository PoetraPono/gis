<head>
   <script language='JavaScript'>
		var txt="  -= Tugas SIG =-  ";
		var kecepatan=300;var segarkan=null;function bergerak() { document.title=txt;
		txt=txt.substring(1,txt.length)+txt.charAt(0);
		segarkan=setTimeout("bergerak()",kecepatan);}bergerak();
	</script>
   <link rel="stylesheet" type="text/css" href="assets/bootstrap.css">
   <link rel="stylesheet" type="text/css" href="assets/dataTables.bootstrap.css">
   <script type="text/javascript" src="assets/jquery-1.11.1.js"></script>
   <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRTm_D0tgf4eSdJlj2jk4JFeHyCNe0g9I&callback=initMap"></script>
</head>