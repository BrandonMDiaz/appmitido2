
var tot = document.getElementById("total").innerHTML;
for (var i = 0; i < tot; i++) {
  const obj = JSON.parse(document.getElementById(`data${i}`).innerHTML);
  let oneChart = document.getElementById(`chart${i}`);
  let data = [];
  let labels = [];

  labels.push(0);
  data.push(0);
  for (let x = 0; x < obj.length; x++) {
    data.push(obj[x].calificacion);
    labels.push(x + 1);
  }
  console.log(data);
  var myLineChart = new Chart(oneChart, {
    type: 'line',
    data: {
      labels: labels,
      datasets: [{
        label: 'Resultados',
        backgroundColor: "rgba(200,0,0,0.2)",
        data: data,
      }]
    },
    options: {
      responsive: true,
      title: {
        display: true,
        text: 'Mejora'
      },
      tooltips: {
        mode: 'index',
        intersect: false,
      },
      hover: {
        mode: 'nearest',
        intersect: true
      },
      scales: {
        xAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'Examenes'
          }
        }],
        yAxes: [{
          display: true,
          scaleLabel: {
            display: true,
            labelString: 'respuestas'
          }
        }]
      }
    }
  });
}
