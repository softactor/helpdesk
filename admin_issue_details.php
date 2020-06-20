<?php include 'header.php'; ?>
<?php include 'top_sidebar.php'; ?>
<!-- Left side column. contains the logo and sidebar -->
<?php include 'left_sidebar.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Issue Details</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <?php
                        $id = $_GET['issue_id'];
                        $response = get_issue_details_by_id($id);
                        $issue_details = $response['issue_details'];
                        $issue_remarks = $response['issue_remarks'];
                        include 'partial/issue_details_common_section.php';
                        ?>
                        <div class="row">
                            <div class="col-md-6">
                                <form id="issue_details_update_form">
                                    <div class="form-group">
                                        <label for="email">Status:</label>
                                        <div class="radio">
                                            <label><input type="radio" name="is_status" value="0" <?php if(isset($issue_details) && $issue_details->is_status == 0){ echo 'checked'; } ?>>Pending</label>
                                        </div>
                                        <div class="radio">
                                            <label><input type="radio" name="is_status" value="2" <?php if(isset($issue_details) && $issue_details->is_status == 2){ echo 'checked'; } ?>>Processing</label>
                                        </div>
                                        <div class="radio disabled">
                                            <label><input type="radio" name="is_status" value="1" <?php if(isset($issue_details) && $issue_details->is_status == 1){ echo 'checked'; } ?>>Resolved</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">Remarks:</label>
                                        <textarea class="form-control" rows="5" id="remarks" name="remarks"></textarea>
                                    </div>
                                    <input type="hidden" name="issue_id" value="<?php echo $issue_details->id; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['logged']['user_id']; ?>">
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
                <!-- /.row -->
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'footer.php'; ?>

