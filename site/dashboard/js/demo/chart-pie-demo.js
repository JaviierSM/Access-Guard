// Set new default font family and font color to mimic Bootstrap's default styling
(Chart.defaults.global.defaultFontFamily = "Nunito"),
  '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#858796";

// Pie Chart Example
var ctx = document.getElementById("myPieChart");
var exito = parseInt(
  document.getElementById("ingresosExitosos").textContent,
  10
);
var fallido = parseInt(
  document.getElementById("ingresosFallidos").textContent,
  10
);
var app = parseInt(document.getElementById("ingresosApp").textContent, 10);
var myPieChart = new Chart(ctx, {
  type: "doughnut",
  data: {
    labels: ["Exitoso", "Fallido", "App Móvil"],
    datasets: [
      {
        data: [exito, fallido, app],
        backgroundColor: ["#1cc88a", "#e74a3b", "#4e73df"],
        hoverBackgroundColor: ["#17a673", "#c62828", "#2e59d9"],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      },
    ],
  },
  options: {
    maintainAspectRatio: false,
    tooltips: {
      backgroundColor: "rgb(255,255,255)",
      bodyFontColor: "#858796",
      borderColor: "#dddfeb",
      borderWidth: 1,
      xPadding: 15,
      yPadding: 15,
      displayColors: false,
      caretPadding: 10,
    },
    legend: {
      display: false,
    },
    cutoutPercentage: 80,
  },
});
