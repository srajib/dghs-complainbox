<?php
include "./helperphp/db_con.php";

$e_temp_q=mysql_query("Select * from die_email_temp");
$e_temp_r=mysql_fetch_object($e_temp_q);

$etmp_pre=$e_temp_r->die_email_pre;
$etmp=$e_temp_r->die_email_html;
$tday=$e_temp_r->tday;
$emailaddr=$e_temp_r->email_addr;

$offset=6*60*60; //converting 6 hours to seconds.
$preoffset=($tday*24*60*60)+$offset;
$dayFormat="D";
$todayFormat="Y-m-d H:i:s";
$etime="d F Y";
$emailtime=gmdate($etime, time()+$offset);

$datetime=gmdate($todayFormat, time()+$offset);
$ftime=gmdate("d F Y", time()+$offset);
$lastday=gmdate($todayFormat, time()+$offset-$preoffset);
$ltime=gmdate("d F Y", time()+$offset-$preoffset);


$msgem_q=mysql_query("SELECT *, msg.id as msgiid, msg.solution as msgslu, cmplx.name as organame, msg.datetime as mdt FROM
                                            messages as msg
                                           LEFT JOIN rank as rnk
                                                      ON msg.rank=rnk.id
                                            LEFT JOIN complex as cmplx
                                                      ON msg.complex=cmplx.code
                                            LEFT JOIN action as act
                                                      ON msg.action=act.id
                                            LEFT JOIN solution as slu
                                                      ON msg.solution=slu.id
                                            where msg.action>0 AND msg.DT between '$lastday' AND '$datetime' ORDER BY msg.DT DESC");

$msgslu_t=mysql_query("Select * from messages where solution>0 AND DT between '$lastday' AND '$datetime' ORDER BY DT ASC");
$msgslu_c=mysql_num_rows($msgslu_t);

$msgorg_t=mysql_query("Select * from messages where action>0 AND DT between '$lastday' AND '$datetime' Group BY complex");
$msgorg_c=mysql_num_rows($msgorg_t);
$msgc=0;
$mssg=" ";
while($msgem_r=mysql_fetch_object($msgem_q)){



        $comp_t=$msgem_r->complain_type;

    $comp_t_a=explode(",",$comp_t);
	$com_dtls="";
    foreach($comp_t_a as $comp_tid)
    {
	$com_dtls_q=mysql_query("Select * from com_type where id='$comp_tid'");
       $com_dtls_r=mysql_fetch_assoc($com_dtls_q);
       $com_dtls=$com_dtls.$com_dtls_r['type_details'];
	$com_dtls=$com_dtls.",";
    }
	$com_dtls= str_replace(',,',' ',$com_dtls);
	
	$mmmid=$msgem_r->msgiid;
	$cmnts_qqq=mysql_query("Select * from cmmnts where msgid='$mmmid' and said='admin' ORDER BY datetime DESC LIMIT 1");
	$cmnts_rr=mysql_fetch_object($cmnts_qqq);
	
    $a = array('\r\n','\r','\n','+msgid+','+orgname+','+sender+','+datetime+','+comsugg+','+comtype+','+comrank+','+comaction+','+comsolu+','+comments+','+nowtime+',);
    $b = array(' ',' ','<br/>',''.$msgem_r->msgiid.'',''.$msgem_r->organame.'',''.$msgem_r->sender.'',''.$msgem_r->mdt.'',''.$msgem_r->message.'',''.$com_dtls.'',''.$msgem_r->rank_type.'',''.$msgem_r->action_details.'',''.$msgem_r->solution_details.'',''.$cmnts_rr->cmmnts.'',''.$emailtime.'',);
    $etmp_part= str_replace($a,$b,$etmp);

    $mssg=' '.$mssg.'<br />'.$etmp_part;

    //$mssg=' '.$mssg;
    $msgc++;
}

$to = $emailaddr;
$subject = 'MOHFW Complaint & Suggestion Box Digest';

$message = '
<html>
<head>
    <title>MOHFW Complaint & Suggestion Box Digest</title>
</head>
<body>
<!---<div style="float: right; background-color:yellow;">
	<a href="http://localhost:8080/comp/Complaint&SuggestionBox/pdf.php?fdcomp='.$datetime.'&ldcomp='.$lastday.'">Print</a>
</div>-->
<p>
	<span style=color:#ff8c00;><span style=font-family: Times New Roman; font-size: medium;>Auto-Report from SMS-based Complaint/Suggestion Box of MIS, DGHS | '.$emailtime.' | </span></span><br/>
<span style=color:blue;>
<span style=font-family: \'Trebuchet MS\', Arial, Helvetica, sans-serif; font-size: medium;>From '.$ltime.' to '.$ftime.'
</span></span></p>
Total Complaints & Suggestions: '.$msgc.'<br/>
Total Organizations: '.$msgorg_c.'<br/>
Action Taken: '.$msgc.'<br/>
Solution Done: '.$msgslu_c.'<br/>'.$mssg.'<br/>
-----------------------------------------------
</body>
</html>
';

$headers   = "From: MIS DGHS \r\n";
$headers  .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
mail($to, $subject, $message, $headers);
echo $message;
?>