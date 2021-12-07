$(document).ready(function () {
    $('.modal-ajax').on('hidden.bs.modal', function () {
        $(document).find('.datetime-modal').html('');
        $(this).find('.modal-body').html('');
    })
    /** Modal Ajax */
    $(document).on('click', '[data-toggle=modal]', function () {
        var modal = $(this).attr('data-target');
        var title = $(this).attr('data-title');
        var url = $(this).attr('href');
        if ($(modal).hasClass('modal-ajax')) {
            $.ajax({
                async: true,
                url: url,
                type: 'GET',
            }).done(function (response) {
                var html = response;
                $(modal).find('.modal-header h5').html(title);
                $(modal).find('.modal-body').html(html);
                if ($(modal).find('form').attr('action') === "") {
                    $(modal).find('form').attr('action', url);
                }

                /** Lost jquery */
                $(modal).find(".select2").select2();
            });
        }
    });
});
