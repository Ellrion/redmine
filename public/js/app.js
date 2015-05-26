(function(){
    $(function () {
        $('[data-toggle="popover"]').popover()
        $('[data-toggle="tooltip"]').tooltip()
    });

    var vm = new Vue({
        el: '#pull',
        data: {
        }
    });
})();