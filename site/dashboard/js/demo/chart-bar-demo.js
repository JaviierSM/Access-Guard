// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + "").replace(",", "").replace(" ", "");
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = typeof thousands_sep === "undefined" ? "," : thousands_sep,
    dec = typeof dec_point === "undefined" ? "." : dec_point,
    s = "",
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return "" + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : "" + Math.round(n)).split(".");
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || "").length < prec) {
    s[1] = s[1] || "";
    s[1] += new Array(prec - s[1].length + 1).join("0");
  }
  return s.join(dec);
}

// Creamos un array para almacenar las fechas
var fechasUltimos6Dias = [];
var ingresosUltimos6Dias = [];

// Obtenemos la fecha actual
var fechaActual = new Date();

// Iteramos 6 veces para obtener las fechas de los últimos 6 días
for (var i = 0; i < 6; i++) {
  // Creamos una nueva fecha restando i días a la fecha actual
  var fecha = new Date(fechaActual);
  fecha.setDate(fecha.getDate() - i);

  // Obtenemos los componentes de la fecha
  var dia = fecha.getDate().toString().padStart(2, "0");
  var mes = (fecha.getMonth() + 1).toString().padStart(2, "0");
  var fechaFormateada = dia + "/" + mes;
  // Añadimos la fecha formateada al array
  fechasUltimos6Dias.push(fechaFormateada);

  ingresosUltimos6Dias.push(
    parseInt(document.getElementById("todayMinus" + i).textContent, 10)
  );
}

// Invertimos el orden del array para tener las fechas en orden descendente
fechasUltimos6Dias.reverse();
ingresosUltimos6Dias.reverse();

const maxValue = Math.max(...ingresosUltimos6Dias);
const minValue = Math.min(...ingresosUltimos6Dias);

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myBarChart = new Chart(ctx, {
  type: "bar",
  data: {
    labels: fechasUltimos6Dias,
    datasets: [
      {
        label: "Ingresos",
        backgroundColor: "#4e73df",
        hoverBackgroundColor: "#2e59d9",
        borderColor: "#4e73df",
        data: ingresosUltimos6Dias,
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    layout: {
      padding: {
        left: 10,
        right: 25,
        top: 25,
        bottom: 0,
      },
    },
    scales: {
      xAxes: [
        {
          time: {
            unit: "month",
          },
          gridLines: {
            display: false,
            drawBorder: false,
          },
          ticks: {
            maxTicksLimit: 6,
          },
          maxBarThickness: 25,
        },
      ],
      yAxes: [
        {
          ticks: {
            min: 0,
            max: maxValue,
            maxTicksLimit: Math.min(maxValue + 1, 5), // Establecer maxTicksLimit al valor máximo + 1, pero no mayor a 5
            padding: 10,
            callback: function (value, index, values) {
              return "" + number_format(value);
            },
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2],
          },
        },
      ],
    },
    legend: {
      display: false,
    },
    tooltips: {
      titleMarginBottom: 10,
      titleFontColor: "#6e707e",
      titleFontSize: 14,
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: "#dddfeb",
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
      callbacks: {
        label: function (tooltipItem, chart) {
          var datasetLabel =
            chart.datasets[tooltipItem.datasetIndex].label || "";
          return datasetLabel + ": " + number_format(tooltipItem.yLabel);
        },
      },
    },
  },
});
