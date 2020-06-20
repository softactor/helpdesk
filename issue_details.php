<?php include 'front_header.php'; ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Issue Details</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php
                                $id             =   $_GET['issue_id'];
                                $response       =   get_issue_details_by_id($id);
                                $issue_details  =   $response['issue_details'];
                                $issue_remarks  =   $response['issue_remarks'];
                                include 'partial/issue_details_common_section.php'
                            ?>
                            <div class="row">
                            <div class="col-md-6">
                                <form id="issue_details_update_form">
                                    <div class="form-group">
                                        <label for="sel1">Select User:<span class="required"></span></label>
                                        <select class="form-control" id="user_id" name="user_id" required>
                                            <option value="">Please select</option>
                                            <option value="2">PLIS ADMIN</option>
                                            <option value="3">GIZ ADMIN</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Remarks:</label>
                                        <textarea class="form-control" rows="5" id="remarks" name="remarks" required></textarea>
                                    </div> 
                                    <input type="hidden" name="issue_id" value="<?php echo $issue_details->id; ?>">
                                    <button type="button" class="btn btn-primary btn-block" onclick="update_issue_details('issue_details_update_form');">Update</button>
                                </form>
                            </div>
                            <div class="col-md-6">
                                <?php include 'partial/issue_details_common_remarks.php'; ?>
                            </div>
                        </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
<?php include 'front_footer.php'; ?>
