require(
    [
        'jquery',
        'Magento_Ui/js/modal/modal'
    ],
    function(
        $,
        modal
    ) {
        var options = {
            type: 'popup',
            responsive: true,
            innerScroll: true,
            title: 'Login Modal',

            buttons: []
            };
        var popup = modal(options, $('#popup-modal'));
        $("#click-me").on('click',function(){
            $("#popup-modal").modal("openModal");
        });
    }
);