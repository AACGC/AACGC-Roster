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



if ($pref['rank_enable_gold'] == "1")
{$gold_obj = new gold();}


//---------------------------------------------------------------------------------


$title .= "".$pref['rank_main_title'].""; 


$text .= "    
        <table style='width:75%' class='' border=1 bordercolor='#808080'>
        <tr>
        <td><center><font size='3'><b><u>".$pref['clandetailstitle']."</u></b></font>
        <br><br>
        ".$pref['clandetails']."</td>
        </tr>";


if ($pref['rank_enable_application'] == "1"){
$text .= "<tr>
          <td class='button'><a href='Application.php'>[ Subit Application ]</a></td>
          </tr>";}


$text .= "</table>";



        $sql ->db_Select("aacgc_roster", "*", "ORDER BY ".$pref['rank_rankorderby']." ".$pref['rank_rankorder']."","");
        while($row = $sql ->db_Fetch()){
        

$text .= "    
        <table style='width:100%' class='' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:75%' class=''><br><br>
        <center><font size='".$pref['rankfont_title']."'>".$row['rank_name']."</font></a>
        <br>
        <img width='".$pref['rank_main_img']."' src='".e_PLUGIN."/aacgc_roster/ranks/".$row['rank_pic']."' alt = '".$row['rank_name']."'></img></a></center>
        <br/>
        </td>
        </tr>
        </table>

        <table style='width:100%' class='indent' cellspacing='0' cellpadding='0'>
        <tr>
        <td style='width:75%' class='forumheader3' colspan=8>
        <center><font size='".$pref['rankfont_detail']."'>".$row['rank_txt']."</font></a>
        </td>
        </tr>
        </table>

        <table style='width:100%' class='indent' cellspacing='0' cellpadding='0'>
        <tr>

        <td style='width:' class='fcaption'><center>Member</center></td>";

if ($pref['rank_enable_loccol'] == "1"){
$text .= "<td style='width:' class='fcaption'><center>Location</center></td>";}

if ($pref['rank_enable_age'] == "1"){
$text .= "<td style='width:' class='fcaption'><center>Age</center></td>";}

if ($pref['rank_enable_game'] == "1"){
$text .= "<td style='width:' class='fcaption'><center>Game</center></td>";}

if ($pref['rank_enable_status'] == "1"){
$text .= "<td style='width:' class='fcaption'><center>Status</center></td>";}

if ($pref['rank_enable_djoined'] == "1"){
$text .= "<td style='width:' class='fcaption'><center>Date Joined</center></td>";}

if ($pref['rank_enable_bday'] == "1"){
$text .= "<td style='width:' class='fcaption'><center>Birthday (age)</center></td>";}

if ($pref['rank_enable_xfire'] == "1"){
$text .= "<td style='width:' class='fcaption'><center>Xfire</center>
</td>";}

$text .= "</tr>";

    
         
        $sql3 = new db;
        $sql3 ->db_Select("aacgc_roster_members", "*", "WHERE awarded_rank_id= '".$row['rank_id']."'","");
        while($row3 = $sql3 ->db_Fetch()){
        $sql2 ->db_Select("user", "*", "WHERE user_id='".$row3['user_id']."' ORDER BY user_name ASC","");
        while($row2 = $sql2 ->db_Fetch()){
        $sql5 = new db;
        $sql5 ->db_Select("user_extended", "*", "WHERE user_extended_id = '".$row2['user_id']."'","");
        $row5 = $sql5 ->db_Fetch();
        $sql6 = new db;
        $sql6 ->db_Select("user_extended_country", "*", "WHERE country_iso='".$row5['user_country']."'","");
        $row6 = $sql6 ->db_Fetch();

if ($pref['rank_enable_avatar'] == "1"){
if ($row2['user_image'] == "")
{$avatar = "";}
else
{$useravatar = $row2[user_image];
require_once(e_HANDLER."avatar_handler.php");
$useravatar = avatar($useravatar);
$avatar = "<img src='".$useravatar."' width=".$pref['rank_avatar_size']."px></img>";}}

if ($pref['rank_enable_bday'] == "1"){
if($row5['user_birthday'] == "0000-00-00"){
$bday = "<i>not set</i>";}
else
if($row5['user_birthday'] == ""){
$bday = "<i>not set</i>";}
else
{
$BDAY_now = time();
$BDAY_age = date("Y-m-d", $BDAY_now) - $row5['user_birthday'];
$bday = "".$row5['user_birthday']." (".$BDAY_age.")";}}


if ($pref['rank_enable_xfirename'] == "1"){
if($row5['user_xfire'] == ""){
$xfire = "<i>none</i>";}
else
{$xfire = "".$row5['user_xfire']."";}}


if ($pref['rank_enable_xfireimg'] == "1"){
if($row5['user_xfire'] == ""){
$xfireimg = "";}
else
{if ($pref['rosterxf_skin'] == "Xfire Default"){
$xfireimg = "<a href='http://profile.xfire.com/".$row5['user_xfire']."' target='_blank'><img src='http://miniprofile.xfire.com/bg/bg/type/3/".$row5['user_xfire'].".png' width='149' height='29' /></a>";}

if ($pref['rosterxf_skin'] == "Sci-fi"){
$xfireimg = "<a href='http://profile.xfire.com/".$row5['user_xfire']."' target='_blank'><img src='http://miniprofile.xfire.com/bg/sf/type/3/".$row5['user_xfire'].".png' width='149' height='29' /></a>";}

if ($pref['rosterxf_skin'] == "Shadow"){
$xfireimg = "<a href='http://profile.xfire.com/".$row5['user_xfire']."' target='_blank'><img src='http://miniprofile.xfire.com/bg/sh/type/3/".$row5['user_xfire'].".png' width='149' height='29' /></a>";}

if ($pref['rosterxf_skin'] == "Combat"){
$xfireimg = "<a href='http://profile.xfire.com/".$row5['user_xfire']."' target='_blank'><img src='http://miniprofile.xfire.com/bg/co/type/3/".$row5['user_xfire'].".png' width='149' height='29' /></a>";}

if ($pref['rosterxf_skin'] == "Fantasy"){
$xfireimg = "<a href='http://profile.xfire.com/".$row5['user_xfire']."' target='_blank'><img src='http://miniprofile.xfire.com/bg/os/type/3/".$row5['user_xfire'].".png' width='149' height='29' /></a>";}}}








if ($pref['rank_enable_gold'] == "1")
{$userorb = "<font color='#00FF00'>".$gold_obj->show_orb($row2['user_id'])."</font>";}
else
{$userorb = "".$row2['user_name']."";}



$text .= "<tr>


        <td style='width:' class='indent'><center><a href='".e_BASE."user.php?id.".$row3['user_id']."'>".$avatar." <font size='".$pref['userfont_detail']."'>".$userorb."</a></center></td>";


if ($pref['rank_enable_loccol'] == "1"){

if ($pref['rank_enable_locflag'] == "1"){
$locflag = "<img width='".$pref['rank_flag_img']."' src='flags/".$row3['user_location']."'></img>";}

if ($pref['rank_enable_location'] == "1"){
if ($row5['user_location'] == "")
{$location = "";}
else
{$location = "".$row5['user_location']."<br>".$row6['counrty_name']."";}}

$text .= "<td style='width:' class='indent'><center>".$locflag." ".$location."</center></td>";}


if ($pref['rank_enable_age'] == "1"){
$text .= "<td style='width:' class='indent'><center><font size='".$pref['userfont_detail']."'>".$row3['user_age']."</center></td>";}


if ($pref['rank_enable_game'] == "1"){
$text .= "<td style='width:' class='indent'><center><font size='".$pref['userfont_detail']."'>".$row3['user_game']."</center></td>";}


if ($pref['rank_enable_status'] == "1"){
$text .= "<td style='width:' class='indent'><center><font size='".$pref['userfont_detail']."'>".$row3['user_status']."</center></td>";}


if ($pref['rank_enable_djoined'] == "1"){
$text .= "<td style='width:' class='indent'><center><font size='".$pref['userfont_detail']."'>".$row3['join_date']."</center></td>";}


if ($pref['rank_enable_bday'] == "1"){
$text .= "<td style='width:' class='indent'><center><font size='".$pref['userfont_detail']."'>".$bday."</center></td>";}


if ($pref['rank_enable_xfire'] == "1"){
$text .= "<td style='width:' class='indent'><center><font size='".$pref['userfont_detail']."'>".$xfireimg."</center></td>";}


$text .= "</tr>";}}



$text .= "</table>";}




//----#AACGC Plugin Copyright&reg; - DO NOT REMOVE BELOW THIS LINE! - #-------+
require(e_PLUGIN.'aacgc_roster/plugin.php');
$text .= "<br><br><br><br><br><br><br>
<a href='http://www.aacgc.com' target='_blank'>
<font color='808080' size='1'>".$eplug_name." V".$eplug_version."  &reg;</font>
</a>";
//------------------------------------------------------------------------+




$ns -> tablerender($title, $text);











//----------------------------------------------------------------------------------

require_once(FOOTERF);



?>