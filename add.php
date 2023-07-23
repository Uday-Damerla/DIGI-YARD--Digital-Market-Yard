<?php
	session_start();
?>
<HTML>
<LINK REL="STYLESHEET" TYPE="TEXT/CSS" HREF="dmy.css">
	<HEAD>
		<TITLE>DIGITAL MARKET YARD</TITLE>
	</HEAD>
	<BODY>
		<?php
			$s="localhost";
			$u="root";
			$p="root";
			$d="dmy";
			
			$IMAGEPATH1="images/".$_FILES["IMG1"]["name"];
			move_uploaded_file($_FILES["IMG1"]["tmp_name"],$IMAGEPATH1);
			$IMAGEPATH2="images/".$_FILES["IMG2"]["name"];
			move_uploaded_file($_FILES["IMG2"]["tmp_name"],$IMAGEPATH2);
			$IMAGEPATH3="images/".$_FILES["IMG3"]["name"];
			move_uploaded_file($_FILES["IMG3"]["tmp_name"],$IMAGEPATH3);
			$name=$_SESSION["name"];
			$Mobile=$_SESSION["user"];
			$DISTICT=$_POST["DISTICT"];
			$crop=$_POST["crop"];
			$age=$_POST["age"];
			$QUANTITY=$_POST["QUANTITY"];
			$QUALITY=$_POST["QUALITY"];
			$PRICE=$_POST["PRICE"];
			$discription=$_POST["discription"];
			
			$con= new mysqli($s,$u,$p,$d);
			if($con->connect_error) die("connection failed");
			
			$Sql = "INSERT INTO ad VALUES ('','$name','$Mobile','$DISTICT','$crop','$age','$QUANTITY','$QUALITY','$PRICE','$IMAGEPATH1','$IMAGEPATH2','$IMAGEPATH3','$discription')";
			$result=$con->query($Sql);
			
			if($result===TRUE)
			{
				echo "successfully posted your add";
			}
			else 
			{
				echo "Failed to post your add"."<br>" . $conn->error;
			}
			$con->close();
			//header("Location:");
			//exit;
		?>
	</BODY>
</HTML>