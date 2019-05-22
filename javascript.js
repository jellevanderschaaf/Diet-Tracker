// Global variables

var totalKcals = [];
var totalFats = [];
var totalCarbs = [];
var totalProtein = [];
var totalCosts = [];

var totalKcalsSum;
var totalFatsSum;
var totalCarbsSum;
var totalProteinSum;
var totalCostsSum;


// Food Items objects

var mincedBeef = {    
    name: "minced beef (600 grams)",
    fat: 72,
    carbs: 1.8,
    protein: 120,
    kcals: 1140,
    price: 6.4,
};

var egg = {
    name: "egg (1x)",
    fat: 6.7,
    carbs: 0.9,
    protein: 7.7,
    kcals: 95,
    price: 0.164,
};

var butter = {
    name: "butter (100 grams)",
    fat: 82.5,
    carbs: 0.7,
    protein: 0.7,
    kcals: 748,
    price: 1.196,
};

var chickenLegg = {
    name: "chicken legg (300 grams)",
    fat: 39,
    carbs: 0,
    protein: 54,
    kcals: 570,
    price: 1.22,
};


var mackerel = {
    name: "mackerel (350 grams)",
    fat: 63,
    carbs: 0,
    protein: 77,
    kcals: 875,
    price: 3.32,    
};

var apple = {
    name: "apple (100 grams)",
    fat: 0,
    carbs: 12,
    protein: 0.4,
    kcals: 54,
    price: 0.12,

}


// Add Food Items

function addFoodItemToList(value) {
    var food = eval(value);
    document.getElementById("listToday").innerHTML += food.name + "<br />" + "fat: " + food.fat + " grams carbs: " + food.carbs + " grams protein: " + food.protein + " grams kcals: " + food.kcals + " costs: € " + food.price + "<br />";
    
    totalKcals.push(food.kcals);
    totalFats.push(food.fat);
    totalCarbs.push(food.carbs);
    totalProtein.push(food.protein);
    totalCosts.push(food.price);

    function getSum(total, num) {
        return total + num;
    }
   
    totalKcalsSum = totalKcals.reduce(getSum);
    totalFatsSum = totalFats.reduce(getSum).toFixed(1);
    totalCarbsSum = totalCarbs.reduce(getSum).toFixed(1);
    totalProteinSum = totalProtein.reduce(getSum).toFixed(1);
    totalCostsSum = totalCosts.reduce(getSum).toFixed(2);
   
    {
    document.getElementById("totalKcal").innerHTML = totalKcalsSum;
    document.getElementById("totalFats").innerHTML = totalFatsSum;
    document.getElementById("totalCarbs").innerHTML = totalCarbsSum;
    document.getElementById("totalProtein").innerHTML = totalProteinSum;
    document.getElementById("totalCosts").innerHTML = "€ " + totalCostsSum;
  }
    updateChart();
}


// Chart

let chart = document.getElementById('chart').getContext('2d');

let barChart = new Chart(chart, {
    type: 'bar',
    data: {
        labels:['Fat', 'Carbs', 'Protein'],
        datasets: [{
            label: 'Grams',
            data: [],
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
        }
    }
});

function updateChart() {
  barChart.data.datasets[0].data = [totalFatsSum, totalCarbsSum, totalProteinSum];
  barChart.update();
};

//