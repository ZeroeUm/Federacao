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


$(document).ready(function() { 
    $(".tablesorter").tablesorter(); 
} 
);




$(document).ready(function() {

    //When page loads...
    $(".tab_content").hide(); //Hide all content
    $("ul.tabs li:first").addClass("active").show(); //Activate first tab
    $(".tab_content:first").show(); //Show first tab content

    //On Click Event
    $("ul.tabs li").click(function() {

        $("ul.tabs li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".tab_content").hide(); //Hide all tab content

        var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
        $(activeTab).fadeIn(); //Fade in the active ID content
        return false;
    });

});

            
$(document).ready(function(){
    $('.column').equalHeight();
});
      
<script src="https://www.google.com/jsapi" type="text/javascript"/>
$(document).ready(function() {

    google.load("visualization", "1", {
        packages:["corechart"]
    });
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Ano', 'Colibri', 'Winalite','Salario Fixo'],
            ['Mar',  1000,      1400     ,  1000        ],
            ['Abr',  1170,      1460     ,  1000        ],
            ['Mai',  1660,      1120     ,  1700        ],
            ['Jun',  1030,      540      ,  1000        ]

            ]);

        var options = {
            title: 'Empresas que trabalho'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
    }
}
);
       
     