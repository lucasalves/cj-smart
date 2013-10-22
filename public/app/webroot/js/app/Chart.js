var Charts = {
                lines: function(selector, options){
                        return new Highcharts.Chart({
                                              credits: {
                                              enabled: false
                                            },
                                    chart: {                        
                                                renderTo: selector,                             
                                        type: 'spline'
                                    },
                                    title: {
                                            text: ''
                                        },
                                        xAxis: {                    
                                          lineColor: 'transparent',
                                          tickLength: 0,
                                          categories: [],
                                        },
                                        yAxis: {
                                          title: {
                                            text: ''
                                          },
                                          gridLineWidth: 0,
                                          lineWidth: 0,
                                          minorGridLineWidth: 0,
                                          lineColor: 'transparent',
                                        },
                                        legend: {
                                            align: 'right',
                                            x: -100,
                                            verticalAlign: 'top',
                                            y: 20,
                                            floating: true,
                                            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColorSolid) || 'white',
                                            borderColor: '#CCC',
                                            borderWidth: 1,
                                            shadow: false
                                        },
                                        tooltip: options.tooltip || false,
                                        plotOptions: {
                                            column: {
                                                borderWidth: 0,
                                                stacking: 'normal',
                                                dataLabels: {
                                                    enabled: false,
                                                    color: null
                                                },
                                                shadow: false
                                            }
                                        },
                                        legend:{
                                            enabled: false
                                        },
                                    series: options.series || []
                                });
                        },
                        custom: function(selector, options){
                                return new Highcharts.Chart({
                                    credits: {
                                      enabled: false
                                    },
                            		chart: {                      
                                        renderTo: selector,
                                        backgroundColor: options.backgroundColor || '#FFFFFF'
                            		},
                                	title: {
                              			text: ''
                                	},
                                	xAxis: { 
                                		categories: options.categories || []
                                	},
                                	yAxis: {
					                	title: {
					                    	text: options.yAxis || ''
					                	},
					                	plotLines: [{
					                    	value: 0,
					                    	width: 1,
					                    	color: '#808080'
					                	}]
					            	},
                                	tooltip: options.tooltip || false,
                               
                                	legend: {
							            itemDistance: 20
							        },
                            		exporting:{
                              			enabled: true
                            		},
                            		series: options.series || []
                                });
                        },
                        column: function(selector, options){
                            return new Highcharts.Chart({
                                    credits: {
                                      enabled: false
                                    },
                                    chart: {
                                        type: 'column',
                                        renderTo: selector,
                                        backgroundColor: options.backgroundColor || '#FFFFFF'
                                    },
                                    title: {
                                        text: ''
                                    },
                                    xAxis: { 
                                        categories: options.categories || []
                                    },
                                    yAxis: {
                                        title: {
                                            text: options.yAxis || ''
                                        },
                                        plotLines: [{
                                            value: 0,
                                            width: 1,
                                            color: '#808080'
                                        }]
                                    },
                                    tooltip: options.tooltip || false,
                               
                                    legend: {
                                        itemDistance: 20
                                    },
                                    exporting:{
                                        enabled: true
                                    },
                                    plotOptions: {
                                        column: {
                                            pointPadding: 0.2,
                                            borderWidth: 0
                                        }
                                    },                                    
                                    series: options.series || []
                                });
                        }


};