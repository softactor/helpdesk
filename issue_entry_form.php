<?php include 'front_header.php'; ?>
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Issue Entry Form</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form role="form" action="" method="post">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="sel1">Select User:<span class="required"></span></label>
                                    <select class="form-control" id="user_id" name="user_id">
                                        <option value="">Please select</option>
                                        <option value="2">PLIS ADMIN</option>
                                        <option value="3">GIZ ADMIN</option>
                                    </select>
                                    <?php
                                    if(isset($_SESSION['form_error']['user_id']) && !empty($_SESSION['form_error']['user_id'])){
                                        echo '<span class="error">'.$_SESSION['form_error']['user_id'].'</span>';
                                        unset($_SESSION['form_error']['user_id']);                                        
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Issue Name<span class="required"></span></label>
                                    <input type="text" class="form-control" id="issue_name" name="issue_name" placeholder="Enter Issue Name">
                                    <?php
                                    if(isset($_SESSION['form_error']['issue_name']) && !empty($_SESSION['form_error']['issue_name'])){
                                        echo '<span class="error">'.$_SESSION['form_error']['issue_name'].'</span>';
                                        unset($_SESSION['form_error']['issue_name']);                                        
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <label for="comment">Issue Description:<span class="required"></span></label>
                                    <textarea class="form-control" rows="5" id="issue_details" name="issue_details"></textarea>
                                    <?php
                                    if(isset($_SESSION['form_error']['issue_details']) && !empty($_SESSION['form_error']['issue_details'])){
                                        echo '<span class="error">'.$_SESSION['form_error']['issue_details'].'</span>';
                                        unset($_SESSION['form_error']['issue_details']);
                                    }
                                    ?>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <input type="submit" class="btn btn-primary btn-block" value="Create" name="issue_create">
                            </div>
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
<?php include 'front_footer.php'; ?>
