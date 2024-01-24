
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
        var iduser = $("#iduser").val();
    
      var themeColors = [$primary, $success, $danger, $warning, $info];
    
      // RTL Support
      var yaxis_opposite = false;
      if($('html').data('textdirection') == 'rtl'){
        yaxis_opposite = true;
      }
  
    $.ajax({
          url: base_url + "/api/adminapi/chart_usermatchmeter/" + iduser,
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