<?php
session_start();
if(isset($_POST['goo']))
{
    include "./helperphp/db_con.php";
    $user = mysql_real_escape_string($_POST['userID']);
    $pass = mysql_real_escape_string($_POST['userPass']);

    $query="select * from access where userid='$user' and pass='$pass'";
    $log_qry = mysql_query($query);

    $login_nr = mysql_num_rows($log_qry);
    $row_login=mysql_fetch_assoc($log_qry);

    if ($login_nr == 1)
    {
        $usert=$row_login['user'];
        $_SESSION['usr'] = $user;
        $_SESSION['pass'] = $pass;
        header("location: ./index.php");
        //header("location: ../access/index.php");

        // echo "OK";
    }
    else
    {
        header("location: ./login.php?actn=invld");

    }

}
?>