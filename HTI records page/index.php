<html>
<head>
<title>Record HTI</title>
<link rel="shortcut ICON" href="http://shinworld.altervista.org/favicon.ico">
</head>
<body background="background.png">
<div style="display:none;" id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/it_IT/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<center>
<div class="fb-like" style="height:30px; width:200px;" data-href="http://facebook.com/HuntingTheInvaders" data-send="true" data-layout="button_count" data-width="450" data-show-faces="true"></div>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script><g:plusone></g:plusone>
<br/>
<br/>
<a name="fb_share" type="button_count" share_url="http://facebook.com/HuntingTheInvaders">Share</a>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
<?php
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
		echo '<table style="background-image:url(\'backgroundtable.png\'); color:red;">';
		echo "<tr id=\"default\"><td>Poisition</td><td>Record</td><td>Nickname</td></tr>\n";
		$query=mysql_query("SELECT * FROM records ORDER BY Record DESC");
		$position=0;
		$tr=0;
		while($row=mysql_fetch_array($query))
		{
			$position++;
			if(($position%10) == 0)
			{
				$tr++;
			}
			echo "<tr id=\"$position\"><td>$position .</td><td>".htmlspecialchars($row['Record'])."</td><td>".htmlspecialchars($row['Nickname'])."</td></tr>\n";
		}
		echo "</table>";
	}
}
?>
<script type="text/javascript">
var pag=0;

for (var i=11; i<<?php echo $position; ?>+1; i++)
{
	document.getElementById(i).style.display='none';
}

function pageback()
{
	if(pag != 0)
	{
		pag--;
		pagego(pag);
	}
}

function pagego(page)
{
	document.getElementById("default").innerHTML='';	
	for (var j=1; j<<?php echo $position; ?>+1; j++)
	{
		fadeout(j, 0);
	}

	for (var i=(page*10)+1; i<(page*10)+11; i++)
	{
		setTimeout("fadein("+i+", 0);", 500);
	}
	pag=page;
}

function fadeout(name, all)
{
	var object=document.getElementById(name);
	setTimeout('document.getElementById("'+name+'").style.opacity="1";', 50);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.9";', 100);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.8";', 150);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.7";', 200);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.6";', 250);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.5";', 300);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.4";', 350);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.3";', 400);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.2";', 450);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.1";', 500);
	if (all==0) { setTimeout('document.getElementById("'+name+'").style.display="none";', 550); }
}

function fadein(name, all)
{
	if (all==0) { setTimeout('document.getElementById("'+name+'").style.display="block";', 50); }
	setTimeout('document.getElementById("'+name+'").style.opacity="0.2";', 100);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.3";', 150);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.4";', 200);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.5";', 250);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.6";', 300);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.7";', 350);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.8";', 400);
	setTimeout('document.getElementById("'+name+'").style.opacity="0.9";', 450);
	setTimeout('document.getElementById("'+name+'").style.opacity="1";', 500);
}
</script>
<a href="javascript:pageback();">&lt;&lt;</a>
<?php 
for ($i=0; $i<$tr+1; $i++)
{ 
	echo " <a href=\"javascript:pagego($i);\">$i</a> ";
} 
?>
<a href="javascript:pag++; pagego(pag);">&gt;&gt;</a>
<br/><br/><br/>
<button style="border-color:transparent; background-color:transparent;" OnClick="var request=prompt('English or Italian?');if(request.toLowerCase()=='italian' || request.toLowerCase().indexOf('it') != -1){location.href='http://shinworld.altervista.org/downloads/HuntingTheInvaders/Game.html';}else{location.href='http://shinworld.altervista.org/downloads/HuntingTheInvaders/Game_en.html';}"><img src="PlayHTI.png"></img></button>
</center>
</body>
</html>