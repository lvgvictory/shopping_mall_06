$(document).ready(function() {
    $('#button_update_status').click(function () {
        var statuss = $(this).parents().find('#status_bill_detail').val();
        var idBill = $(this).parents().find('#status_bill_detail').attr('idBill');
        var button_update_status = $(this);
        
        $.ajax({
            url: '/admin/update-status-bill',
            type: 'GET',
            data: {
                statuss: statuss, 
                idBill: idBill
            },
            success: function (res) {
                $('.active_bills').html(res);
                if (res == 'Hoàn Thành') {
                    button_update_status.parents().find('.del_option').remove();
                    button_update_status.parents('.dlt').remove();
                }
                toastr.success('Update Status Successfully!');
            }
        });
    });
});