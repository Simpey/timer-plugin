jQuery(document).ready(function($){
    $('.tp-time-edit').live('click',function() {

        var $form = $(this).closest('form');

        $form.find('.tp-date').datepicker({
            format:'m/d/Y',
            hourGrid: 4,
            minuteGrid: 10,
            position: 'right',
            onBeforeShow: function(){
                $(this).DatePickerSetDate($(this).val(), true);
            } 
        });
        $form.find('.tp-date').addClass('editable');
        $form.find( ".tp-hour").slider({
            value:0,
            min: 0,
            max: 23,
            step: 1,
            slide: function( event, ui ) {
                $form.find(".tp-hour-val" ).val(ui.value);
            }
        }); 
        $form.find( ".tp-minute" ).slider({
            value:0,
            min: 0,
            max: 59,
            step: 1,
            slide: function( event, ui ) {
                $form.find(".tp-minute-val" ).val(ui.value);
            }
        });
    });
});   