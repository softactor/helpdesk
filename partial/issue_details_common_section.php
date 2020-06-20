<!-- Main content -->
<!-- info row -->
<div class="row invoice-info">
    <div class="col-md-4 invoice-col">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Issue</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <strong><i class="fa fa-book margin-r-5"></i> Created By</strong>
                <p class="text-muted">
                    <?php echo getUserNameByUserId($issue_details->user_id) ?>
                </p>
                <hr>

                <strong><i class="fa fa-map-marker margin-r-5"></i> Created At</strong>
                <p class="text-muted"><?php echo human_format_date($issue_details->created_at) ?></p>
                <hr>

                <strong><i class="fa fa-pencil margin-r-5"></i> Status</strong>
                <p>
                    <?php echo getStatusDivById($issue_details->is_status) ?>
                </p>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
    <!-- /.col -->
    <div class="col-md-8 invoice-col">
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <i class="fa fa-info"></i> <?php echo $issue_details->issue_name ?>
                    <small class="pull-right">Last Date: <?php echo human_format_date($issue_details->created_at) ?></small>
                </h2>
            </div>
            <!-- /.col -->
        </div>
        <!-- Table row -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">About Issue Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <p>
                    <?php echo $issue_details->issue_details; ?>
                </p>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>
<!-- /.row -->