//Multi-Phase Ajax Request
jQuery.extend({
    getValues:function(data,url_,dom,method){
                            
    var result=null;
    return $.ajax({
        url:url_,
        data:data,
        type:method,
        async:true,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        beforeSend:$.onSend
        });
    }
});