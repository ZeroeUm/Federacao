/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */



$(document).ready(function(){
    if ($("div#notice")) {
        //setTimeout(function(){ $("div#msg").hide("slow"); }, 5000);
        setTimeout(function(){
            $("div#msg").fadeOut("slow");
        }, 5000);
    }
});

     