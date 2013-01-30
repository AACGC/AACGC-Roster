<?php


/*
##########################
# AACGC Roster           #
# M@CH!N3                #
# www.aacgc.com          #
# admin@aacgc.com        #
##########################
*/



require_once("../../class2.php");
if (!defined('e107_INIT'))
{exit;}
if (!getperms("P"))
{header("location:" . e_HTTP . "index.php");
exit;}
require_once(e_ADMIN . "auth.php");
if (!defined('ADMIN_WIDTH'))
{define(ADMIN_WIDTH, "width:100%;");}

if (e_QUERY == "update")
{
    $pref['rank_profile_img'] = $tp->toDB($_POST['rank_profile_img']);
    $pref['rank_forum_img'] = $tp->toDB($_POST['rank_forum_img']);
    $pref['rankmenu_title'] = $tp->toDB($_POST['rankmenu_title']);
    $pref['rankmenu_height'] = $tp->toDB($_POST['rankmenu_height']);
    $pref['rankmenu_speed'] = $tp->toDB($_POST['rankmenu_speed']);
    $pref['rankmenu_mouseoverspeed'] = $tp->toDB($_POST['rankmenu_mouseoverspeed']);
    $pref['rankmenu_mouseoutspeed'] = $tp->toDB($_POST['rankmenu_mouseoutspeed']);
    $pref['rankmenu_img'] = $tp->toDB($_POST['rankmenu_img']);
    $pref['rank_flag_img'] = $tp->toDB($_POST['rank_flag_img']);
    $pref['rank_main_img'] = $tp->toDB($_POST['rank_main_img']);
    $pref['rankfont_title'] = $tp->toDB($_POST['rankfont_title']);
    $pref['rankfont_detail'] = $tp->toDB($_POST['rankfont_detail']);
    $pref['userfont_detail'] = $tp->toDB($_POST['userfont_detail']);
    $pref['rank_main_title'] = $tp->toDB($_POST['rank_main_title']);
    $pref['numrank'] = $tp->toDB($_POST['numrank']);
    $pref['rank_avatar_size'] = $tp->toDB($_POST['rank_avatar_size']);
    $pref['rankmenu_avatar_size'] = $tp->toDB($_POST['rankmenu_avatar_size']);
    $pref['rank_rankorderby'] = $tp->toDB($_POST['rank_rankorderby']);
    $pref['rank_rankorder'] = $tp->toDB($_POST['rank_rankorder']);
    $pref['clandetailstitle'] = $tp->toDB($_POST['clandetailstitle']);
    $pref['clandetails'] = $tp->toDB($_POST['clandetails']);
    $pref['appdetails'] = $tp->toDB($_POST['appdetails']);
    $pref['appdetailstitle'] = $tp->toDB($_POST['appdetailstitle']);
    $pref['rosterxf_skin'] = $tp->toDB($_POST['rosterxf_skin']);


if (isset($_POST['rank_enable_gold'])) 
{$pref['rank_enable_gold'] = 1;}
else
{$pref['rank_enable_gold'] = 0;}


if (isset($_POST['rank_enable_forum'])) 
{$pref['rank_enable_forum'] = 1;}
else
{$pref['rank_enable_forum'] = 0;}

if (isset($_POST['rank_enable_profile'])) 
{$pref['rank_enable_profile'] = 1;}
else
{$pref['rank_enable_profile'] = 0;}

if (isset($_POST['rank_enable_game'])) 
{$pref['rank_enable_game'] = 1;}
else
{$pref['rank_enable_game'] = 0;}

if (isset($_POST['rank_enable_age'])) 
{$pref['rank_enable_age'] = 1;}
else
{$pref['rank_enable_age'] = 0;}

if (isset($_POST['rank_enable_status'])) 
{$pref['rank_enable_status'] = 1;}
else
{$pref['rank_enable_status'] = 0;}

if (isset($_POST['rank_enable_loccol'])) 
{$pref['rank_enable_loccol'] = 1;}
else
{$pref['rank_enable_loccol'] = 0;}

if (isset($_POST['rank_enable_locflag'])) 
{$pref['rank_enable_locflag'] = 1;}
else
{$pref['rank_enable_locflag'] = 0;}

if (isset($_POST['rank_enable_location'])) 
{$pref['rank_enable_location'] = 1;}
else
{$pref['rank_enable_location'] = 0;}

if (isset($_POST['rank_enable_djoined'])) 
{$pref['rank_enable_djoined'] = 1;}
else
{$pref['rank_enable_djoined'] = 0;}

if (isset($_POST['rank_enable_bday'])) 
{$pref['rank_enable_bday'] = 1;}
else
{$pref['rank_enable_bday'] = 0;}

if (isset($_POST['rank_enable_xfire'])) 
{$pref['rank_enable_xfire'] = 1;}
else
{$pref['rank_enable_xfire'] = 0;}

if (isset($_POST['rank_enable_xfirename'])) 
{$pref['rank_enable_xfirename'] = 1;}
else
{$pref['rank_enable_xfirename'] = 0;}

if (isset($_POST['rank_enable_xfireimg'])) 
{$pref['rank_enable_xfireimg'] = 1;}
else
{$pref['rank_enable_xfireimg'] = 0;}

if (isset($_POST['rank_enable_avatar'])) 
{$pref['rank_enable_avatar'] = 1;}
else
{$pref['rank_enable_avatar'] = 0;}

if (isset($_POST['rankmenu_enable_avatar'])) 
{$pref['rankmenu_enable_avatar'] = 1;}
else
{$pref['rankmenu_enable_avatar'] = 0;}

if (isset($_POST['rank_enable_application'])) 
{$pref['rank_enable_application'] = 1;}
else
{$pref['rank_enable_application'] = 0;}

    save_prefs();
    $led_msgtext = "Settings Saved";
}

$admin_title = "AACGC Roster (Settings)";
//--------------------------------------------------------------------


$text .= "
<form method='post' action='" . e_SELF . "?update' id='confadvmedsys'>
	<table style='" . ADMIN_WIDTH . "' class='fborder'>


<tr>
</tr>
		<tr>
			<td colspan='3' class='fcaption'><font size='2'><b>Main Settings:</b></font></td>
		</tr>
<tr>
</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Rank Main Page Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='25' name='rank_main_title' value='".$pref['rank_main_title' ]."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Top Detail Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='50' name='clandetailstitle' value='".$pref['clandetailstitle']."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Top Detail Information:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='50' name='clandetails' value='".$pref['clandetails']."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Rank Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rank_main_img' value='".$pref['rank_main_img']."' />px  (pixles)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Order Ranks By:</td>
                        <td style='width:' class=''>
                        <select name='rank_rankorderby' size='1' class='tbox' style='width:50%'>
                        <option name='rank_rankorderby' value='rank_id'>Rank ID</option>
                        <option name='rank_rankorderby' value='rank_name'>Rank Name</option>
                        </td>
			<td style='width:' class=''>
                        <select name='rank_rankorder' size='1' class='tbox' style='width:50%'>
                        <option name='rank_rankorder' value='ASC'>ASC</option>
                        <option name='rank_rankorder' value='DESC'>DESC</option>
                        </td>
                </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Rank Title Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rankfont_title' value='".$pref['rankfont_title']."' />px  (pixles)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Rank Detail Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rankfont_detail' value='".$pref['rankfont_detail']."' />px  (pixles)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>User Detail Font Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='userfont_detail' value='".$pref['userfont_detail']."' />px  (pixles)</td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show User's Avatar:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_avatar'] == 1 ? "<input type='checkbox' name='rank_enable_avatar' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_avatar' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>User Avatar Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rank_avatar_size' value='".$pref['rank_avatar_size']."' />px  (If enabled above)</td>
		</tr>






<tr>
</tr>
		<tr>
			<td colspan='3' class='fcaption'><font size='2'><b>Enable / Disable Columns: (Extended User Fields Required On Some Columns)</b></font></td>
		</tr>
<tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Enable Application:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_application'] == 1 ? "<input type='checkbox' name='rank_enable_application' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_application' value='0' />")."</td>
	        </tr>
                </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Game Column:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_game'] == 1 ? "<input type='checkbox' name='rank_enable_game' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_game' value='0' />")."(If your Clan Plays More Than 1 Game)</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Age Column:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_age'] == 1 ? "<input type='checkbox' name='rank_enable_age' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_age' value='0' />")." (Age Entered Manually When Given Rank, Disable If Birth Date Column Is Enabled)</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Status Column:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_status'] == 1 ? "<input type='checkbox' name='rank_enable_status' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_status' value='0' />")."</td>
	        </tr>
<tr>
</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Location Column:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_loccol'] == 1 ? "<input type='checkbox' name='rank_enable_loccol' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_loccol' value='0' />")."</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Location Flag:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_locflag'] == 1 ? "<input type='checkbox' name='rank_enable_locflag' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_locflag' value='0' />")." (Flag Chosen Manually When Given Rank)</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Location Flag Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rank_flag_img' value='".$pref['rank_flag_img']."' />px  (If Enabled)</td>
		</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Location:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_location'] == 1 ? "<input type='checkbox' name='rank_enable_location' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_location' value='0' />")." (Extended Location Field)</td>
	        </tr>
<tr>
</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Join Date Column:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_djoined'] == 1 ? "<input type='checkbox' name='rank_enable_djoined' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_djoined' value='0' />")." (Date Entered Manually When Given Rank)</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Birth Date Column With Age:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_bday'] == 1 ? "<input type='checkbox' name='rank_enable_bday' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_bday' value='0' />")." (Extended Birthday Field)</td>
	        </tr>
<tr>
</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Xfire Column:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_xfire'] == 1 ? "<input type='checkbox' name='rank_enable_xfire' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_xfire' value='0' />")." (Extended Field user_xfire)</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Choose Xfire Skin:</td>
                        <td style='width:' class=''>
                        <select name='rosterxf_skin' size='1' class='tbox' style='width:50%'>
                        <option name='rosterxf_skin' value='".$pref['rosterxf_skin']."'>".$pref['rosterxf_skin']."</option>
                        <option name='rosterxf_skin' value='Xfire Default'>Xfire Default</option>
                        <option name='rosterxf_skin' value='Sci-fi'>Sci-fi</option>
                        <option name='rosterxf_skin' value='Shadow'>Shadow</option>
                        <option name='rosterxf_skin' value='Combat'>Combat</option>
                        <option name='rosterxf_skin' value='Fantasy'>Fantasy</option>
                        </td>
		<tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Xfire Username:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_xfirename'] == 1 ? "<input type='checkbox' name='rank_enable_xfirename' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_xfirename' value='0' />")." (If Xfire Column Enabled)</td>
	        </tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Xfire Online Image:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_xfireimg'] == 1 ? "<input type='checkbox' name='rank_enable_xfireimg' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_xfireimg' value='0' />")." (If Xfire Column Enabled)</td>
	        </tr>
<tr>
</tr>


		<tr>
			<td colspan='3' class='fcaption'><font size='2'><b>Application Settings:</b></font></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Application Title:</td>
			<td colspan='2'  class='forumheader3'>
                        <input class='tbox' type='text' size='50' name='appdetailstitle' value='".$pref['appdetailstitle']."' />
                        </td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Application Detail Information:</td>
			<td colspan='2'  class='forumheader3'>
                        <textarea class='tbox' rows='10' cols='100' name='appdetails'>".$pref['appdetails']."</textarea>
                        </td>
		</tr>



		<tr>
			<td colspan='3' class='fcaption'><font size='2'><b>Menu Settings:</b></font></td>
		</tr>
<tr>
</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Rank Menu Title:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='50' name='rankmenu_title' value='".$pref['rankmenu_title']."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Rank Menu Height:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rankmenu_height' value='".$pref['rankmenu_height']."' />px  (pixles)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Rank Menu Image size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rankmenu_img' value='".$pref['rankmenu_img']."' />px  (pixles)</td>
		</tr>
<tr>
</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show User's Avatar:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rankmenu_enable_avatar'] == 1 ? "<input type='checkbox' name='rankmenu_enable_avatar' value='1' checked='checked' />" : "<input type='checkbox' name='rankmenu_enable_avatar' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>User Avatar Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rankmenu_avatar_size' value='".$pref['rankmenu_avatar_size']."' />px  (If enabled)</td>
		</tr>
<tr>
</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Scroll Speed On Start:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rankmenu_speed' value='".$pref['rankmenu_speed']."' />  (1 for slow, 10 for fast)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Scroll Speed On Mouseover:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rankmenu_mouseoverspeed' value='".$pref['rankmenu_mouseoverspeed']."' />  (1 for slow, 10 for fast, 0 for it to stop)</td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Scroll Speed On Mouseout:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rankmenu_mouseoutspeed' value='".$pref['rankmenu_mouseoutspeed']."' />  (1 for slow, 10 for fast)</td>
		</tr>








<tr>
</tr>
		<tr>
			<td colspan='3' class='fcaption'><font size='2'><b>Forums Settings:</b></font></td>
		</tr>
<tr>
</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Rank In Forums:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_forum'] == 1 ? "<input type='checkbox' name='rank_enable_forum' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_forum' value='0' />")."</td>
	        </tr>
                <tr>
			<td style='width:30%' class='forumheader3'>Number of Ranks To Show:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='numrank' value='".$pref['numrank']."' /></td>
		</tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Forum Rank Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rank_forum_img' value='".$pref['rank_forum_img']."' />px</td>
		</tr>




<tr>
</tr>
		<tr>
			<td colspan='3' class='fcaption'><font size='2'><b>Profile Settings:</b></font></td>
		</tr>
<tr>
</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Show Rank In Profiles:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_profile'] == 1 ? "<input type='checkbox' name='rank_enable_profile' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_profile' value='0' />")."</td>
	        </tr>
		<tr>
			<td style='width:30%' class='forumheader3'>Profile Rank Image Size:</td>
			<td colspan='2'  class='forumheader3'><input class='tbox' type='text' size='10' name='rank_profile_img' value='".$pref['rank_profile_img']."' />px</td>
		</tr>





<tr>
</tr>
		<tr>
			<td colspan='3' class='fcaption'><font size='2'><b>Gold System Support:</b></font></td>
		</tr>
<tr>
</tr>
                <tr>
		        <td style='width:30%' class='forumheader3'>Enable Gold Orbs:</td>
		        <td colspan=2 class='forumheader3'>".($pref['rank_enable_gold'] == 1 ? "<input type='checkbox' name='rank_enable_gold' value='1' checked='checked' />" : "<input type='checkbox' name='rank_enable_gold' value='0' />")."(shows orbs, must have gold sytem 4.x and gold orbs 1.x installed)</td>
	        </tr>








<tr>
</tr>

                <tr>
			<td colspan='3' class='fcaption' style='text-align: left;'><center><input type='submit' name='update' value='Save Settings' class='button' /></td>
		</tr>





</table>
</form>";





$ns->tablerender($admin_title, $text);
require_once(e_ADMIN . "footer.php");
?>
