<h4>Remarks History<hr></h4>
<div id="remarks_history_section">        
    <!-- /.box-comment -->
    <div class="box-footer box-comments">
        <?php
        if (isset($issue_remarks) && !empty($issue_remarks)) {
            foreach ($issue_remarks as $dat) {
                ?>
                <div class="box-comment">
                    <div class="comment-text" style="margin-left: 0;">
                        <span class="username">
                            By <?php echo getUserNameByUserId($dat->user_id); ?>
                            <span class="text-muted pull-right"> at <?php echo human_format_date($dat->created_at) ?></span>
                        </span><!-- /.username -->
                        <?php echo $dat->remarks ?>
                    </div>
                    <!-- /.comment-text -->
                </div>
                <!-- /.box-comment -->
                <?php
            } // foreach
        }
        ?>
    </div>
</div>