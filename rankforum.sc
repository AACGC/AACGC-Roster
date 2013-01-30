if ($pref['rank_enable_forum'] == "1"){

global $post_info, $sql;

$postowner  = $post_info['user_id'];



$sql->db_Select("aacgc_roster_members", "*", "WHERE user_id='".$postowner."' LIMIT 0,".$pref['numrank']."", "");
while($row = $sql->db_Fetch()){

$sql2 = new db;
$sql2->db_Select("aacgc_roster", "*", "WHERE rank_id='".$row['awarded_rank_id']."'", "");
while($row2 = $sql2->db_Fetch()){



$forumrank .= "<br><img width='".$pref['rank_forum_img']."' src='".e_PLUGIN."aacgc_roster/ranks/".$row2['rank_pic']."'></img><br>";}}}







return "".$forumrank."";




