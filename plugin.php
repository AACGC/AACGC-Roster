<?php

/*
#######################################
#     e107 website system plguin      
#     AACGC Roster                 
#     by M@CH!N3
#     http://www.AACGC.com       
#######################################
*/

$eplug_name = "AACGC Roster";
$eplug_version = "4.8";
$eplug_author = "M@CH!N3";
$eplug_url = "http://www.aacgc.com";
$eplug_email = "admin@aacgc.com";
$eplug_description = "Clan Roster with Username,Game, Rank, Date Joined, Age, Status, xfire, Location, and more of each member with admin panel to set ranks and colums shown. Also includes scrolling Menu that displays name and rank of each member. Includes application for new recruits.";
$eplug_compatible = "";
$eplug_readme = "";
$eplug_compliant = FALSE;
$eplug_module = FALSE;
$eplug_status = TRUE;
$eplug_latest = TRUE;


$eplug_folder      = "aacgc_roster";

$eplug_menu_name   = "AACGC_Roster";

$eplug_conffile    = "admin_main.php";

$eplug_logo        = "";
$eplug_icon        = e_PLUGIN."aacgc_roster/images/icon_32.png";
$eplug_icon_small  = e_PLUGIN."aacgc_roster/images/icon_16.png";
$eplug_caption     = "AACGC Roster";  

$eplug_table_names = array("aacgc_roster", "aacgc_roster_members", "aacgc_roster_apps");

$eplug_tables = array(

"CREATE TABLE ".MPREFIX."aacgc_roster(rank_id int(11) NOT NULL auto_increment,rank_name varchar(50) NOT NULL,rank_pic varchar(120) NOT NULL,rank_txt text NOT NULL, PRIMARY KEY  (rank_id)) ENGINE=MyISAM;",

"CREATE TABLE ".MPREFIX."aacgc_roster_members(awarded_id int(11) NOT NULL auto_increment,awarded_rank_id int(11) NOT NULL,user_id varchar(11) NOT NULL,user_location varchar(120) NOT NULL,user_age text NOT NULL,user_game text NOT NULL,user_status text NOT NULL,join_date text NOT NULL, PRIMARY KEY  (awarded_id)) ENGINE=MyISAM;",

"CREATE TABLE ".MPREFIX."aacgc_roster_apps(app_id int(11) NOT NULL auto_increment,user varchar(11) NOT NULL,age text NOT NULL,location text NOT NULL,contact text NOT NULL,bio text NOT NULL,gamename text NOT NULL, PRIMARY KEY  (app_id)) ENGINE=MyISAM;");

$eplug_link      = TRUE;
$eplug_link_name = "Roster";
$eplug_link_url  = e_PLUGIN."aacgc_roster/Roster.php";

$eplug_done = "Install Complete";
$eplug_upgrade_done = "Upgrade Complete";

$upgrade_alter_tables = "";
$upgrade_remove_prefs = "";
$upgrade_add_prefs = "";

?>
