window.onload = function () {

                var dataPoints1 = [];
                var dataPoints2 = [];

                var chart = new CanvasJS.Chart("chartContainer", {
                    zoomEnabled: true,
                    title: {
                        text: ""
                    },
                    axisX: {
                        title: ""
                    },
                    axisY:{
                        suffix: "%",
                        maximum: 100,
                        includeZero: true
                    }, 
                    toolTip: {
                        shared: true
                    },
                    legend: {
                        cursor:"pointer",
                        verticalAlign: "top",
                        fontSize: 22,
                        fontColor: "dimGrey",
                        itemclick : toggleDataSeries
                    },
                    data: [{ 
                        type: "line",
                        xValueType: "dateTime",
                        yValueFormatString: "##,##%",
                        xValueFormatString: "hh:mm:ss TT",
                        showInLegend: true,
                        name: "CPU Data",
                        dataPoints: dataPoints1
                    },
                           {				
                               type: "line",
                               xValueType: "dateTime",
                               yValueFormatString: "##,##%",
                               showInLegend: true,
                               name: "Mem Data" ,
                               dataPoints: dataPoints2
                           }]
                });

                function toggleDataSeries(e) {
                    if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    }
                    else {
                        e.dataSeries.visible = true;
                    }
                    chart.render();
                }

                // Time Interval
                
                var updateInterval = 3000;
                
                // initial value
                var yValue1 = 60; 
                var yValue2 = 60;

                var time = new Date;
                // starting at 9.30 am
                time.setHours(time.getHours());
                time.setMinutes(time.getMinutes() - 5);
                time.setSeconds(time.getSeconds());
                time.setMilliseconds(time.getMilliseconds());
                
                
                var CPUValue = 0;
		var MemValue= 0;

                function updateChart(count) {
                                        
                    count = count || 1;
                    var deltaY1, deltaY2;
                    for (var i = 0; i < count; i++) {
                        time.setTime(time.getTime() + updateInterval);
                        deltaY1 = .5 + Math.random() *(-.5-.5);
                        deltaY2 = .5 + Math.random() *(-.5-.5);

                        // Method Ajax GET CPU
                        $.post( "../includes/charts/cpuload.php", function( data ) {
                            CPUValue = data;
                        });
                        // Method Ajax Get MEM
                        $.post( "../includes/charts/memload.php", function( data ) {
                          MemValue = data;
                        });
                        
                        // adding random value and rounding it to two digits. 
                        yValue1 = CPUValue / 100;
                        yValue2 = MemValue / 100;
                        
                        // pushing the new values
                        dataPoints1.push({
                            x: time.getTime(),
                            y: yValue1 * 100
                        });
                        dataPoints2.push({
                            x: time.getTime(),
                            y: yValue2 * 100
                        });
                    }

                    // updating legend text with  updated with y Value 
                    chart.options.data[0].legendText = " CPU Data";
                    chart.options.data[1].legendText = " Mem Data"; 
                    chart.render();
                }
                // generates first set of dataPoints 
                updateChart(100);	
                setInterval(function(){updateChart()}, updateInterval);

            }