<?php
$file=fopen("record.txt", "w+");
fwrite($file, $_GET['record']);
fclose($file);
?>
<script type="text/javascript">
setTimeout("location.href='records.php';", 500);
</script>