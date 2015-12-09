jQuery(document).ready(function($){
    var form = $('#bg-yml'),
        filters = form.find('.restrict-cats'),
        incl = form.find('#placeholter_text').attr("include"),
        excl = form.find('#placeholter_text').attr("exclude");
    
    if (!form.find('#cats_restrict').is(':checked')){
        filters.hide();
    }
    form.find('#cats_restrict').change(function() {
        filters.toggle(this.checked);
    });
    form.find('input:radio').change(function() {
        switch ( $(this).val() ) {
            case 'include':
                $('#product_categories').attr('data-placeholder', incl ).trigger('change');
                break;
            case 'exclude':
                $('#product_categories').attr('data-placeholder', excl ).trigger('change');
                break;
        }
    });
});

