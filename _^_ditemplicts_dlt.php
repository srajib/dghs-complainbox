<!-- ======= .grid_12 ======= -->
<section class="grid_12">
    <!-- ======= UI TABS ======= -->
    <div class="ui_tabs">
        <ul>
            <li><a href="#tabs-1">Digest Email Template</a></li>
            <li><a href="#tabs-2">Instruction</a></li>
        </ul>
        <div id="tabs-1">
            <?php include ("_^_addemtemp.php"); ?>

        </div>

        <div id="tabs-2">
            <?php include ("_^_emtempins.php"); ?>
        </div>
    </div>

</section>
<!-- ======= /.grid_12 ======= -->
<?php
//if(isset($_POST['addemtemp_i']) AND $_POST['emtemp_i']!="")
//{
 //   $emtemp_i=mysql_real_escape_string($_POST['emtemp_i']);

    //echo $emtemp_i;
    //mysql_query("UPDATE email_temp SET email_temp_html='$emtemp_i'") or die("Database has problem");
//}
?>