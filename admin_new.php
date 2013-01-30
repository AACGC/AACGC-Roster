<?php

/*
#######################################
#     e107 website system plguin      #
#     AACGC Roster V1.0
#     by Reid Baughman                #
#     http://www.aacgc.com            #
#######################################
*/
require_once("../../class2.php");
if(!getperms("P")) {
echo "";
exit;
}
require_once(e_ADMIN."auth.php");
require_once(e_HANDLER."form_handler.php"); 
require_once(e_HANDLER."file_class.php");
$rs = new form;
$fl = new e_file;

//-----------------------------------------------------------------------------------------------------------+
if ($_POST['add_rank'] == '1') {
$newrankname = $_POST['rank_name'];
$newrankpic = $_POST['rank_pic'];
$newranktxt = $_POST['rank_txt'];
$reason = "";
$newok = "";
if (($newrankname == "") OR ($newranktxt == "")){
	$newok = "0";
	$reason = "No name or description";
} else {
	$newok = "1";
}
if (($newrankpic == "") OR ($newok == "0")){
		If ($newrankpic == "") {
		$reason .= "No Image Selected";	
		}
	$newok = "0";
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
$sql->db_Insert("aacgc_roster", "NULL, '".$newrankname."', '".$newrankpic."', '".$newranktxt."'") or die(mysql_error());
$ns->tablerender("", "<center><b>Rank Created</b></center>");
}
}
//-----------------------------------------------------------------------------------------------------------+
$text = "
<form method='POST' action='admin_new.php'>
<br>
<center>
<div style='width:100%'>
<table style='width:80%' class='fborder' cellspacing='0' cellpadding='0'>";




$text .= "
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Rank:</td>
        <td style='width:60%' class='forumheader3'>
        <input class='tbox' type='text' name='rank_name' size='50'>
        </td>
        </tr>
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Rank Detail:</td>
        <td style='width:60%' class='forumheader3'>
	        <textarea class='tbox' rows='3' cols='50' name='rank_txt'></textarea>
        </td>
        </tr>";

        $rejectlist = array('$.','$..','/','CVS','thumbs.db','Thumbs.db','*._$', 'index', 'null*', 'blank*');
        $iconpath = e_PLUGIN."aacgc_roster/ranks";
        $iconlist = $fl->get_files($iconpath,"",$rejectlist);

        $text .= "
        <tr>
        <td style='width:40%; text-align:right' class='forumheader3'>Rank Image:</td>
        <td style='width:60%' class='forumheader3'>
        ".$rs -> form_text("rank_pic", 50, $row['rank_pic'], 100)."
        ".$rs -> form_button("button", '', "Show Ranks", "onclick=\"expandit('plcico')\"")."
            <div id='plcico' style='{head}; display:none'>";
            foreach($iconlist as $icon){
            $text .= "<a href=\"javascript:insertext('".$icon['fname']."','rank_pic','plcico')\"><img src='".$icon['path'].$icon['fname']."' style='border:0' alt='' /></a> ";
            }



        $text .= "</div>
        </td>
		</tr>
		
        <tr style='vertical-align:top'>
        <td colspan='2' style='text-align:center' class='forumheader'>
		<input type='hidden' name='add_rank' value='1'>
		<input class='button' type='submit' value='Create Rank'>
		</td>
        </tr>
</table>
</div>
<br>
</form>";
	      $ns -> tablerender("AACGC Roster", $text);
	      require_once(e_ADMIN."footer.php");
?>

