"use strict";

// const { forEach } = require("lodash");

// Component Definition
var Forms = function() {
    
    this.selectableSearch = function(){

        $('.selectablev1').change(function(){
        
            var $target = $('.' + $(this).attr('data-onchange-target'));

            try{

                var selected = $.parseJSON($(this).val());
                var sizes = selected.sizes;

                var options = '';
                for(var i = 0; i < sizes.length; i++){
                    options += '<option value="' + sizes[i].size_id + '">' + sizes[i].size + '</option>';
                }

                if($target.hasClass('select2'))
                {
                    $target.select2("destroy")
                    $target.html(options);
                    $target.select2()
                }else{

                    $target.selectpicker("destroy");
                    $target.html(options);
                    $target.selectpicker("refresh")
                }

            }catch(e){}
        })
    }
}

$(function(){

    (new Forms()).selectableSearch()
})


