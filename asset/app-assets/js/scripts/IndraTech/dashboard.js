
$(document).ready(function () {

  var base_url = $("#base").val();
    var $primary = '#a357d7',
      $success = '#28C76F',
      $danger = '#EA5455',
      $warning = '#FF9F43',
      $info = '#00cfe8',
      $label_color_light = '#dae1e7';
      var $label_color = '#e7e7e7';
      var $danger_light = '#f29292';
      var $strok_color = '#b9c3cd';
  
    var themeColors = [$primary, $success, $danger, $warning, $info];
  
    // RTL Support
    var yaxis_opposite = false;
    if($('html').data('textdirection') == 'rtl'){
      yaxis_opposite = true;
    }

    $.ajax({
      url: base_url + "/api/adminapi/chart_user",
      type: "GET",
      success: function (data) {
        var firstday = data.firstday;
        var secondday = data.secondday;
        var thirdday = data.thirdday;
        var forthday = data.forthday;
        var fifthday = data.fifthday;
        var sixthday = data.sixthday;
        var seventhday = data.seventhday;
        var usersChartoptions = {
          chart: {
            height: 100,
            type: "area",
            toolbar: {
              show: false,
            },
            sparkline: {
              enabled: true,
            },
            grid: {
              show: false,
              padding: {
                left: 0,
                right: 0,
              },
            },
          },
          colors: [$primary],
          dataLabels: {
            enabled: false,
          },
          stroke: {
            curve: "smooth",
            width: 2.5,
          },
          fill: {
            type: "gradient",
            gradient: {
              shadeIntensity: 0.9,
              opacityFrom: 0.7,
              opacityTo: 0.5,
              stops: [0, 80, 100],
            },
          },
          series: [
            {
              name: "Users",
              data: [
                firstday,
                secondday,
                thirdday,
                forthday,
                fifthday,
                sixthday,
                seventhday,
              ],
            },
          ],
  
          xaxis: {
            labels: {
              show: false,
            },
            axisBorder: {
              show: false,
            },
          },
          yaxis: [
            {
              y: 0,
              offsetX: 0,
              offsetY: 0,
              padding: { left: 0, right: 0 },
              
              
            },
          ],
          tooltip: {
            x: { show: false },
          },
        };
  
        var usersChart = new ApexCharts(
          document.querySelector("#chart1"),
          usersChartoptions
        );
  
        usersChart.render();
  
        //Chart1 ends //
      },
    });

    $.ajax({
      url: base_url + "/api/adminapi/chart_match",
      type: "GET",
      success: function (data) {
        var firstday = data.firstday;
        var secondday = data.secondday;
        var thirdday = data.thirdday;
        var forthday = data.forthday;
        var fifthday = data.fifthday;
        var sixthday = data.sixthday;
        var seventhday = data.seventhday;
        var matchChartoptions = {
          chart: {
            height: 100,
            type: "area",
            toolbar: {
              show: false,
            },
            sparkline: {
              enabled: true,
            },
            grid: {
              show: false,
              padding: {
                left: 0,
                right: 0,
              },
            },
          },
          colors: [$warning],
          dataLabels: {
            enabled: false,
          },
          stroke: {
            curve: "smooth",
            width: 2.5,
          },
          fill: {
            type: "gradient",
            gradient: {
              shadeIntensity: 0.9,
              opacityFrom: 0.7,
              opacityTo: 0.5,
              stops: [0, 80, 100],
            },
          },
          series: [
            {
              name: "Matches",
              data: [
                firstday,
                secondday,
                thirdday,
                forthday,
                fifthday,
                sixthday,
                seventhday,
              ],
            },
          ],
  
          xaxis: {
            labels: {
              show: false,
            },
            axisBorder: {
              show: false,
            },
          },
          yaxis: [
            {
              y: 0,
              offsetX: 0,
              offsetY: 0,
              padding: { left: 0, right: 0 },
              
              
            },
          ],
          tooltip: {
            x: { show: false },
          },
        };
  
        var matchChart = new ApexCharts(
          document.querySelector("#chart2"),
          matchChartoptions
        );
  
        matchChart.render();
  
        //Chart1 ends //
      },
    });

    $.ajax({
      url: base_url + "/api/adminapi/chart_vip",
      type: "GET",
      success: function (data) {
        var firstday = data.firstday;
        var secondday = data.secondday;
        var thirdday = data.thirdday;
        var forthday = data.forthday;
        var fifthday = data.fifthday;
        var sixthday = data.sixthday;
        var seventhday = data.seventhday;
        var vipChartoptions = {
          chart: {
            height: 100,
            type: "area",
            toolbar: {
              show: false,
            },
            sparkline: {
              enabled: true,
            },
            grid: {
              show: false,
              padding: {
                left: 0,
                right: 0,
              },
            },
          },
          colors: [$success],
          dataLabels: {
            enabled: false,
          },
          stroke: {
            curve: "smooth",
            width: 2.5,
          },
          fill: {
            type: "gradient",
            gradient: {
              shadeIntensity: 0.9,
              opacityFrom: 0.7,
              opacityTo: 0.5,
              stops: [0, 80, 100],
            },
          },
          series: [
            {
              name: "vip",
              data: [
                firstday,
                secondday,
                thirdday,
                forthday,
                fifthday,
                sixthday,
                seventhday,
              ],
            },
          ],
  
          xaxis: {
            labels: {
              show: false,
            },
            axisBorder: {
              show: false,
            },
          },
          yaxis: [
            {
              y: 0,
              offsetX: 0,
              offsetY: 0,
              padding: { left: 0, right: 0 },
              
              
            },
          ],
          tooltip: {
            x: { show: false },
          },
        };
  
        var vipChart = new ApexCharts(
          document.querySelector("#chart3"),
          vipChartoptions
        );
  
        vipChart.render();
  
        //Chart1 ends //
      },
    });

    // revenue-chart Chart


  

  $.ajax({
    url: base_url + "/api/adminapi/chart_subs",
    type: "GET",
    success: function (data) {
      
      var revenueChartoptions = {
        chart: {
          height: 270,
          toolbar: { show: false },
          type: 'line',
        },
        stroke: {
          curve: 'smooth',
          dashArray: [0, 8],
          width: [4, 2],
        },
        grid: {
          borderColor: $label_color,
        },
        legend: {
          show: false,
        },
        colors: [$danger_light, $strok_color],
    
        fill: {
          type: 'gradient',
          gradient: {
            shade: 'dark',
            inverseColors: false,
            gradientToColors: [$primary, $strok_color],
            shadeIntensity: 1,
            type: 'horizontal',
            opacityFrom: 1,
            opacityTo: 1,
            stops: [0, 100, 100, 100]
          },
        },
        markers: {
          size: 0,
          hover: {
            size: 5
          }
        },
        xaxis: {
          labels: {
            style: {
              colors: $strok_color,
            }
          },
          axisTicks: {
            show: false,
          },
          categories: [
            "jan",
                "feb",
                "mar",
                "apr",
                "may",
                "jun",
                "jul",
                "aug",
                "sep",
                "oct",
                "nov",
                "des",
          ],
          axisBorder: {
            show: false,
          },
          tickPlacement: 'on',
        },
        yaxis: {
          tickAmount: 5,
          labels: {
            style: {
              color: $strok_color,
            },
            formatter: function (val) {
              return val > 999 ? (val / 1000).toFixed(1) + 'k' : val;
            }
          }
        },
        tooltip: {
          x: { show: false }
        },
        series: [{
          name: "Stripe",
          data: [
            data.jan1,
            data.feb1,
            data.mar1,
            data.apr1,
            data.mei1,
            data.jun1,
            data.jul1,
            data.aug1,
            data.sep1,
            data.okt1,
            data.nov1,
            data.des1,]
        },
        {
          name: "PayPal",
          data: [
            data.jan2,
							data.feb2,
							data.mar2,
							data.apr2,
							data.mei2,
							data.jun2,
							data.jul2,
							data.aug2,
							data.sep2,
							data.okt2,
							data.nov2,
							data.des2,
          ]
        }
        ],
    
      }
    
      var revenueChart = new ApexCharts(
        document.querySelector("#revenue-chart"),
        revenueChartoptions
      );
    
      revenueChart.render();
      

      
    },
  });

  $.ajax({
		url: base_url + "/api/adminapi/chart_progress",
		type: "GET",
		success: function (data) {
			var goalChartoptions = {
				chart: {
					height: 250,
					type: "radialBar",
					sparkline: {
						enabled: true,
					},
					dropShadow: {
						enabled: true,
						blur: 3,
						left: 1,
						top: 1,
						opacity: 0.1,
					},
				},
				colors: [$success],
				plotOptions: {
					radialBar: {
						size: 110,
						startAngle: -150,
						endAngle: 150,
						hollow: {
							size: "60%",
						},
						track: {
							background: $strok_color,
							strokeWidth: "20%",
						},
						dataLabels: {
							name: {
								show: false,
							},
							value: {
								offsetY: 18,
								color: "#99a2ac",
								fontSize: "4rem",
							},
						},
					},
				},
				fill: {
					type: "gradient",
					gradient: {
						shade: "dark",
						type: "horizontal",
						shadeIntensity: 0.5,
						gradientToColors: ["#00b5b5"],
						inverseColors: true,
						opacityFrom: 1,
						opacityTo: 1,
						stops: [0, 100],
					},
				},
				series: [data.progress],
				stroke: {
					lineCap: "round",
				},
			};

			var goalChart = new ApexCharts(
				document.querySelector("#goal-overview-chart"),
				goalChartoptions
			);

			goalChart.render();
		},
	});

});