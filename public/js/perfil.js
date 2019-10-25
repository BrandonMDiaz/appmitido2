var marksCanvas = document.getElementById("myChart");
let totCat = document.getElementById("total").innerHTML;
let cat = [];
let promedio = JSON.parse(document.getElementById("dataX").innerHTML);
promedio = promedio.promedioCat
for (let y = 0; y < totCat; y++) {
  let catNombre = document.getElementById(`cat${y}`).innerHTML
  cat.push(catNombre);
  // const obj = JSON.parse(document.getElementById(`data${y}`).innerHTML);
  // for (var z = 0; z < obj.length; z++) {
  //   promedios = obj[z].promedioCat[z];
  // }
}
var marksData = {
  labels: cat,
  datasets: [{
    label: "Average",
    backgroundColor: "rgba(0,0,400,0.2)",
    data: promedio,
  },]
};

var radarChart = new Chart(marksCanvas, {
  type: 'radar',
  data: marksData
});

var tot = document.getElementById("total").innerHTML;
for (var i = 0; i < tot; i++) {
  //objeto de examenes
  const examenes = JSON.parse(document.getElementById(`data${i}`).innerHTML);
  let oneChart = document.getElementById(`chart${i}`);
  let data = [];
  let labels = [];
  
  labels.push(0);
  data.push(0);
  for (let x = 0; x < examenes.length; x++) {
    data.push(examenes[x].calificacion);
    labels.push(x + 1);
  }

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
