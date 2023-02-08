
(function($)
{
    $.fn.dnsChecker = function(options)
    {
        var sl = null;
        this.each(function(e)
        { 
            sl = new r(); //<--- initialize the class
        });
        return sl;
    }
                    
    var r = (function()
    {
        function r()
        {	
            
            /** init function or event here */
            var $this = this;
            
            setTimeout(function(){ $this.track(); },1000);
        }

        // update server session every minutes to track how long a user used on a page
        // get visitors details using ip-api.com/json
        // what a user click on looking for the text, tag, data-type
        // get browser, device, 

    r.prototype.track = function(){

        var $this = this;

        this.info(function(data){

            data.referrer = $this.referrer();
            data.page = $this.page();

            $this.get(data, '/user/send/update/notice', 'post', function(response){
                console.log(response)
            });

        });
        
    }

    r.prototype.referrer = function(){

        return document.referrer;
    }

    r.prototype.page = function(){

        return window.location.pathname;
    }

    r.prototype.info = function(callback){

        fetch('http://ip-api.com/json', { method: 'GET' }).then(function (response) {

            if (response.ok) {
                return response.json();
            }
            return Promise.reject(response);
        }).then(function (data) {

            callback(data);
        }).catch(function (error) {

            console.warn('Something went wrong.', error);
            callback({});
        });
    }

    /**
     * 
     * @param {*} data 
     * @param {*} path 
     * @param {*} method 
     * @param {*} callback 
     */             
    r.prototype.get = function(data, path, method, callback ){
                                    
        var res = $.getValues(data, path, null, method);
        res.done(function(json){
            callback(json, true);
        });
        res.fail(function(){
            callback(null, false);
        });
    }
                    
    return r;

    })()
})(jQuery)
                    
$(function(){ $("body").dnsChecker(); });
                    