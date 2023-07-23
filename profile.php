<?php
	session_start();
?>
<HTML>
<LINK REL="STYLESHEET" TYPE="TEXT/CSS" HREF="dmy.css">
	<HEAD>
		<TITLE>DIGITAL MARKET YARD</TITLE>
		<meta charset="UTF-8">
		<style>
			#divp {
				  position:relative;
				  border-radius: 5px;
				  background-color:#f2f2f2;
				  padding: 8px;
				  padding-bottom:10px;
				  width: 30%;
				  margin: 5%;
				  left: 30%;
				}
		</style>
	</HEAD>
	<BODY>
		<?php
			$s="localhost";
			$u="root";
			$p="root";
			$d="dmy";
			$mobile=$_SESSION["user"];
			
			$con= new mysqli($s,$u,$p,$d);
			if($con->connect_error) die("connection failed");
			
				$Sql = "SELECT * FROM ac WHERE mobile='$mobile'";
			
			$result=$con->query($Sql);
		echo "<div id='divp'>";
        while($row = $result->fetch_assoc())
        { 	
			echo
           	"	<table border='1' align='center' width ='100%'>
				<tr><th align='center'>Profile</th></tr>
				<tr><td> <h2> Name : ".$row["name"]."</h2></td></tr>
				<tr><td> <h2>Contact : ".$row["mobile"]."</h2></td></tr>
			</table><br>" ;}
			"</div>";
			$con->close();
		?>
	</BODY>
</HTML>