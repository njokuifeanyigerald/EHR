/*
* Helpful refactors for highcharts.js
*/

//For bar charts
function display_bar_chart(id,title,labels,y_title,series_name,data,exporting = false){
    Highcharts.chart(id, {
            chart: {
                type: 'bar'
            },
            title: {
                text: title
            },
            xAxis: {
                categories: labels
            },
            yAxis: {
                title: {
                    text: y_title
                }
            },
            plotOptions: {
                bar: {
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: exporting
            },
            series: [{
                name: series_name,
                data: data
            },]
        });

    }

 //For pie charts
 function display_pie_chart(id,title,series_name,label_data,exporting = true){
     Highcharts.chart(id, {
             chart: {
                 type: 'pie'
             },
             title: {
                 text: title
             },
             plotOptions: {
                 pie: {
                     allowPointSelect: true,
                     cursor: 'pointer',
                     dataLabels: {
                         enabled: true
                     }
                 }
             },
             credits: {
                 enabled: false
             },
             exporting: {
                 enabled: exporting
             },
             series: [{
                 name: series_name,
                 data: label_data
             },]
         });
 }

 //For pie charts with percentages
 function display_pie_chart_percentage(id,title,series_name,label_data,exporting = false){
     Highcharts.chart(id, {
             chart: {
                 type: 'pie'
             },
             title: {
                 text: title
             },
             tooltip: {
                 pointFormat: '{series.name}: <b>{point.percentage:.2f}%</b>'
             },
             plotOptions: {
                 pie: {
                     allowPointSelect: true,
                     cursor: 'pointer',
                     dataLabels: {
                         enabled: true
                     }
                 }
             },
             credits: {
                 enabled: false
             },
             exporting: {
                 enabled: exporting
             },
             series: [{
                 name: series_name,
                 data: label_data
             },]
         });
 }

 //Get subtitle for dount charts
 function getSubtitle(value, title) {
     return `<p class="text-primary m-0 text-center"><b style="font-size: 18px">${value}</b>
          <br>
         <b style="font-size: 10px"> ${title}</b>
         </p>`;
 }

 //For donut charts with legends
 function display_donut_chart(id,title,getSubtitle,series_name,label_data,size = 130,exporting = false){
     return Highcharts.chart(id, {
         chart: {
             type: 'pie',
         },
         title: {
             text: title,
             align: 'left',
             style: {
                 fontSize: '0.875em'
             }
         },
         legend: {
             itemDistance:7,
             symbolPadding: 1,
           y: 20,
           itemStyle: {
             "cursor": "pointer",
             "fontSize": "8px",
           }
         },
         subtitle: {
             useHTML: true,
             text: getSubtitle,
             verticalAlign: 'middle',
         },
         plotOptions: {
             series: {
                 size: size,
                 innerSize: '75%',
             },
             pie: {
                 allowPointSelect: true,
                 cursor: 'pointer',
                 dataLabels: {
                     enabled: false,
                 },
                 showInLegend: true,
             },
         },
         credits: {
             enabled: false//to not display highcharts watermark
         },
         exporting: {
             enabled: exporting
         },
         series: [{
             name: series_name,
             data: label_data
         }, ]
     });
 }

 //For column charts
 function display_column_chart(id,title,labels,y_title,series_name,data,exporting = false){
    return Highcharts.chart(id, {
             chart: {
                 type: 'column'
             },
             title: {
                 text: title
             },
             xAxis: {
                 categories: labels,
                 labels: {
                         rotation: 0,
                         style:{
                             fontSize: "0.6em",
                         },
                     },
             },
             yAxis: {
                 title: {
                     text: y_title
                 }
             },
             plotOptions: {
                 bar: {
                     dataLabels: {
                         enabled: true,
                     }
                 },
                 column: {
                     pointPadding: 0.9,
                     borderWidth: 8,
                     borderRadius: 20,
                 }
             },
             credits: {
                 enabled: false
             },
             exporting: {
                 enabled: exporting
             },
             series: [{
                 showInLegend: false,
                 name: series_name,
                 data: data
             },]
         });
 }

 //For Spline chart
 function display_spline_chart(id,labels, nameData = [], exporting = false){
     Highcharts.chart(id, {
         chart: {
             type: 'spline'
         },
         title: {
             text: null,
         },
         xAxis: [{
             categories: labels,
         }],
         yAxis: [{
             title: {
                 text: null
             },
         }],
         plotOptions: {
             series: {
                 marker: {
                     enabled: false
                 },
                 lineWidth: 3,
             },
         },
         credits: {
             enabled: false
         },
         exporting: {
             enabled: exporting
         },
         series: nameData,
     });
 }

 //For column chart
 function display_simple_column_chart(id, labels, series_name, data, title = null, exporting = false){
     //Lab test results
     Highcharts.chart(id, {
         chart: {
             type: 'column'
         },
         title: {
             text: ''
         },
         xAxis: {
             categories: labels,
             labels: {
                     style:{
                         fontSize: "0.6em",
                         color: "gray",
                     },
                 },
         },
         yAxis: {
             title: {
                 text: title,
             }
         },
         plotOptions: {
             bar: {
                 dataLabels: {
                     enabled: true
                 }
             }
         },
         credits: {
             enabled: false
         },
         exporting: {
             enabled: exporting
         },
         legend: {
             enabled: false
         },
         series: [{
             name: series_name,
             colorByPoint: true,
             data: data
             },
         ]
     });
 }
