<?php
if(isset($_POST['adddietemp_i']) AND $_POST['dietemp_i']!="" AND $_POST['interv']!="" AND $_POST['email_addr']!="" )
{
    $adddietemp_i=mysql_real_escape_string($_POST['dietemp_i']);
    $email_addr=mysql_real_escape_string($_POST['email_addr']);
    $interv=mysql_real_escape_string($_POST['interv']);

     mysql_query("UPDATE die_email_temp SET die_email_html='$adddietemp_i', tday='$interv', email_addr='$email_addr'") or die("Database has problem");
}
?>
<!-- ======= .grid_12 ======= -->
<section class="grid_12">
    <!-- ======= UI TABS ======= -->
    <div class="ui_tabs">
        <ul>
            <li><a href="#tabs-1">Digest Email Template</a></li>
            <li><a href="#tabs-2">Instruction</a></li>
            <li><a href="#tabs-3">Send Email for Test</a></li>
        </ul>
        <div id="tabs-1">
            <?php include ("_^_adddietemp.php"); ?>

        </div>

        <div id="tabs-2">
            <?php include ("_^_dietempins.php"); ?>
        </div>
        <div id="tabs-3">
            <br />
            <a href="digest_email.php" target="_blank">Click Here for get test email according to your "Digest Email Template Settings".</a>
            <br />
        </div>
    </div>

</section>
<!-- ======= /.grid_12 ======= -->