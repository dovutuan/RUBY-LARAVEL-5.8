$(".deleteRecord").click(function(){
    var id = $(this).data("id");
    var token = $("meta[name='csrf-token']").attr("content");

    $.ajax(
        {
            url: "category/delete/"+id,
            type: 'DELETE',
            data: {
                "id": id,
                "_token": token,
            },
            success: function (res) {
                if (res.status == true) {
                    window.location.href = "category/";
                }
            }
        });

});

var category = {
    init: function () {
        category.regEvents();
    },
    regEvents: function () {
        var url=$(this).attr('data-url');
        $('.btnDelete').off('click').on('click', function (e) {
            e.preventDefault();
            if (confirm("Bạn có muốn xóa danh mục không?")) {
                $.ajax({
                    data: { "id": id, },
                    url: "{{route('admin.get.destroy.category')}}",
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    dataType: 'json',
                    type: 'DELETE',
                    success: function (res) {
                        if (res.status == true) {
                            window.location.href = "category/";
                        }
                    }
                })
            }
        });
    }
}
category.init();
