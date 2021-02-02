(function ($) {

    function mediaSize() {
        if (window.matchMedia("(max-width: 600px)").matches) {

            $('.get-started a').html('<i class="fa fa-pencil-square-o" aria-hidden="true"></i>');
        } else {

            $('.get-started a').text("Twitter")
        }
    }
    mediaSize();
    window.addEventListener("resize", mediaSize, false);
})(jQuery);
