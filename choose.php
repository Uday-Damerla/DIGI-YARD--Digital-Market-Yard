<HTML>
<LINK REL="STYLESHEET" TYPE="TEXT/CSS" HREF="dmy.css">
	<HEAD>
		<TITLE>DIGITAL MARKET YARD</TITLE>
		<meta charset="UTF-8">
	</HEAD>
	<BODY>
		<?php
			$s="localhost";
			$u="root";
			$p="root";
			$d="dmy";
			
			$crop=$_POST["crop"];
			$dist=$_POST["DISTICT"];
			
			$con= new mysqli($s,$u,$p,$d);
			if($con->connect_error) die("connection failed");
			
			if($dist==null)
			{
				$Sql = "SELECT * FROM ad WHERE crop='$crop'";
			}
			else
			{
				$Sql = "SELECT * FROM ad WHERE crop='$crop' AND distict='$dist'";
			}
			
			$result=$con->query($Sql);
		echo "<div class='dis'>";
		if($result->num_rows>0){
        while($row = $result->fetch_assoc())
        { 	$img1=$row["img"];
			$img2=$row["img2"];
			$img3=$row["img3"];
			$amt=$row["quantity"]*$row["price"];
			echo
           	"	<table border='1' align='center' width ='100%'>
				<tr><td> <h4> AD no:".$row["id"]."</h4></td></tr>
				<tr><td> <h2><center>Crop details</center></h2></td></tr>
				<tr><td><table border='1'><tr>
					<td width='33%' align='center'><img src='$img1' width='300' height='250'>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='33%' align='center'>	<img src='$img2' width='300' height='250'>&nbsp;&nbsp;&nbsp;&nbsp;</td>
					<td width='33%' align='center'>	<img src='$img3' width='300' height='250'>&nbsp;&nbsp;&nbsp;&nbsp;</td>
				</tr></table></td></tr>
				<tr><td>Crop &nbsp;:&nbsp;" .$row["crop"]." <br>
						Age &nbsp;:&nbsp;" .$row["age"]." months <br>
						Quantity &nbsp;:&nbsp;" . $row["quantity"]." Quintals <br>
						Quality &nbsp;:&nbsp; " . $row["quality"]."<br>
						Price/Quintal &nbsp;:&nbsp; &#8377 " . $row["price"]."/-<br>
						Amount &nbsp;:&nbsp;<h2> &#8377 ".$amt."/-</h2><br>
						Discription &nbsp;:&nbsp; " . $row["discp"]. "<br>
				</td></tr>
				<tr><td><h2><center>Seller details</center></h2></td></tr>
				<tr><td>Name &nbsp;:&nbsp;".$row["name"]. "<br>
						Contact &nbsp;:&nbsp; " . $row["mobile"]."<br>
						District &nbsp;:&nbsp;" . $row["distict"]." <br>
				</td></tr>
			</table><br>" ;
			}
		}
		else
		{
			echo "No Records Found.";
		}
			"</div>";
			$con->close();
		?>
	</BODY>
</HTML>