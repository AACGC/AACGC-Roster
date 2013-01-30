<?php

/*
####################################
#  AACGC Roster                    #
#  M@CH!N3 admin@aacgc.com         # 
####################################
*/



global $sc_style;


//-------------------------Menu Title--------------------------------+

$rankmenu_title .= "".$pref['rankmenu_title']."";

//-------------------------------------------------------------------+



if ($pref['forumaddon_enable_gold'] == "1")
{$gold_obj = new gold();}

//-------------------------Menu News & Info Section-------------------+

$rankmenu_text .= "

<script type=\"text/javascript\">
function rostermenuup(){rostermenu.direction = \"up\";}
function rostermenudown(){rostermenu.direction = \"down\";}
function rostermenustop(){rostermenu.stop();}
function rostermenustart(){rostermenu.start();}
</script>

<marquee height='".$pref['rankmenu_height']."px' id='rostermenu' scrollamount='".$pref['rankmenu_speed']."' onMouseover='this.scrollAmount=".$pref['rankmenu_mouseoverspeed']."' onMouseout='this.scrollAmount=".$pref['rankmenu_mouseoutspeed']."' direction='up' loop='true'>
<table style='width:95%' class=''>";

        $sql ->db_Select("aacgc_roster", "*", "ORDER BY rank_id","");
        while($row = $sql ->db_Fetch()){

$rankmenu_text .= "<tr><td class='fcaption'><center><img width='".$pref['rankmenu_img']."' src='".e_PLUGIN."/aacgc_roster/ranks/".$row['rank_pic']."' alt = '".$row['rank_name']."'></img></a></center></td></tr>";

        $sql3 = new db;
        $sql3 ->db_Select("aacgc_roster_members", "*", "WHERE awarded_rank_id= '".$row['rank_id']."' ORDER BY awarded_id DESC","");
        while($row3 = $sql3 ->db_Fetch()){
        $sql2 = new db;
        $sql2 ->db_Select("user", "*", "WHERE user_id = '".$row3['user_id']."'","");
        $row2 = $sql2 ->db_Fetch();


        if ($pref['rank_enable_gold'] == "1")
        {$userorb = "<font color='#00FF00'>".$gold_obj->show_orb($row2['user_id'])."</font>";}
        else
        {$userorb = "".$row2['user_name']."";}

if ($pref['rankmenu_enable_avatar'] == "1"){
if ($row2['user_image'] == "")
{$aravatar = "";}
else
{$aruseravatar = $row2[user_image];
require_once(e_HANDLER."avatar_handler.php");
$aruseravatar = avatar($aruseravatar);
$aravatar = "<img src='".$aruseravatar."' width=".$pref['rankmenu_avatar_size']."px></img>";}}


$rankmenu_text .= "
        <tr>
        <td style='width:' class='indent'><center><a href='".e_BASE."user.php?id.".$row3['user_id']."'>".$aravatar." ".$userorb."</a></center></td>
        </tr>";}}




$rankmenu_text .= "</table></marquee>

<br><br>
<table style='width:100%' class=''><tr><td>
<center>
<input class=\"button\" value=\"Start\" onClick=\"rostermenustart();\" type=\"button\">
<input class=\"button\" value=\"Stop\" onClick=\"rostermenustop();\" type=\"button\">
<input class=\"button\" value=\"Up\" onClick=\"rostermenuup();\" type=\"button\">
<input class=\"button\" value=\"Down\" onClick=\"rostermenudown();\" type=\"button\">
</center>
</td></tr></table>
<br>

";

//--------------------------------------------------------------------+








$ns -> tablerender($rankmenu_title, $rankmenu_text);


?>