$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(function () {
    let listStart = $(".list_star .fa");
    listRatingText = {
        1: 'Không thích',
        2: 'Tạm được',
        3: 'Bình thường',
        4: 'Tốt',
        5: 'Rất tốt',
    }
    listStart.mouseover(function () {
        let $this = $(this);
        let number = $this.attr('data-key');
        listStart.removeClass('rating_active');
        $(".number_rating").val(number);
        $.each(listStart, function (key) {
            if (key + 1 <= number) {
                $(this).addClass('rating_active')
            }
        });
        $(".list_text").text('').text(listRatingText[$this.attr('data-key')]).show();
    });
    // $(".js_rating_product").click(function (e) {
    //     event.preventDefault();
    //     let content = $(".content").val();
    //     console.log(content)
    //     let number = $(".number_rating").val();
    //     console.log(number)
    //     let url = $(this).attr('href');
    //     if (content && number) {
    //         $.ajax({
    //             url: url,
    //             type: 'POST',
    //             data: {
    //                 number: number,
    //                 content: content
    //             }
    //         }).done(function (result) {
    //         });
    //     }
    // });
});
