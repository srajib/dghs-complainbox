<?php
$dt_q=mysql_query("Select * from die_email_temp");
$dt_r=mysql_fetch_object($dt_q);
?>
<!-- ======= .grid_12 - block begin ======= -->
<section class="grid_12">
    <div class="box">
        <div class="inside">
            <!-- formee-->
            <form class="formee" action="" method="POST">
                <div class="in">

                    <div class="grid-2-12">
                        <label>Day Intervals </label>
                        <input type="text" name="interv" value="<?php echo $dt_r->tday;?>"/> Day(s)
                        </div>

                    <div class="grid-10-12">
                        <label>Enter the email address(es) (separate by comma for multiple email)</label>
                        <textarea rows="3" cols="4" name="email_addr"><?php echo $dt_r->email_addr;?></textarea>
                    </div>

                        <div class="grid_12">
                        <label>Designing the digest email template (This design is generate for every message)</label>
                        <?php $txtareaname="dietemp_i"; $txtv=$dt_r->die_email_html; include("email_templicts.php"); ?>
                    </div>

                </div><!-- End .in class -->


                <!--Form footer begin-->
                <section class="box_footer">
                    <div class="grid-12">
                        <input type="reset" class="right button red" value="Rest Form" /> &nbsp; <input type="submit" class="right button green" value="Save" name="adddietemp_i" />
                    </div>
                    <div class="clear"></div>
                </section>
                <!--Form footer end-->


            </form>
            <!-- formee-->

        </div>
    </div>
</section>
<div class="clear"></div>
<!-- ======= .grid_12 - block end ======= -->