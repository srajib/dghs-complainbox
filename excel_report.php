<?PHP
  include ("./helperphp/db_con.php");
  header("Content-Type: application/vnd.ms-excel");
 header("Content-disposition: attachment; filename=ComplainBox_All_Messages.xls"); 
  
  $sql=mysql_query("SELECT * FROM all_messages ORDER BY id ASC");
  echo 'id' . "\t" . 'Sender' . "\t" . 'Complex' ."\t" . 'message' ."\t".'Date_time'."\t".'rank_id'."\t".'complain_type_ids'."\t".'action_id'."\t".'solution_id'."\t".'complex_code'."\t".'description'."\t".'complex_name'."\t".'area_id'."\t".'rank_id'."\t".'rank_type'."\t".'solution_details'."\t"."Complain_type_id"."\t".'Type_details'."\t".'action_details'."\t".'area'."\n";
  
  while($sql_r=mysql_fetch_object($sql)){

 $msg=mysql_real_escape_string($sql_r->message);
 
  echo $sql_r->id." \t".$sql_r->sender." \t".$sql_r->complex." \t".$msg." \t".$sql_r->datetime." \t".$sql_r->rank." \t".$sql_r->complain_type." \t".$sql_r->complain_type." \t".$sql_r->action." \t".$sql_r->solution." \t".$sql_r->complex_code." \t".$sql_r->description."\t".$sql_r->complex_name." \t".$sql_r->area_id." \t".$sql_r->rank_id." \t".$sql_r->rank_type." \t".$sql_r->solution_details." \t".$sql_r->complain_type_id." \t".$sql_r->type_details." \t".$sql_r->action_details." \t".$sql_r->area."\n";
   }

?>