$(".navbarImage").on('click', function() {

    window.location.reload(true);

});





var table = document.getElementById("mainTable2");

var totalFat = 0;
var totalCarbs = 0;
var totalProtein = 0;
var totalCosts = 0;
var totalKcals = 0;


for (var i = 0; i < table.rows.length; i++) {
    totalFat = totalFat + Number(table.rows[i].cells[1].innerHTML);
    totalCarbs = totalCarbs + Number(table.rows[i].cells[2].innerHTML);
    totalProtein = totalProtein + Number(table.rows[i].cells[3].innerHTML);
    totalCosts = totalCosts + Number(table.rows[i].cells[4].innerHTML);
    totalKcals = totalKcals + Number(table.rows[i].cells[5].innerHTML);
}


document.getElementById("totalKcals").innerHTML = 'Kcals:&emsp;' + totalKcals;
document.getElementById("totalCosts").innerHTML = 'Costs:&emsp; € ' + totalCosts.toFixed(2);

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

var ctx = $('#chart')[0];

ctx.height = 165;


let barChart = new Chart(chart, {
    type: 'bar',
    data: {
        labels: ['Fat', 'Carbs', 'Protein'],
        datasets: [{
            label: 'Grams',
            data: [
                totalFat,
                totalCarbs,
                totalProtein
            ],
            backgroundColor: ['rgba(250, 147, 28, 0.8)', 'rgba(236, 59, 66, 0.8)', 'rgba(161, 223, 245, 0.8)']
        }],
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
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
                display: true,
                ticks: {
                    beginAtZero: true,
                    display: true,
                    steps: 6,
                    max: 250
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

    var table = document.getElementById("mainTable2");

    var totalFat = 0;
    var totalCarbs = 0;
    var totalProtein = 0;
    var totalCosts = 0;
    var totalKcals = 0;

    for (var i = 0; i < table.rows.length; i++) {
        totalFat = totalFat + Number(table.rows[i].cells[1].innerHTML);
        totalCarbs = totalCarbs + Number(table.rows[i].cells[2].innerHTML);
        totalProtein = totalProtein + Number(table.rows[i].cells[3].innerHTML);
        totalCosts = totalCosts + Number(table.rows[i].cells[4].innerHTML);
        totalKcals = totalKcals + Number(table.rows[i].cells[5].innerHTML);
    }



    barChart.data.datasets[0].data = [Math.round(totalFat), Math.round(totalCarbs), Math.round(totalProtein)];
    barChart.update();

    document.getElementById("totalKcals").innerHTML = 'Kcals:&emsp;' + totalKcals;
    document.getElementById("totalCosts").innerHTML = 'Costs:&emsp; € ' + totalCosts.toFixed(2);

};


var today = moment().format("DD/MM");
var todayMinusOne = moment().subtract(1, 'days').format("DD/MM");
var todayMinusTwo = moment().subtract(2, 'days').format("DD/MM");
var todayMinusThree = moment().subtract(3, 'days').format("DD/MM");
var todayMinusFour = moment().subtract(4, 'days').format("DD/MM");
var todayMinusFive = moment().subtract(5, 'days').format("DD/MM");
var todayMinusSix = moment().subtract(6, 'days').format("DD/MM");

// Load Graph data from database

var graphthis = 'graph';
var datethis = 'date';

$(document).ready(function() {

    var dateOne = document.getElementById('date').textContent;
    var date = dateOne;
    console.log(date);

    $.post("loaddate.php", { date: date, datethis: datethis }, function(data) {

        var returnDate = JSON.parse(data);
        console.log(returnDate);

    });

    $.post("loadgraphs.php", { graphthis: graphthis }, function(data) {

        var returnData = JSON.parse(data);

        // var todayPhp = date;
        //var todayPhpMinusOne = date - 1;
        //var todayPhpMinusTwo = date - 2;
        // var todayPhpMinusThree = date - 3;
        //var todayPhpMinusFour = date - 4;
        //var todayPhpMinusFive = date - 5;
        //var todayPhpMinusSix = date - 6;



        //var weekArray;

        /*

                            returnData.forEach(createWeekArray);

                            function createWeekArray(item) {

                                item.[0].forEach(createWeekArrayTwo);

                                function createWeekArrayTwo(item) {

                                    if (item ==

                                    }

                                }


        */






        console.log(returnData);

        totalPriceToday = returnData[0][1];
        totalPriceMinusOne = returnData[1][1];
        totalPriceMinusTwo = returnData[2][1];
        totalPriceMinusThree = returnData[3][1];
        totalPriceMinusFour = returnData[4][1];
        totalPriceMinusFive = returnData[5][1];
        totalPriceMinusSix = returnData[6][1];

        totalFatKcalsToday = returnData[0][2];
        totalFatKcalsMinusOne = returnData[1][2];
        totalFatKcalsMinusTwo = returnData[2][2];
        totalFatKcalsMinusThree = returnData[3][2];
        totalFatKcalsMinusFour = returnData[4][2];
        totalFatKcalsMinusFive = returnData[5][2];
        totalFatKcalsMinusSix = returnData[6][2];

        totalCarbsKcalsToday = returnData[0][3];
        totalCarbsKcalsMinusOne = returnData[1][3];
        totalCarbsKcalsMinusTwo = returnData[2][3];
        totalCarbsKcalsMinusThree = returnData[3][3];
        totalCarbsKcalsMinusFour = returnData[4][3];
        totalCarbsKcalsMinusFive = returnData[5][3];
        totalCarbsKcalsMinusSix = returnData[6][3];

        totalProteinKcalsToday = returnData[0][4];
        totalProteinKcalsMinusOne = returnData[1][4];
        totalProteinKcalsMinusTwo = returnData[2][4];
        totalProteinKcalsMinusThree = returnData[3][4];
        totalProteinKcalsMinusFour = returnData[4][4];
        totalProteinKcalsMinusFive = returnData[5][4];
        totalProteinKcalsMinusSix = returnData[6][4];


        // Chart two

        let chartTwo = document.getElementById('chartTwo').getContext('2d');

        let lineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: [todayMinusSix,
                    todayMinusFive,
                    todayMinusFour,
                    todayMinusThree,
                    todayMinusTwo,
                    todayMinusOne,
                    today,
                ],
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
                responsive: true,
                maintainAspectRatio: false,
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
                            max: 65,
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
                labels: [todayMinusSix,
                    todayMinusFive,
                    todayMinusFour,
                    todayMinusThree,
                    todayMinusTwo,
                    todayMinusOne,
                    today
                ],
                datasets: [{
                    label: ['€'],
                    data: [
                        parseFloat(totalPriceMinusSix).toFixed(2),
                        parseFloat(totalPriceMinusFive).toFixed(2),
                        parseFloat(totalPriceMinusFour).toFixed(2),
                        parseFloat(totalPriceMinusThree).toFixed(2),
                        parseFloat(totalPriceMinusTwo).toFixed(2),
                        parseFloat(totalPriceMinusOne).toFixed(2),
                        parseFloat(totalPriceToday).toFixed(2)
                    ],
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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
                        display: true,
                        ticks: {
                            beginAtZero: true,
                            display: true,
                            steps: 1,
                            max: 14
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


        // Chart Four

        let chartFour = document.getElementById('chartFour').getContext('2d');

        let barChartFour = new Chart(chartFour, {
            type: 'bar',
            data: {
                labels: [todayMinusSix,
                    todayMinusFive,
                    todayMinusFour,
                    todayMinusThree,
                    todayMinusTwo,
                    todayMinusOne,
                    today,
                ],
                datasets: [{
                    label: ['Fat'],
                    data: [
                        Math.round(totalFatKcalsMinusSix),
                        Math.round(totalFatKcalsMinusFive),
                        Math.round(totalFatKcalsMinusFour),
                        Math.round(totalFatKcalsMinusThree),
                        Math.round(totalFatKcalsMinusTwo),
                        Math.round(totalFatKcalsMinusOne),
                        Math.round(totalFatKcalsToday)
                    ],
                    backgroundColor: 'rgba(250, 147, 28, 0.6)'
                }, {
                    label: ['Carbs'],
                    data: [
                        Math.round(totalCarbsKcalsMinusSix),
                        Math.round(totalCarbsKcalsMinusFive),
                        Math.round(totalCarbsKcalsMinusFour),
                        Math.round(totalCarbsKcalsMinusThree),
                        Math.round(totalCarbsKcalsMinusTwo),
                        Math.round(totalCarbsKcalsMinusOne),
                        Math.round(totalCarbsKcalsToday)
                    ],
                    backgroundColor: 'rgba(236, 59, 66, 0.6)'
                }, {
                    label: ['Protein'],
                    data: [
                        Math.round(totalProteinKcalsMinusSix),
                        Math.round(totalProteinKcalsMinusFive),
                        Math.round(totalProteinKcalsMinusFour),
                        Math.round(totalProteinKcalsMinusThree),
                        Math.round(totalProteinKcalsMinusTwo),
                        Math.round(totalProteinKcalsMinusOne),
                        Math.round(totalProteinKcalsToday)
                    ],
                    backgroundColor: 'rgba(161, 223, 245, 0.6)'
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
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
                        display: true,
                        stacked: true,
                        ticks: {
                            beginAtZero: true,
                            display: true,
                            steps: 1,
                            max: 3500
                        },
                        gridLines: {
                            display: false
                        }
                    }],
                    xAxes: [{
                        stacked: true,
                        gridLines: {
                            display: false
                        }
                    }]
                }
            }
        });









    });
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
    $('#chartFour').removeClass("hidden");

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

    $('#chartFour').addClass("hidden");
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

    $('#chartFour').addClass("hidden");
    $('#chartTwo').addClass("hidden");
    $('#chartThree').removeClass("hidden");

});

//