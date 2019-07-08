// Global variables

var idCounter = 10;
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

let foodItems = [];

class FoodItem {
    constructor(id, name, fat, carbs, protein, kcals, price) {
        this.id = id;
        this.name = name;
        this.fat = fat;
        this.carbs = carbs;
        this.protein = protein;
        this.kcals = kcals;
        this.price = price;
    }
}

function newFoodItem(id, name, fat, carbs, protein, kcals, price) {

    foodItems[id] = new FoodItem(id, name, fat, carbs, protein, kcals, price);

}

newFoodItem(0, 'minced beef', 72, 1.8, 120, 1140, 6.4);
newFoodItem(1, 'egg', 6.7, 0.9, 7.7, 95, 0.164);
newFoodItem(2, 'butter', 82.5, 0.7, 0.7, 748, 1.196);
newFoodItem(3, 'chicken legg', 39, 0, 54, 570, 1.22);
newFoodItem(4, 'mackerel', 63, 0, 77, 875, 3.32);
newFoodItem(9, 'apple', 0, 12, 0.4, 54, 0.12);

console.log(foodItems[0].name);

// Create food items

function createFoodItem() {

    document.getElementById("modalOne").classList.remove('hidden');
}

function createItem() {

    var entryName = document.getElementById('name').value;
    var entryFat = Number(document.getElementById('fat').value);
    var entryCarbs = Number(document.getElementById('carbs').value);
    var entryProtein = Number(document.getElementById('protein').value);
    var entryKcals = Number(document.getElementById('kcals').value);
    var entryPrice = Number(document.getElementById('price').value);
    var id = idCounter + 1;
    updateIdCounter();

    function updateIdCounter() {
        idCounter = idCounter + 1;
    }

    newFoodItem(id, entryName, entryFat, entryCarbs, entryProtein, entryKcals, entryPrice);
    console.log(foodItems);


    var newFoodItem2 = document.createElement('div');
    newFoodItem2.innerHTML = "&bull; " + entryName;
    newFoodItem2.setAttribute("class", "FoodItem");
    document.getElementById("test").appendChild(newFoodItem2);

    // check if this works with space

    newFoodItem2.setAttribute("id", entryName);

    //    

    var newFoodItemAddButton = document.createElement('button');
    newFoodItemAddButton.innerHTML = '+';
    newFoodItemAddButton.value = id;
    newFoodItemAddButton.setAttribute("class", "btn btn-info add");

    newFoodItemAddButton.onclick = function() {
        addFoodItemToList(this.value);
    };

    document.getElementById(entryName).appendChild(newFoodItemAddButton);

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




function addFoodItemToList(value) {
    console.log(value);

    var food = foodItems[value];

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
            label: 'Kg',
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