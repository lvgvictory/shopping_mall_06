$(document).ready(function() {
    $('#change_status').change(function() {
        var status = $(this).val();

        $.ajax({
            url: '/admin/filter-bill',
            type: 'GET',
            data: {status: status},
            success: function (res) {
                $('.filter-bill').html(res);
                toastr.success('Filter Successfully!');
            }
        });     
    });
});