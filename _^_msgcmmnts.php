
<!-- ====================================================== .grid_12 - block begin ======= -->
<section class="grid_12">
    <div class="box" style="width:100%;">
        <div class="inside">
            <table cellpadding="0" cellspacing="0" border="0" class="display" id="datatable_2">
                <thead>
                <tr>
                    <th width="15%">User</th>
                    <th width="85%">Comments &amp; Action</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while($cmmnts_out_r=mysql_fetch_object($cmmnts_qq))
                {
                ?>
                <tr class="">
                    <td><?php echo $cmmnts_out_r->said; ?><br/><?php echo $cmmnts_out_r->cdatetime; ?></td>
                    <td><?php echo $cmmnts_out_r->cmmnts; ?> <br/>
                        <span style="color:#a52a2a;">Rank: </span><?php echo $cmmnts_out_r->rank_type; ?>; &nbsp; <span style="color:#a52a2a;">Type: </span><?php echo $cmmnts_out_r->type_details; ?>; &nbsp; <span style="color:#a52a2a;">Action: </span><?php echo $cmmnts_out_r->action_details; ?>; &nbsp; <span style="color:#a52a2a;">Solution: </span><?php echo $cmmnts_out_r->solution_details; ?>;
                    </td>
                </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="clear"></div>

        </div>
    </div>
</section>
<div class="clear"></div>
<!-- ====================================================== .grid_12 - block end ======= -->