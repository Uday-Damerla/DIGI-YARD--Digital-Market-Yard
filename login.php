<?php
	session_start();
?>
<HTML>
<LINK REL="STYLESHEET" TYPE="TEXT/CSS" HREF="dmy.css">
	<HEAD>
		<TITLE>DIGITAL MARKET YARD</TITLE>
	</HEAD>
	<BODY>
		<div class="myDiv">
			<?php
			$mn=$_POST["MN"];
			$pw=$_POST["PW"];
			
			$s="localhost";
			$u="root";
			$p="root";
			$d="dmy";
			
			
			$con= new mysqli($s,$u,$p,$d);
			if($con->connect_error) die("connection failed");
			$sql="SELECT * FROM ac where mobile=$mn";
			$result=$con->query($sql);
			$row = $result -> fetch_assoc();
			if($row['password']===$pw){
			echo "login success";
			$_SESSION["user"]=$mn;
			$_SESSION["name"]=$row['name'];
			header("Location:index.html");
			}
			else
			echo "Login failed <br>";
			echo "Enter valid password";
			$con -> close();
			?>
		</div>
	</BODY>
</HTML>