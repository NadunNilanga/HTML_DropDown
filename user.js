function load_combo_box_user(callBack) {
    var combo_data = '';
    $.post("controller/user/user.php", { request: 'user' }, function(e) {
        if (e === undefined || e.length === 0 || e === null) {
            combo_data += '<option value=""> -- No Data Found -- </option>';
        } else {
            $.each(e, function(index, qData) {
                index++;
                $(".user-list").append('<option value="' + qData.name + '">' + qData.nic + '</option>');
            });
            $('.user-list').select2();
        }

        if (callBack !== undefined) {
            if (typeof callBack === 'function') {
                callBack();
            }
        }
    }, "json");
}
//End load combo box  


$("#cmb_users").change(
    function() {
        $("#txtUserName").val($(this).val());
    }
);