function update_issue_details(form_id) {
    $.ajax({
        url: baseUrl + "function/issue_process.php?process_type=issueDetailsUpdate",
        type: 'POST',
        dataType: 'json',
        data: $("#" + form_id).serialize(),
        success: function (response) {
            if (response.status == "success") {
                swal("Success", response.message, "success");
                setTimeout(function () {
                    location.reload();
                }, 2000);
            } else {
                swal("Failed!", response.message, "error");
            }
        }
    });
}