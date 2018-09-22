
<?php

ini_set('memory_limit', '1024M');

$q1 = $_POST['Social_Group'];
$q2 = $_POST['Attitude'];
$q3 = 'Gender';


$con = mysqli_connect('localhost','root','','Demo_DB');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
mysqli_select_db($con,"Demo_DB");


$sql="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 = 'female' GROUP BY MONTH(date),YEAR(date)";
$result = mysqli_query($con,$sql);
if (!$result) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

while($row = mysqli_fetch_array($result)) {
    $T =  date('Y, n-1,j', strtotime($row['date']));  
    $Time = 'Date.UTC ('.$T.')';
    $Value = $row["AVG($q2)"];
    $data[] = "[$Time,$Value]";   
}

$sql2="SELECT DATE_FORMAT(date,'%Y-%m') AS date, AVG($q2) FROM $q1 WHERE $q3 = 'male' GROUP BY MONTH(date), YEAR(date)";
$result2 = mysqli_query($con,$sql2);
if (!$result2) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}

while($row2 = mysqli_fetch_array($result2)) {
    $T2 =  date('Y, n-1, j', strtotime($row2['date'])); 
    $Time2 = 'Date.UTC ('.$T2.')';
    $Value2 = $row2["AVG($q2)"];
    $data2[] = "[$Time2,$Value2]";
}

mysqli_close($con);
?>

</html>

<!DOCTYPE html>
<html>
<head>
  <div id="chart-A" class="chart"></div> <!-- Container for Chart A -->

<div id="chart-B" class="chart"></div> <!-- Container for Chart B -->
  <script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>
  <script src="https://code.highcharts.com/modules/boost.js"></script>
  <script type='text/javascript'>

<?php
while($row = mysqli_fetch_array($result)) {
    $T =  date('Y, n-1,j', strtotime($row['date']));  
    $Time = 'Date.UTC ('.$T.')';
    $Value = $row["AVG($q2)"];
    $data[] = "[$Time,$Value]";
}

while($row2 = mysqli_fetch_array($result2)) {
    $T2 =  date('Y, n-1, j', strtotime($row2['date'])); 
    $Time2 = 'Date.UTC ('.$T2.')';
    $Value2 = $row2["AVG($q2)"];
    $data2[] = "[$Time2,$Value2]";
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
    
    console.time('scatter');
    $('#chart-A').appendTo('#container').highcharts({
                    chart: {
                    zoomType: 'x',
                    
                    spacingTop:40,
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
                pointFormat: 'Mean Value: {point.y}'
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
                        {   type: 'scatter',
                            name: 'Female',
                            color: 'rgba(223, 83, 83, .5)',
                            data:   [<?php echo join($data, ',') ?>]
                            
                        }
                    ]
                    
    });   
    
    $('#chart-B').appendTo('#container').highcharts({
                    chart: {
                    
                    zoomType: 'x', 
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
                    
                    startOnTick: true,
                    endOnTick: true,
                    showLastLabel: true
                    }},
                    
                    yAxis: {
                    title: {
                    text: 'Mean Value'
                    }
                    },
                    plotOptions: {
                    scatter: {
            marker: {
                radius: 5,
                states: {
                    hover: {
                        enabled: true,
                        lineColor: 'rgb(100,100,100)'
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
                shadow: false,
                style:{
                fontSize: '60px'},
                headerFormat: '<span style="color:{series.color}","font-size: 10px">Time: {point.key:%Y-%m}</span><br/>',               
                pointFormat: 'Mean Value: {point.y}'
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
                        {   type: 'scatter',
                            name: 'Male',
                            color: 'rgba(0,100,225,0.5)',
                            data: [<?php echo join($data2, ',') ?>]
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

