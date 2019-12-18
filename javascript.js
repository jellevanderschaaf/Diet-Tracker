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
    var returnDate;

    $.post("loaddate.php", { date: date, datethis: datethis }, function(data) {

        var returnData = JSON.parse(data);
        returnDate = returnData[0];

        $.post("loadgraphs.php", { graphthis: graphthis }, function(data) {

            console.log(returnDate);
            var returnData = JSON.parse(data);
            console.log(returnData);

            var todayPhp = returnDate - 1 + 1;
            var todayPhpMinusOne = todayPhp - 1;
            var todayPhpMinusTwo = todayPhp - 2;
            var todayPhpMinusThree = todayPhp - 3;
            var todayPhpMinusFour = todayPhp - 4;
            var todayPhpMinusFive = todayPhp - 5;
            var todayPhpMinusSix = todayPhp - 6;

            console.log(todayPhp);
            console.log(todayPhpMinusOne);

            var noEntry = ['0', '0', '0', '0', '0'];
            var weekArray = [];
            var returnDataMorph = returnData;
            var weekArrayCheck = [todayPhp, todayPhpMinusOne, todayPhpMinusTwo, todayPhpMinusThree, todayPhpMinusFour, todayPhpMinusFive, todayPhpMinusSix];
            console.log(weekArrayCheck);


            //1

            function checkToday() {

                if (todayPhp == returnData[0][0]) {

                    weekArray.push(returnData[0]);

                }
                if (todayPhp != returnData[0][0]) {

                    weekArray.push(noEntry);

                }

            };

            // 2

            function checkTodayMinusOne() {

                if (todayPhpMinusOne == returnData[0][0]) {

                    weekArray.push(returnData[0]);

                }
                if (todayPhpMinusOne == returnData[1][0]) {

                    weekArray.push(returnData[1]);

                }
                if (todayPhpMinusOne != returnData[0][0] && todayPhpMinusOne != returnData[1][0]) {

                    weekArray.push(noEntry);

                }

            };

            // 3

            function checkTodayMinusTwo() {

                if (todayPhpMinusTwo == returnData[0][0]) {

                    weekArray.push(returnData[0]);

                }
                if (todayPhpMinusTwo == returnData[1][0]) {

                    weekArray.push(returnData[1]);

                }
                if (todayPhpMinusTwo == returnData[2][0]) {

                    weekArray.push(returnData[2]);

                }
                if (todayPhpMinusTwo != returnData[0][0] && todayPhpMinusTwo != returnData[1][0] && todayPhpMinusTwo != returnData[2][0]) {

                    weekArray.push(noEntry);

                }

            };


            // 4

            function checkTodayMinusThree() {

                if (todayPhpMinusThree == returnData[0][0]) {

                    weekArray.push(returnData[0]);

                }
                if (todayPhpMinusThree == returnData[1][0]) {

                    weekArray.push(returnData[1]);

                }
                if (todayPhpMinusThree == returnData[2][0]) {

                    weekArray.push(returnData[2]);

                }
                if (todayPhpMinusThree == returnData[3][0]) {

                    weekArray.push(returnData[3]);

                }

                if (todayPhpMinusThree != returnData[0][0] && todayPhpMinusThree != returnData[1][0] && todayPhpMinusThree != returnData[2][0] && todayPhpMinusThree != returnData[3][0]) {

                    weekArray.push(noEntry);

                }

            };

            // 5

            function checkTodayMinusFour() {

                if (todayPhpMinusFour == returnData[0][0]) {

                    weekArray.push(returnData[0]);

                }
                if (todayPhpMinusFour == returnData[1][0]) {

                    weekArray.push(returnData[1]);

                }
                if (todayPhpMinusFour == returnData[2][0]) {

                    weekArray.push(returnData[2]);

                }
                if (todayPhpMinusFour == returnData[3][0]) {

                    weekArray.push(returnData[3]);

                }
                if (todayPhpMinusFour == returnData[4][0]) {

                    weekArray.push(returnData[4]);

                }

                if (todayPhpMinusFour != returnData[0][0] && todayPhpMinusFour != returnData[1][0] && todayPhpMinusFour != returnData[2][0] && todayPhpMinusFour != returnData[3][0] && todayPhpMinusFour != returnData[4][0]) {

                    weekArray.push(noEntry);

                }

            };

            // 6

            function checkTodayMinusFive() {

                if (todayPhpMinusFive == returnData[0][0]) {

                    weekArray.push(returnData[0]);

                }
                if (todayPhpMinusFive == returnData[1][0]) {

                    weekArray.push(returnData[1]);

                }
                if (todayPhpMinusFive == returnData[2][0]) {

                    weekArray.push(returnData[2]);

                }
                if (todayPhpMinusFive == returnData[3][0]) {

                    weekArray.push(returnData[3]);

                }
                if (todayPhpMinusFive == returnData[4][0]) {

                    weekArray.push(returnData[4]);

                }

                if (todayPhpMinusFive == returnData[5][0]) {

                    weekArray.push(returnData[5]);

                }

                if (todayPhpMinusFive != returnData[0][0] && todayPhpMinusFive != returnData[1][0] && todayPhpMinusFive != returnData[2][0] && todayPhpMinusFive != returnData[3][0] && todayPhpMinusFive != returnData[4][0] && todayPhpMinusFive != returnData[5][0]) {

                    weekArray.push(noEntry);

                }

            };

            // 7

            function checkTodayMinusSix() {

                if (todayPhpMinusSix == returnData[0][0]) {

                    weekArray.push(returnData[0]);

                }
                if (todayPhpMinusSix == returnData[1][0]) {

                    weekArray.push(returnData[1]);

                }
                if (todayPhpMinusSix == returnData[2][0]) {

                    weekArray.push(returnData[2]);

                }
                if (todayPhpMinusSix == returnData[3][0]) {

                    weekArray.push(returnData[3]);

                }
                if (todayPhpMinusSix == returnData[4][0]) {

                    weekArray.push(returnData[4]);

                }

                if (todayPhpMinusSix == returnData[5][0]) {

                    weekArray.push(returnData[5]);

                }

                if (todayPhpMinusSix == returnData[6][0]) {

                    weekArray.push(returnData[6]);

                }

                if (todayPhpMinusSix != returnData[0][0] && todayPhpMinusSix != returnData[1][0] && todayPhpMinusSix != returnData[2][0] && todayPhpMinusSix != returnData[3][0] && todayPhpMinusSix != returnData[4][0] && todayPhpMinusSix != returnData[5][0] && todayPhpMinusSix != returnData[6][0]) {

                    weekArray.push(noEntry);

                }

            };

            checkToday();
            checkTodayMinusOne();
            checkTodayMinusTwo();
            checkTodayMinusThree();
            checkTodayMinusFour();
            checkTodayMinusFive();
            checkTodayMinusSix();

            // if (item[0] == todayPhp || item[0] == todayPhpMinusOne || item[0] == todayPhpMinusTwo || item[0] == todayPhpMinusThree || item[0] == todayPhpMinusFour || item[0] == todayPhpMinusFive || item[0] == todayPhpMinusSix) {

            //     weekArray.push(item);

            // } else {

            //     var noEntry = ['0', '0', '0', '0', '0'];
            //     weekArray.push(noEntry);

            //};



            /*
             returnDataMorph.forEach(createWeekArray);
            
            function createWeekArray(item) {

                if (item = todayPhp | item == todayPhpMinusOne | item == todayPhpMinusTwo | item == todayPhpMinusThree | item == todayPhpMinusFour | item == todayPhpMinusFive | item == todayPhpMinusSix) {

                    weekArray.push(item);

                } else {

                    var noEntry = ['0', '0', '0', '0', '0'];
                    weekArray.push(noEntry);

                }


            };
*/
            console.log(weekArray);
            console.log(returnDataMorph);



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