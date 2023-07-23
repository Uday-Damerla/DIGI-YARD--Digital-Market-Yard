<?php
	session_start();
?>
<HTML>
<LINK REL="STYLESHEET" TYPE="TEXT/CSS" HREF="dmy.css">
	<HEAD>
		<TITLE>DIGITAL MARKET YARD</TITLE>
		<meta charset="UTF-8">
	</HEAD>
	<BODY>
		<?php
			session_destroy();
			header("Location:DMY.html");
		?>
	</BODY>
</HTML>