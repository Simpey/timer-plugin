function calc_data(timer,tp_date,tp_time) {

    var tp_years = 0;
    var tp_days=0;
    var tp_hours = 0;
    var tp_minutes = 0;
    var tp_seconds = 0;
    
    var tempdate = tp_date.split("/");
    var temptime = tp_time.split(":");
    
    var seconds=1000;
    var minutes=seconds*60;
    var hours=minutes*60;
    var days=hours*24;
    var years=days*365;
    
    var db_time = new Date(tempdate[0], tempdate[1]-1, tempdate[2], temptime[0], temptime[1], 00);
    var now_time = new Date();
    db_time = db_time.getTime();
    now_time = now_time.getTime();
    var tp_result = db_time-now_time;
    if(tp_result < 0)
        tp_years=tp_days=tp_hours=tp_minutes=tp_seconds=0;
    else {
        tp_years = Math.floor(tp_result/years);
        tp_days = Math.floor(tp_result/days)-(tp_years*365);
        tp_hours = Math.floor(tp_result/hours)-(tp_days*24)-(tp_years*365*24);
        tp_minutes = Math.floor(tp_result/minutes)-(tp_hours*60)-(tp_days*24*60)-(tp_years*365*24*60);
        tp_seconds = Math.floor(tp_result/seconds)-(tp_minutes*60)-(tp_hours*60*60)-(tp_days*60*24*60)-(tp_years*365*24*60*60);
        singlebox=false;
        if(tp_years>99) {
            tp_years=99;
        }
        if(tp_days>99) {

            singlebox=true;
        }
        if(tp_years<0)tp_years=0;
        if(tp_days<0)tp_days=0;
        if(tp_hours<0)tp_hours=0;
        if(tp_minutes>60)tp_minutes=60;
        if(tp_minutes<0)tp_minutes=0;
        if(tp_seconds<0)tp_seconds=0;
    }

    timer.find('div#clockdiv span[id^="years"]').html(tp_years);
    timer.find('div#clockdiv span[id^="days"]').html(tp_days);
    timer.find('div#clockdiv span[id^="hours"]').html(tp_hours);
    timer.find('div#clockdiv span[id^="minutes"]').html(tp_minutes);
    timer.find('div#clockdiv span[id^="seconds"]').html(tp_seconds);
}

jQuery(document).ready(function($) {
    $('.timer-main').each(function() {
        var tp_date=$(this).find('input.tp-widget-date').val();
        var tp_time=$(this).find('input.tp-widget-time').val();
        // console.log(tp_date);
        var timer = $(this);
        calc_data(timer, tp_date, tp_time);
        setInterval(function() {
            calc_data(timer, tp_date, tp_time);
        }, 1000)
    });
    
});