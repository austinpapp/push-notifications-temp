(function($, _) {

    $.fn.iSFilter = function(query) {
        if (typeof query === 'undefined') {
            this.data('iSFilterItems', _(this.find('[data-filter-item]')).reduce(function (memo, item) {
                    var el = $(item);
                    memo.push({
                        el: el,
                        value: el.data('filter-item').toLowerCase()
                    })
                    return memo;
                }, [])
            );
        } else {
            query = query.toLowerCase();
            _(this.data('iSFilterItems')).each(function (item) {
                if (0 === item.value.search(query)) {
                    item.el.show();
                } else {
                    item.el.hide();
                }
            });
        }

        return this;
    };

})(jQuery, _);

$(function () {
    $('[data-filter-input]').each(function () {
        var input = $(this);
        var filter = $(input.data('filter-input'));
        filter.iSFilter();
        input.on('input change', function () {
            filter.iSFilter(input.val());
        });
    });
});