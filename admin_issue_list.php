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
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Issue List</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <?php
                                $issueList = get_issue_full_list();
                                if (isset($issueList) && !empty($issueList)) {
                                    ?>
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Issue</th>
                                            <th>Created Date</th>
                                            <th>Created By</th>
                                            <th>Status</th>
                                            <th>Details</th>
                                        </tr>
                                        <?php
                                        $sl = 1;
                                        foreach ($issueList as $data) {
                                            ?>
                                            <tr>
                                                <td><?php echo $sl++; ?></td>
                                                <td><?php echo $data->issue_name; ?></td>
                                                <td><?php echo human_format_date($data->created_at); ?></td>
                                                <td><?php echo getUserNameByUserId($data->user_id); ?></td>
                                                <td><?php echo getStatusDivById($data->is_status); ?></td>
                                                <td>
                                                    <a href="admin_issue_details.php?issue_id=<?php echo $data->id ?>" class="btn btn-primary">
                                                        <i class="fa fa-pencil-square">&nbsp;Details</i> 
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </table>
                                <?php } else { ?>
                                    <div class="alert alert-info">
                                        <strong>No Data!</strong> There is no issue list.
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!--/.col (left) -->
                </div>
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
