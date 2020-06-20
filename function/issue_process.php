<?php
if(isset($_POST['issue_create']) && !empty($_POST['issue_create'])){
    if(issue_form_fields_validation()){
        $response   =   create_issue_info();
        if($response['status']  == 'success'){
            $_SESSION['success']    =   "Data have been successfully Created.";
        }else{
            $_SESSION['error']    =   $response['message'];
        }
    }else{
        $_SESSION['error']    =   "Please fill all the required fields";
    }
    header("location: issue_entry_form.php");
    exit();   
}

function issue_form_fields_validation(){
    $error  =   false;
    if(empty($_POST['user_id'])){
        $error  =   true;
        $_SESSION['form_error']['user_id']   =   'User Field is required';
    }else{
        unset($_SESSION['form_error']['user_id']);
    }
    if(empty($_POST['issue_name'])){
        $error  =   true;
        $_SESSION['form_error']['issue_name']   =   'Issue Name Field is required';
    }else{
        unset($_SESSION['form_error']['issue_name']);
    }
    if(empty($_POST['issue_details'])){
        $error  =   true;
        $_SESSION['form_error']['issue_details']   =   'Issue Description Field is required';
    }else{
        unset($_SESSION['form_error']['issue_details']);
    }
    if($error){
        $status     =   false;
    }else{
        $status     =   true;
    }
    return $status;
}

function create_issue_info(){
    global $conn;
    $table          =   'issue_info';
    $insertData     =   [
        'id'        => get_table_next_primary_id($table),
        'user_id'       => trim(validate_input($_POST['user_id'])),
        'issue_name'    => trim(validate_input($_POST['issue_name'])),
        'issue_details' => trim(validate_input($_POST['issue_details'])),
        'created_at'    => date('Y-m-d H:i:s'),
    ];
    $response   =   saveData($table, $insertData);
    return $response;
}

function get_issue_full_list($is_status  =   null){
    $table      =   "issue_info";
    $column     =   "created_at";
    $order      =   "DESC";
    $allIssue   =   getTableDataByTableName($table, $order, $column);
    return $allIssue;
}

function get_issue_details_by_id($issue_id){
    $issueDetails   =   getDataRowByTableAndId('issue_info', $issue_id);
    
    $table          =   "issue_remarks";
    $column         =   "created_at";
    $order          =   "DESC";
    $issueRemarks   =   getTableDataByTableName($table, $order, $column);
    $feedBackData   =   [
        'issue_details'  =>  $issueDetails,
        'issue_remarks'  =>  $issueRemarks
    ];
    return $feedBackData;
}

if (isset($_GET['process_type']) && $_GET['process_type'] == 'issueDetailsUpdate') {
    session_start();
    date_default_timezone_set('Asia/Dhaka');
    include '../connection/connect.php';
    include '../helper/utilities.php';
    $user_id    =  trim(validate_input($_POST['user_id'])); 
    $issue_id   =  trim(validate_input($_POST['issue_id']));
    $remarks    =  trim(validate_input($_POST['remarks']));
    if(!check_user_id_and_remarks_is_empty()){
        $datas  =   [
            'user_id'   =>  $user_id,  
            'issue_id'  =>  $issue_id, 
            'remarks'   =>  $remarks, 
            'created_at'=>  date('Y-m-d H:i:s')
        ];
        if(isset($_POST['is_status']) && !empty($_POST['is_status'])){
            $table      =   "issue_info";
            $dataParam  =   [
                'is_status' =>$_POST['is_status']
            ];
            $where  =   [
                'id' =>$issue_id
            ];
            updateData($table, $dataParam, $where);
        }
        $table  =   "issue_remarks";
        saveData($table, $datas);
        $status     =   "success";
        $message    =   "Data have been successfully updated";
    }else{
        $status     =   "error";
        $message    =   "User and remarks both are required.";
    }
    $feedback   =   [
        'status'    => $status,
        'message'   => $message,
    ];
    echo json_encode($feedback);
    exit;
}

function check_user_id_and_remarks_is_empty(){
    $status  =  false;
    if(empty($_POST['user_id'])){
        $status  =  true;
    }
    if(empty($_POST['remarks'])){
        $status  =  true;
    }
    
    return $status;
}