<?php
$record=file_get_contents("record.txt");
?>
<form action="register.php" method="get">
<center>
<table>
<tr>
<td>Name:</td>
<td><input type="text" name="nickname"></td>
</tr>
<tr>
<td>Record:</td>
<td><input type="text" value="<?php echo $record; ?>" name="record" readonly="readonly" /></td>
</tr>
</table>
<input type="submit" value="Register"/>
</center>
</form>