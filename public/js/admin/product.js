$(document).ready(function () {
	$('#category_value').change(function () {
		var cate = $(this).val();
		console.log(cate);
		if (cate != 0) {
			$.ajax({
				url: '/admin/category-product',
				type: 'GET',
				data: {cate: cate},
				success: function (res) {
					$('.result_sub').html(res);
				}
			});
		} else {
			toastr.warning('Bạn cần phải lựa chọn danh mục');
		}
	});
});