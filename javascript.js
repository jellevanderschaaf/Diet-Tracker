var table = document.getElementById("mainTable");

var totalFat = 0;
var totalCarbs = 0;
var totalProtein = 0;
var totalCosts = 0;
var totalKcals = 0;


for (var i = 1; i < table.rows.length; i++) {
    totalFat = totalFat + parseInt(table.rows[i].cells[1].innerHTML);
    totalCarbs = totalCarbs + parseInt(table.rows[i].cells[2].innerHTML);
    totalProtein = totalProtein + parseInt(table.rows[i].cells[3].innerHTML);
    totalCosts = totalCosts + parseInt(table.rows[i].cells[4].innerHTML);
    totalKcals = totalKcals + parseInt(table.rows[i].cells[5].innerHTML);
}



// Create food items

function createFoodItem() {

    document.getElementById("modalOne").classList.remove('hidden');
}



function cancel() {
    document.getElementById('foodForm').reset();
    document.getElementById("modalOne").classList.add('hidden');
}

function cancel2() {
    document.getElementById("modalTwo").classList.add('hidden');
}

function cancel3() {
    document.getElementById("modalThree").classList.add('hidden');
}







// Chart one

let chart = document.getElementById('chart').getContext('2d');

let barChart = new Chart(chart, {
    type: 'bar',
    data: {
        labels: ['Fat', 'Carbs', 'Protein'],
        datasets: [{
            label: 'Grams',
            data: [
                120,
                36,
                140,
            ],
            backgroundColor: ['rgba(250, 147, 28, 0.8)', 'rgba(236, 59, 66, 0.8)', 'rgba(161, 223, 245, 0.8)']
        }],
    },
    options: {
        title: {
            display: false,
            text: 'Macros',
            fontSize: 15,
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                display: false,
                ticks: {
                    beginAtZero: true,
                    display: false,
                },
                gridLines: {
                    display: false
                }
            }],
            xAxes: [{
                gridLines: {
                    display: false
                }
            }]
        }
    }
});

function updateChart() {
    barChart.data.datasets[0].data = [totalFatsSum, totalCarbsSum, totalProteinSum];
    barChart.update();
};

// Chart two

let chartTwo = document.getElementById('chartTwo').getContext('2d');

let lineChart = new Chart(chartTwo, {
    type: 'line',
    data: {
        labels: ['02-07', '03-07', '04-07', '05-07', '06-07', '07-07', '08-07'],
        datasets: [{
            label: ['Kg'],
            data: [
                63.7,
                63.3,
                63.1,
                63.5,
                63.2,
                62.9,
                63.2,
            ],
            backgroundColor: ['rgba(161, 223, 245, 0.3)'],
            borderColor: ['rgba(92, 97, 101, 0.3)'],
            pointBorderColor: 'rgba(92, 97, 101, 0.7)',
            pointBackgroundColor: 'rgba(92, 97, 101, 0.7)',

        }],
    },
    options: {
        title: {
            display: false,
            text: 'Weight',
            fontSize: 15,
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                display: false,
                ticks: {
                    beginAtZero: false,
                    display: false,
                },
                gridLines: {
                    display: false
                }
            }],
            xAxes: [{
                gridLines: {
                    display: false
                }
            }]
        }
    }
});

// Chart Three


let chartThree = document.getElementById('chartThree').getContext('2d');

let barChartTwo = new Chart(chartThree, {
    type: 'bar',
    data: {
        labels: ['02-07', '03-07', '04-07', '05-07', '06-07', '07-07', '08-07'],
        datasets: [{
            label: ['€'],
            data: [
                10.68,
                12.95,
                10.24,
                8.88,
                9.95,
                11.12,
                12.20,
            ],



        }],
    },
    options: {
        title: {
            display: false,
            text: 'Costs',
            fontSize: 15,
        },
        legend: {
            display: false
        },
        scales: {
            yAxes: [{
                display: false,
                ticks: {
                    beginAtZero: false,
                    display: false,
                },
                gridLines: {
                    display: false
                }
            }],
            xAxes: [{
                gridLines: {
                    display: false
                }
            }]
        }
    }
});


// Chart header functions


$('#tableKcalsGraph').click(function() {
    $('#tableKcalsGraph').css({
        'border-bottom': '4px solid lightgrey',
    });

    $('#tableWeightGraph').css({
        'border-bottom': '0px',
    });

    $('#tableCostsGraph').css({
        'border-bottom': '0px',
    });

    $('#chartTwo').addClass("hidden");
    $('#chartThree').addClass("hidden");

});

$('#tableWeightGraph').click(function() {
    $('#tableKcalsGraph').css({
        'border-bottom': '0px',
    });

    $('#tableWeightGraph').css({
        'border-bottom': '4px solid lightgrey',
    });

    $('#tableCostsGraph').css({
        'border-bottom': '0px',
    });

    $('#chartTwo').removeClass("hidden");
    $('#chartThree').addClass("hidden");

});


$('#tableCostsGraph').click(function() {
    $('#tableKcalsGraph').css({
        'border-bottom': '0px',
    });

    $('#tableWeightGraph').css({
        'border-bottom': '0px',
    });

    $('#tableCostsGraph').css({
        'border-bottom': '4px solid lightgrey',
    });

    $('#chartTwo').addClass("hidden");
    $('#chartThree').removeClass("hidden");

});

//