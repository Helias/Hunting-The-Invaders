<?php
$Nickname=$_GET['nickname'];
$Record=$_GET['record'];
$connect=mysql_connect("localhost", "huntinginvaders", "");
$db=mysql_select_db("my_huntinginvaders", $connect);
if(!$connect)
{
	echo "mysql_connect: ".mysql_error()."<br/>";
	echo "Error code:".mysql_errno()."<br/>";
}
else
{
	if(!$db)
	{
		echo "mysql_connect:".mysql_error()."<br/>";
		echo "Error code:".mysql_errno()."<br/>";
	}
	else
	{
		mysql_query("INSERT INTO records VALUES ($Record, '$Nickname');");
	}
}
echo "<center>"
echo "$Record <br/>";
echo "$Nickname <br/>";
echo "Registered.";
echo "</center>";
?>
<script type="text/javascript">
setTimeout("location.href='http://huntinginvaders.altervista.org';", 1000);
</script>