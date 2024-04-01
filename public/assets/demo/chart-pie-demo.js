// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

function updatePieChart(id, labels, dataset) {
  var ctx = document.getElementById(id);
  var myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: labels,
      datasets: [{
        data: dataset.data,
        backgroundColor: dataset.colors,
      }],
    },
  });
}

// Pie Chart Example
function fillPieChart(id) {
  labels = ["Blue", "Red", "Yellow", "Green"];
  dataset = {
    data: [12.21, 15.58, 11.25, 8.32],
    colors: ['#007bff', '#dc3545', '#ffc107', '#28a745']
  };

  updatePieChart(id, labels, dataset);
}