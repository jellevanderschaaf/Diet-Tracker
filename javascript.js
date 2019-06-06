// Global variables

var valueRemove;

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

class FoodItem {
    constructor(name, fat, carbs, protein, kcals, price) {
        this.name = name;
        this.fat = fat;
        this.carbs = carbs;
        this.protein = protein;
        this.kcals = kcals;
        this.price = price;
    }
}

var mincedBeef = new FoodItem('minced beef (600 grams)', 72, 1.8, 120, 1140, 6.4);
var egg = new FoodItem('egg (1x)', 6.7, 0.9, 7.7, 95, 0.164);
var butter = new FoodItem('butter (100 grams)', 82.5, 0.7, 0.7, 748, 1.196);
var chickenLegg = new FoodItem('chicken legg (300 grams)', 39, 0, 54, 570, 1.22);
var mackerel = new FoodItem('mackerel (350 grams)', 63, 0, 77, 875, 3.32);
var apple = new FoodItem('apple (100 grams)', 0, 12, 0.4, 54, 0.12);

// Create new Food Item

var entryName;
var entryFat;
var entryCarbs;
var entryProtein;
var entryKcals;
var entryPrice;

console.log(entryName, entryFat, entryCarbs, entryProtein, entryKcals, entryPrice);


function createFoodItem() {
    document.getElementById("createFoodItem").classList.remove('hidden');
}

function create() {
    entryName = document.getElementById('name').value
    entryFat = document.getElementById('fat').value
    entryCarbs = document.getElementById('carbs').value
    entryProtein = document.getElementById('protein').value
    entryKcals = document.getElementById('kcals').value
    entryPrice = document.getElementById('price').value

    console.log(entryName, entryFat, entryCarbs, entryProtein, entryKcals, entryPrice);
}

// Add and remove Food Items

function addFoodItemToList(value) {
    var food = eval(value);
    valueRemove = value;

    var foodItem = document.createElement('div');
    foodItem.innerHTML = food.name + "<br />" + "fat: " + food.fat + " grams carbs: " + food.carbs + " grams protein: " + food.protein + " grams kcals: " + food.kcals + " costs: € " + food.price + "<br />";
    document.getElementById('listToday').appendChild(foodItem);
    foodItem.setAttribute("id", value);

    var buttonRemoveItem = document.createElement('button');
    buttonRemoveItem.innerHTML = 'x';
    buttonRemoveItem.value = value;
    buttonRemoveItem.setAttribute("class", "btn btn-danger");
    buttonRemoveItem.onclick = function() {
        document.getElementById(this.value).outerHTML = "";
    };

    document.getElementById(value).appendChild(buttonRemoveItem);

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
        labels: ['Fat', 'Carbs', 'Protein'],
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

//