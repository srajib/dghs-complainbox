<?php

$offset=6*60*60; //converting 6 hours to seconds.
$preoffset=($tday*24*60*60)+$offset;
$dayFormat="D";
$todayFormat="Y-m-d H:i:s";
$etime="d F Y";
$emailtime=gmdate($etime, time()+$offset);

$datetime=gmdate($todayFormat, time()+$offset);
$lastday=gmdate($todayFormat, time()+$offset-$preoffset);


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
                                            LEFT JOIN email as eml
                                                      ON msg.complex=eml.complex
                                            WHERE msg.id='$msgid'");
$msgem_r=mysql_fetch_object($msgem_q);

$e_temp_q=mysql_query("Select * from email_temp");
$e_temp_r=mysql_fetch_object($e_temp_q);

$comp_t=$msgem_r->complain_type;
$comp_tid=$msgem_r->msgiid;
//this is msg type
$comp_t_a=explode(",",$comp_t);
	$com_dtls="";
    foreach($comp_t_a as $comp_tid)
    {
	$com_dtls_q=mysql_query("Select * from com_type where id='$comp_tid'");
       $com_dtls_r=mysql_fetch_assoc($com_dtls_q);
       $com_dtls=$com_dtls.$com_dtls_r['type_details'];
	$com_dtls=$com_dtls.",";
    }
	$com_t_dtls= str_replace(',,',' ',$com_dtls);
//end

$etmp=$e_temp_r->email_temp_html;
$a = array('\r\n','\r','\n','+msgid+','+orgname+','+sender+','+datetime+','+comsugg+','+comtype+','+comrank+','+comaction+','+comsolu+','+comments+','+nowtime+');
$b = array(' ',' ','<br/>',''.$msgem_r->msgiid.'',''.$msgem_r->organame.'',''.$msgem_r->sender.'',''.$msgem_r->mdt.'',''.$msgem_r->message.'',''.$com_t_dtls.'',''.$msgem_r->rank_type.'',''.$msgem_r->action_details.'',''.$msgem_r->solution_details.'',''.$cmmnts_i.'',''.$emailtime.'',);
$etmp_part= str_replace($a,$b,$etmp);

//$to = 'hassan.dghs@gmail.com';
$orgemail_ad=$msgem_r->email;
$to = 'hassan.dghs@gmail.com,dr.bashirul@mis.dghs.gov.bd,'.$orgemail_ad;
$subject = 'MOHFW Complaint & Suggestion Box';
$message = '
<html>
<head>
    <title>MOHFW Complaint & Suggestion Box</title>
</head>
<body>
    '.$etmp_part.'
</body>
</html>
';
$headers   = "From: MIS DGHS \r\n";
$headers  .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

mail($to, $subject, $message, $headers);
?>