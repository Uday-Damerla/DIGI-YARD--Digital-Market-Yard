<HTML>
<LINK REL="STYLESHEET" TYPE="TEXT/CSS" HREF="dmy.css">
	<HEAD>
		<TITLE>DIGITAL MARKET YARD</TITLE>
	</HEAD>
	<BODY BGCOLOR="GREEN">
		<P ALIGN="CENTER">DIGI YARD</P>
		<div class="myDiv">
			<?php
				$s="localhost";
				$u="root";
				$p="root";
				$d="dmy";
				
				$mn=$_POST["MN"];
				$pw=$_POST["PW"];
				$na=$_POST["NA"];
				echo $mn;
				echo $pw;
				
				$con= new mysqli($s,$u,$p,$d);
				if($con->connect_error) die("connection failed");
				
				$Sql = "SELECT * FROM ac WHERE mobile='$mn'";
				$result=$con->query($Sql);
				
				if($result->num_rows ==0)
				{
					$Sql1 = "INSERT INTO ac VALUES ('','$na','$mn','$pw')";
					$result1=$con->query($Sql1);
					echo "signup Successs";
				}
				else if($result->num_rows >0)
				{
					echo "Mobile Number already has an Account"."<br>" ;
					echo "signup failed"."<br>";
				}
				else
				{
					echo "Connection Error"."<br>".$con->error;
				}
				$con->close();
				header("Location: DMY.html");
				exit;
			?>
		</div>
	</BODY>
</HTML>