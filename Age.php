
<?php

ini_set('memory_limit', '1024M');
$q1 = $_POST['Social_Group'];
$q2 = $_POST['Attitude'];
$q3 = 'Age';


$con = mysqli_connect('localhost','root','','Demo_DB');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"Demo_DB");

// 6-20
$sql1="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 BETWEEN 6 AND 20 GROUP BY MONTH(date),YEAR(date)";
$result1 = mysqli_query($con,$sql1);
if (!$result1) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row1 = mysqli_fetch_array($result1)) {
    $T1 =  date('Y, n-1,j', strtotime($row1['date']));  
    $Time1 = 'Date.UTC ('.$T1.')';
    $Value1 = $row1["AVG($q2)"];
    $data1[] = "[$Time1,$Value1]";
}
 

// 20-25
$sql2="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 BETWEEN 20 AND 25 GROUP BY MONTH(date),YEAR(date)";
$result2 = mysqli_query($con,$sql2);
if (!$result2) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row2 = mysqli_fetch_array($result2)) {
    $T2 =  date('Y, n-1,j', strtotime($row2['date']));  
    $Time2 = 'Date.UTC ('.$T2.')';
    $Value2 = $row2["AVG($q2)"];
    $data2[] = "[$Time2,$Value2]";
}


// 25-30
$sql3="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 BETWEEN 25 AND 30 GROUP BY MONTH(date),YEAR(date)";
$result3 = mysqli_query($con,$sql3);
if (!$result3) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row3 = mysqli_fetch_array($result3)) {
    $T3 =  date('Y, n-1,j', strtotime($row3['date']));  
    $Time3 = 'Date.UTC ('.$T3.')';
    $Value3 = $row3["AVG($q2)"];
    $data3[] = "[$Time3,$Value3]";
}

// 30-35
$sql4="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 BETWEEN 30 AND 35 GROUP BY MONTH(date),YEAR(date)";
$result4 = mysqli_query($con,$sql4);
if (!$result4) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row4 = mysqli_fetch_array($result4)) {
    $T4 =  date('Y, n-1,j', strtotime($row4['date']));  
    $Time4 = 'Date.UTC ('.$T4.')';
    $Value4 = $row4["AVG($q2)"];
    $data4[] = "[$Time4,$Value4]";
}

// 35-40
$sql5="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 BETWEEN 35 AND 40 GROUP BY MONTH(date),YEAR(date)";
$result5 = mysqli_query($con,$sql5);
if (!$result5) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row5 = mysqli_fetch_array($result5)) {
    $T5 =  date('Y, n-1,j', strtotime($row5['date']));  
    $Time5 = 'Date.UTC ('.$T5.')';
    $Value5 = $row5["AVG($q2)"];
    $data5[] = "[$Time5,$Value5]";
}

// 40-50
$sql6="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 BETWEEN 40 AND 50 GROUP BY MONTH(date),YEAR(date)";
$result6 = mysqli_query($con,$sql6);
if (!$result6) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row6 = mysqli_fetch_array($result6)) {
    $T6 =  date('Y, n-1,j', strtotime($row6['date']));  
    $Time6 = 'Date.UTC ('.$T6.')';
    $Value6 = $row6["AVG($q2)"];
    $data6[] = "[$Time6,$Value6]";
}

// 50-60
$sql7="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 BETWEEN 50 AND 60 GROUP BY MONTH(date),YEAR(date)";
$result7 = mysqli_query($con,$sql7);
if (!$result7) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row7 = mysqli_fetch_array($result7)) {
    $T7 =  date('Y, n-1,j', strtotime($row7['date']));  
    $Time7 = 'Date.UTC ('.$T7.')';
    $Value7 = $row7["AVG($q2)"];
    $data7[] = "[$Time7,$Value7]";
}

// 60-99
$sql8="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 BETWEEN 60 AND 99 GROUP BY MONTH(date),YEAR(date)";
$result8 = mysqli_query($con,$sql8);
if (!$result8) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
while($row8 = mysqli_fetch_array($result8)) {
    $T8 =  date('Y, n-1,j', strtotime($row8['date']));  
    $Time8 = 'Date.UTC ('.$T8.')';
    $Value8 = $row8["AVG($q2)"];
    $data8[] = "[$Time8,$Value8]";
}

mysqli_close($con);
?>

</html>

<!DOCTYPE html>
<html>
<head>
  <div id="chart-A" class="chart"></div> <!-- Container for Chart A -->
  <div class="spacer"></div>
  <div id="chart-B" class="chart"></div> <!-- Container for Chart B -->
  <div id="chart-C" class="chart"></div> <!-- Container for Chart C -->
  <div id="chart-D" class="chart"></div> <!-- Container for Chart D -->
  <div id="chart-E" class="chart"></div> <!-- Container for Chart E -->
  <div id="chart-F" class="chart"></div> <!-- Container for Chart F -->
  <div id="chart-G" class="chart"></div> <!-- Container for Chart G -->
  <div id="chart-H" class="chart"></div> <!-- Container for Chart H -->
  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
  <script src="https://code.highcharts.com/modules/boost.js"></script>
  <script type='text/javascript'>

<?php
while($row1 = mysqli_fetch_array($result1)) {
    $T1 =  date('Y, n-1,j', strtotime($row1['date']));  
    $Time1 = 'Date.UTC ('.$T1.')';
    $Value1 = $row1["AVG($q2)"];
    $data1[] = "[$Time1,$Value1]";
}

while($row2 = mysqli_fetch_array($result2)) {
    $T2 =  date('Y,n-1,j', strtotime($row2['date']));  
    $Time2 = 'Date.UTC ('.$T2.')';
    $Value2 = $row2["AVG($q2)"];
    $data2[] = "[$Time2,$Value2]";
}

while($row3 = mysqli_fetch_array($result3)) {
    $T3 =  date('Y, n-1,j', strtotime($row3['date']));  
    $Time3 = 'Date.UTC ('.$T3.')';
    $Value3 = $row3["AVG($q2)"];
    $data3[] = "[$Time3,$Value3]";
}

while($row4 = mysqli_fetch_array($result4)) {
    $T4 =  date('Y, n-1,j', strtotime($row4['date']));  
    $Time4 = 'Date.UTC ('.$T4.')';
    $Value4 = $row4["AVG($q2)"];
    $data4[] = "[$Time4,$Value4]";
}

while($row5 = mysqli_fetch_array($result5)) {
    $T5 =  date('Y, n-1,j', strtotime($row5['date']));  
    $Time5 = 'Date.UTC ('.$T5.')';
    $Value5 = $row5["AVG($q2)"];
    $data5[] = "[$Time5,$Value5]";
}

while($row6 = mysqli_fetch_array($result6)) {
    $T6 =  date('Y, n-1,j', strtotime($row6['date']));  
    $Time6 = 'Date.UTC ('.$T6.')';
    $Value6 = $row6["AVG($q2)"];
    $data6[] = "[$Time6,$Value6]";
}

while($row7 = mysqli_fetch_array($result7)) {
    $T7 =  date('Y, n-1,j', strtotime($row7['date']));  
    $Time7 = 'Date.UTC ('.$T7.')';
    $Value7 = $row7["AVG($q2)"];
    $data7[] = "[$Time7,$Value7]";
}

while($row8 = mysqli_fetch_array($result8)) {
    $T8 =  date('Y, n-1,j', strtotime($row8['date']));  
    $Time8 = 'Date.UTC ('.$T8.')';
    $Value8 = $row8["AVG($q2)"];
    $data8[] = "[$Time8,$Value8]";
}

?>


$(function () {
    $('#container').bind('mousemove touchmove', function (e) {
        var chart, point, i;
        for (i = 0; i < Highcharts.charts.length; i = i + 1) {
            chart = Highcharts.charts[i];
            e = chart.pointer.normalize(e);
            point = chart.series[0].searchPoint(e, true);

            if (point) {
                point.onMouseOver();
                chart.tooltip.refresh(point);
                chart.xAxis[0].drawCrosshair(e, point);
            }
        }
    });
    
    $('#chart-A').appendTo('#container').highcharts({
                    chart: {
                    zoomType: 'x',
                    type: 'scatter',
                    spacingTop: 40,
                    width: 1200,
                    height: 200
                    },
                    
                    
                    rangeSelector: {
                inputEnabled: $('#container').width() > 480,
                selected: 1
            },

                    title:{
                    text: null,                    
                    },
                    
                    subtitle: {
                    text: document.ontouchstart === undefined ?
                        'Click and drag in the plot area to zoom in' : 'Pinch the chart to zoom in'
                    },

                    boost: {
        useGPUTranslations: true,
        usePreAllocated: true
    },
    
                    xAxis: {
                    type: 'datetime',
                    tickInterval: 30 * 24 * 3600 * 1000,
                    min: new Date('2003/12').getTime(),
	    	        max: new Date('2017/1').getTime(),
                    
                    labels: {
                    format: '{value:%b,%Y}'
                     },
                    
                    crosshair: true,
                    
                    title: {                   
                    enabled: true,
                    
                    text: 'Time (in month)',
                    align: 'middle',
                    margin: 10,
                    
                    startOnTick: true,
                    endOnTick: true,
                    showLastLabel: true
                    }
                    },
                    
                    yAxis: {
                    title: {
                    text: 'Mean Value '
                    }
                    },
                   plotOptions: {
                   scatter: {
                   marker: {
                   radius: 5,
                   lineWidth:1,
                   states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)',
                        lineWidth: 2
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            

            tooltip: {
                
                shared: true,
                borderWidth:10,
                style:{
                fontSize: '60px'},
                headerFormat: '<span style="color:{series.color}","font-size: 10px">Time: {point.key:%Y-%m}</span><br/>',               
                pointFormat: 'Value: {point.y}'
            }
        }
    }, 
                    
                                        credits: {
            enabled: false
            },          
                  legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 30,
        y: -40,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },       

                   
                    series: [
                        {
                            name: 'Age between 6 and 20',
                            color: 'rgba(223, 83, 83, .5)',
                            data: [<?php echo join($data1, ',') ?>]
                        }]
                      
                        
    });
 
 // Chart-B   
    $('#chart-B').appendTo('#container').highcharts({
                    chart: {
                    zoomType: 'x',
                    spacingTop: 40,
                    spacingBottom: 20,
                    type: 'scatter',
                    width: 1200,
                    height: 200
                    },
                    
                  rangeSelector: {
                inputEnabled: $('#container').width() > 480,
                selected: 1
            },

                    title:{
                    text: null
                    },
                    
                    subtitle: {
                    text: null
                    },
                    
                    boost: {
        useGPUTranslations: true,
        usePreAllocated: true
    },
    
                    xAxis: {
                    type: 'datetime',
                    tickInterval: 30 * 24 * 3600 * 1000,
                    min: new Date('2003/12').getTime(),
	    	        max: new Date('2017/1').getTime(),
                    
                    labels: {
                    format: '{value:%b,%Y}'
                     },

                    crosshair: true,
                    title: {
                    enabled: true,
                    text: 'Time (in month)',
                    align: 'middle',
                    margin: 10,

                    startOnTick: true,
                    endOnTick: true,
                    showLastLabel: true
                    }},
                    
                    yAxis: {
                    title: {
                    text: 'Mean Value '
                    }
                    },
                    plotOptions: {
                    scatter: {
            marker: {
                radius: 5,
                lineWidth:1,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)',
                        lineWidth: 2
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                shared: true,
                borderWidth:10,
                style:{
                fontSize: '60px'},
                headerFormat: '<span style="color:{series.color}","font-size: 10px">Time: {point.key:%Y-%m}</span><br/>',               
                pointFormat: 'Value: {point.y}'
            }
        }
    }, 
                    
                    
                    credits: {
            enabled: false
            },
            
            legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 30,
        y: -40,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },       
                   
                    series: [
                        {
                            name: 'Age between 20 and 25',
                            color: 'rgba(6, 123, 53, .6)',
                            data: [<?php echo join($data2, ',') ?>]
                        }
                        ]
    });
    
// Chart-C       
     $('#chart-C').appendTo('#container').highcharts({
                    chart: {
                    zoomType: 'x',
                    type: 'scatter',
                    spacingTop: 40,
                    spacingBottom: 20,
                    width: 1200,
                    height: 200
                    },
                    
                   rangeSelector: {
                inputEnabled: $('#container').width() > 480,
                selected: 1
                   },

                    title:{
                    text: null
                    },
                    
                     subtitle: {
                    text: null
                    },

boost: {
        useGPUTranslations: true,
        usePreAllocated: true
    },
    
                    xAxis: {
                    type: 'datetime',
                    tickInterval: 30 * 24 * 3600 * 1000,
                    min: new Date('2003/12').getTime(),
	    	        max: new Date('2017/1').getTime(),
                    
                    labels: {
                    format: '{value:%b,%Y}'
                     },

                    crosshair: true,
                    title: {
                    enabled: true,
                    text: 'Time (in month)',
                    align: 'middle',
                    margin: 10,
                    
                    startOnTick: true,
                    endOnTick: true,
                    showLastLabel: true
                    }},
                    
                    yAxis: {
                    title: {
                    text: 'Mean Value '
                    }
                    },
                    plotOptions: {
                    scatter: {
            marker: {
                radius: 5,
                lineWidth: 1,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)',
                        lineWidth: 2
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                shared: true,
                borderWidth:10,
                style:{
                fontSize: '60px'},
                headerFormat: '<span style="color:{series.color}","font-size: 10px">Time: {point.key:%Y-%m}</span><br/>',               
                pointFormat: 'Value: {point.y}'
            }
        }
    }, 
                    
                    
                    credits: {
            enabled: false
            },
            
            legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 30,
        y: -40,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },       

                    series: [
                        {
                            name: 'Age between 25 and 30',
                            color: 'rgba(0,100,45,0.5)',
                            data: [<?php echo join($data3, ',') ?>]
                        }
                    ]
    });
    
// Chart-D
$('#chart-D').appendTo('#container').highcharts({
                    chart: {
                    zoomType: 'x',
                    type: 'scatter',
                    width: 1200,
                    height: 200,
                    spacingTop: 40,
                    spacingBottom: 20
                    },
                    
                  rangeSelector: {
                inputEnabled: $('#container').width() > 480,
                selected: 1
                   },


                    title:{
                    text: null
                    },
                    
                     subtitle: {
                    text: null
                    },
                    
                    boost: {
        useGPUTranslations: true,
        usePreAllocated: true
    },
    
                    xAxis: {
                    type: 'datetime',
                    tickInterval: 30 * 24 * 3600 * 1000,
                    min: new Date('2003/12').getTime(),
	    	        max: new Date('2017/1').getTime(),
                    
                    labels: {
                    format: '{value:%b,%Y}'
                     },

                    crosshair: true,
                    title: {
                    enabled: true,
                    text: 'Time (in month)',
                    align: 'middle',
                    margin: 10,

                    startOnTick: true,
                    endOnTick: true,
                    showLastLabel: true
                    }},
                    
                    yAxis: {
                    title: {
                    text: 'Mean Value '
                    }
                    },
                    plotOptions: {
                    scatter: {
            marker: {
                radius: 5,
                lineWidth:1,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)',
                        lineWidth: 2
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                shared: true,
                borderWidth:10,
                style:{
                fontSize: '60px'},
                headerFormat: '<span style="color:{series.color}","font-size: 10px">Time: {point.key:%Y-%m}</span><br/>',               
                pointFormat: 'Value: {point.y}'

            }
        }
    }, 
                    
                    
                    credits: {
            enabled: false
            },
            
            legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 30,
        y: -40,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },       

                    series: [
                        {
                            name: 'Age between 30 and 35',
                            color: 'Orange',
                            data: [<?php echo join($data4, ',') ?>]
                        }
                    ]
    });
// Chart-E
$('#chart-E').appendTo('#container').highcharts({
                    chart: {
                    zoomType: 'x',
                    type: 'scatter',
                    spacingTop: 40,
                    spacingBottom: 20,
                    width: 1200,
                    height: 200
                    },
                    
                    rangeSelector: {
                inputEnabled: $('#container').width() > 480,
                selected: 1
            },

                    title:{
                    text: null
                    },
                    
                    subtitle: {
                    text: null
                    },
                    
                    boost: {
        useGPUTranslations: true,
        usePreAllocated: true
    },
    
                    xAxis: {
                    type: 'datetime',
                    tickInterval: 30 * 24 * 3600 * 1000,
                    min: new Date('2003/12').getTime(),
	    	        max: new Date('2017/1').getTime(),
                    
                    labels: {
                    format: '{value:%b,%Y}'
                     },

                    crosshair: true,
                    title: {
                    enabled: true,
                    text: 'Time (in month)',
                    align: 'middle',
                    margin: 10,

                    startOnTick: true,
                    endOnTick: true,
                    showLastLabel: true
                    }},
                    
                    yAxis: {
                    title: {
                    text: 'Mean Value '
                    }
                    },
                    plotOptions: {
                    scatter: {
            marker: {
                radius: 5,
                lineWidth:1,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)',
                        lineWidth: 2
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                shared: true,
                borderWidth:10,
                style:{
                fontSize: '60px'},
                headerFormat: '<span style="color:{series.color}","font-size: 10px">Time: {point.key:%Y-%m}</span><br/>',               
                pointFormat: 'Value: {point.y}'

            }
        }
    }, 
                    credits: {
            enabled: false
            },
            
            legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 30,
        y: -40,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },       

                    series: [
                        {
                            name: 'Age between 35 and 40',
                            color: '#24CBE5',
                            data: [<?php echo join($data5, ',') ?>]
                        }
                    ]
    });
// Chart-F
$('#chart-F').appendTo('#container').highcharts({
                    chart: {
                    zoomType: 'x',
                    type: 'scatter',
                    spacingTop: 40,
                    spacingBottom: 20,
                    width: 1200,
                    height: 200
                    },
                    
                    rangeSelector: {
                inputEnabled: $('#container').width() > 480,
                selected: 1
            },

                    title:{
                    text: null
                    },
                    
                    subtitle: {
                    text: null
                    },
                    
                    boost: {
        useGPUTranslations: true,
        usePreAllocated: true
    },
    
                    xAxis: {
                    type: 'datetime',
                    tickInterval: 30 * 24 * 3600 * 1000,
                    min: new Date('2003/12').getTime(),
	    	        max: new Date('2017/1').getTime(),
                    
                    labels: {
                    format: '{value:%b,%Y}'
                     },

                    crosshair: true,
                    title: {
                    enabled: true,
                    text: 'Time (in month)',
                    align: 'middle',
                    margin: 10,

                    startOnTick: true,
                    endOnTick: true,
                    showLastLabel: true
                    }},
                    
                    yAxis: {
                    title: {
                    text: 'Mean Value '
                    }
                    },
                    plotOptions: {
                    scatter: {
            marker: {
                radius: 5,
                lineWidth:1,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)',
                        lineWidth: 2
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                shared: true,
                borderWidth:10,
                style:{
                fontSize: '60px'},
                headerFormat: '<span style="color:{series.color}","font-size: 10px">Time: {point.key:%Y-%m}</span><br/>',               
                pointFormat: 'Value: {point.y}'

            }
        }
    }, 
                    credits: {
            enabled: false
            },
            
            legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 30,
        y: -40,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },       

                    series: [
                        {
                            name: 'Age between 40 and 50',
                            color: 'Pink',
                            data: [<?php echo join($data6, ',') ?>]
                        }
                    ]
    });
    
// Chart-G
$('#chart-G').appendTo('#container').highcharts({
                    chart: {
                    zoomType: 'x',
                    spacingTop: 40,
                    spacingBottom: 20,
                    type: 'scatter',
                    width: 1200,
                    height: 200
                    },
                    
                    rangeSelector: {
                inputEnabled: $('#container').width() > 480,
                selected: 1
            },

                    title:{
                    text: null
                    },
                    
                    subtitle: {
                    text: null
                    },
                    
                    boost: {
        useGPUTranslations: true,
        usePreAllocated: true
    },
    
                    xAxis: {
                    type: 'datetime',
                    tickInterval: 30 * 24 * 3600 * 1000,
                    min: new Date('2003/12').getTime(),
	    	        max: new Date('2017/1').getTime(),
	    	        
                    labels: {
                    format: '{value:%b,%Y}'
                     },

                    crosshair: true,
                    title: {
                    enabled: true,
                    text: 'Time (in month)',
                    align: 'middle',
                    margin: 10,
                    startOnTick: true,
                    endOnTick: true,
                    showLastLabel: true
                    }},
                    
                    yAxis: {
                    title: {
                    text: 'Mean Value '
                    }
                    },
                    plotOptions: {
                    scatter: {
            marker: {
                radius: 5,
                lineWidth:1,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)',
                        lineWidth: 2
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                shared: true,
                borderWidth:10,
                style:{
                fontSize: '60px'},
                headerFormat: '<span style="color:{series.color}","font-size: 10px">Time: {point.key:%Y-%m}</span><br/>',               
                pointFormat: 'Value: {point.y}'
            }
        }
    }, 
                    credits: {
            enabled: false
            },
            
                legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 30,
        y: -40,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },       

                    series: [
                        {
                            name: 'Age between 50 and 60',
                            color: 'Purple',
                            data: [<?php echo join($data7, ',') ?>]
                        }
                    ]
    });
// Chart-H
$('#chart-H').appendTo('#container').highcharts({
                    chart: {
                    zoomType: 'x',
                    type: 'scatter',
                    spacingTop: 40,
                    spacingBottom: 20,
                    width: 1200,
                    height: 200
                    },
                    
                    rangeSelector: {
                inputEnabled: $('#container').width() > 480,
                selected: 1
            },
                    
                    title:{
                    text: null
                    },
                    
                    subtitle: {
                    text: null
                    },
                    
                    boost: {
        useGPUTranslations: true,
        usePreAllocated: true
    },
    
                    xAxis: {
                    type: 'datetime',
                    tickInterval: 30 * 24 * 3600 * 1000,
                    min: new Date('2003/12').getTime(),
	    	        max: new Date('2017/1').getTime(),
                    labels: {
                    format: '{value:%b,%Y}'
                     },

                    crosshair: true,
                    title: {
                    enabled: true,
                    text: 'Time (in month)',
                    align: 'middle',
                    margin: 10,
                    
                    startOnTick: true,
                    endOnTick: true,
                    showLastLabel: true
                    }},
                    
                    yAxis: {
                    title: {
                    text: 'Mean Value '
                    }
                    },
                    plotOptions: {
                    scatter: {
            marker: {
                radius: 5,
                lineWidth:1,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)',
                        lineWidth: 2
                    }
                }
            },
            states: {
                hover: {
                    marker: {
                        enabled: false
                    }
                }
            },
            tooltip: {
                shared: true,
                borderWidth:10,
                style:{
                fontSize: '60px'},
                headerFormat: '<span style="color:{series.color}","font-size: 10px">Time: {point.key:%Y-%m}</span><br/>',               
                pointFormat: 'Value: {point.y}'
            }
        }
    }, 
                    credits: {
            enabled: false
            },
            
                legend: {
        layout: 'vertical',
        align: 'left',
        verticalAlign: 'top',
        x: 30,
        y: -40,
        floating: true,
        backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF',
        borderWidth: 1
    },       
                   
                    series: [
                        {
                            name: 'Age between 60 and 99',
                            color: 'rgba(105,95,105,0.5)',
                            data: [<?php echo join($data8, ',') ?>]
                        }
                    ]
    });
});

</script>
</head>
<body>
  <script src="http://code.highcharts.com/highcharts.js"></script>
  <script src="https://code.highcharts.com/modules/boost.js"></script>
<div id="container" style="height: 400px; width: 500px"></div>
</body>
</html>

