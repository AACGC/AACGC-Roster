<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Roster                    #
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/
require_once("../../class2.php");
require_once(HEADERF);
  
$title .= "Application";

//---------------------------------------------

if ($pref['rank_enable_application'] == "1"){
if ($_POST['add_user'] == '1') {
$newuser = $_POST['user'];
$newage = $_POST['age'];
$newloc = $_POST['location'];
$newcontact = $_POST['contact'];
$newbio = $_POST['bio'];
$newgamename = $_POST['gamename'];
$reason = "";
$newok = "";
if (($newuser == "") OR ($newage == "")){
	$newok = "0";
	$reason = "No name or age";
} else {
	$newok = "1";
}
if (($newcontact == "")){
	$newok = "0";
	$reason = "Need a way to contact you";
} else {
	$newok = "1";
}

If ($newok == "0"){
 	$newtext = "
 	<center>
	<b><br><br> ".$reason."
	</center>
 	</b>
	";
	$ns->tablerender("", $newtext);
}
If ($newok == "1"){
$sql->db_Insert("aacgc_roster_apps", "NULL, '".$newuser."', '".$newage."', '".$newloc."', '".$newcontact."', '".$newbio."', '".$newgamename."'") or die(mysql_error());
$ns->tablerender("", "<center><b>Application Submitted</b></center>");
}
}
//-----------------------------------------------------------------------------------------------------------+
$text = "

<table style='width:80%' class='fborder' cellspacing='0' cellpadding='0'>
<tr>
<td><center>
<font size='3'><b><u>".$pref['appdetailstitle']."</u></b></font>
<br><br>
".$pref['appdetails']."
</td>
</tr></table>



<form method='POST' action='Application.php'>
<br>
<center>
<table style='width:80%' class='fborder' cellspacing='0' cellpadding='0'>";


$text .= "
        <tr>
        <td style='width:20%; text-align:right' class='forumheader3'>Name:</td>
        <td style='width:'><select name='user'><option name='user' value='".USERID."'>".USERNAME." (Your ID#: <b>".USERID."</b>)</option></td>
        </tr>
        <tr>
        <td style='width:20%; text-align:right' class='forumheader3'>Age:</td>
        <td style='width:' class='forumheader3'>
	<input class='tbox' type='text' name='age' size='100'>
        </td>
        </tr>
        <tr>
        <td style='width:20%; text-align:right' class='forumheader3'>Location (country):</td>
        <td style='width:' class='forumheader3'>
	<input class='tbox' type='text' name='location' size='100'>
        </td>
        </tr>
        <tr>
        <td style='width:20%; text-align:right' class='forumheader3'>Contact:</td>
        <td style='width:' class='forumheader3'>
	<input class='tbox' type='text' name='contact' size='100'>
        </td>
        </tr>
        <tr>
        <td style='width:20%; text-align:right' class='forumheader3'>About You:</td>
        <td style='width:' class='forumheader3'>
	        <textarea class='tbox' rows='5' cols='50' name='bio'></textarea>
        </td>
        </tr>
        <tr>
        <td style='width:20%; text-align:right' class='forumheader3'>Game Name(s):</td>
        <td style='width:' class='forumheader3'>
	        <textarea class='tbox' rows='2' cols='50' name='gamename'></textarea>
        </td>
        </tr>


";
        $text .= "</div>
        </td>
		</tr>
		
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
		<input type='hidden' name='add_user' value='1'>
		<input class='button' type='submit' value='Submit Application'>
		</td>
        </tr>
</table>
<br>
</form>";}

else

{$text .= "<b><i>Application Is Disabled For Roster</i></b>";}

//-------------



       
     
  $ns -> tablerender($title, $text);


  require_once(FOOTERF);



?>