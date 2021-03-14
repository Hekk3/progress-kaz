myCheckBox = $('[name=status]');
from = $('[name=from_date]');
to = $('[name=to_date]');
news = $('[data-get-items-field=news_list_belongstomany_news_relationship]');


// check

if(myCheckBox.is(':checked')){
    from.prop('disabled', false);
    to.prop('disabled', false);
    news.prop('disabled', false);
}else{
    from.prop('disabled', true);
    to.prop('disabled', true);
    news.prop('disabled', true);
}

// end check


// on click

myCheckBox.on("change", function (e) {
    e.preventDefault();
    if(myCheckBox.is(':checked')){
        from.prop('disabled', false);
        to.prop('disabled', false);
        news.prop('disabled', false);
    }else{
        from.prop('disabled', true);
        to.prop('disabled', true);
        news.prop('disabled', true);
    }
});
// end on click
