const radarCanvas = document.getElementById("radarCanvas");

/*const radarChart = new Chart(radarCanvas, {
    type: "bar",
    data: {
        labels: ["Beijing","Tokyo", "Seoul", "Hong Kong"],
        datasets: [{
            data: [240,120,140,130],
            backgroundColor: [
                "crimson",
                "lightgreen",
                "lightblue",
                "violet"
            ]
        }],
    },
})
*/

const radarChart = new Chart(radarCanvas,{
    type: "radar",
    data: {
        labels: [
            "Fragilisation de la reconnaissance",
            "Désengagement relationnel",
            "Surveillance",
            "Perte d'autonomie",
            "Sentiment de dépossession",
            "Déresponsabilisation"
        ],
        datasets: [{
            label: 'Diagnostic 1',
            data: [1,4,2,3,2,1],
            fill: true,
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            pointBackgroundColor: 'rgb(255, 99, 132)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(255, 99, 132)',
            }, {
            label: 'Diagnostic 2',
            data: [3,2,2,4,2,3],
            fill: true,
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgb(54, 162, 235)',
            pointBackgroundColor: 'rgb(54, 162, 235)',
            pointBorderColor: '#fff',
            pointHoverBackgroundColor: '#fff',
            pointHoverBorderColor: 'rgb(54, 162, 235)'
        }],
    },
    options: {
        scales: {
            r: {
                min: 0,
                max: 4,
                ticks: {
                    stepSize : 1,
                    font: {
                        size:10
                    }
                },
                pointLabels: {
                    font: {
                        size: 15
                    }
                }
            }
        }
    }
})

