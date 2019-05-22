
var totalKcals = [];
var totalFats = [];
var totalCarbs = [];
var totalProtein = [];
var totalCosts = [];

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




//

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
   {
    document.getElementById("totalKcal").innerHTML = totalKcals.reduce(getSum);
    document.getElementById("totalFats").innerHTML = totalFats.reduce(getSum).toFixed(1);
    document.getElementById("totalCarbs").innerHTML = totalCarbs.reduce(getSum).toFixed(1);
    document.getElementById("totalProtein").innerHTML = totalProtein.reduce(getSum).toFixed(1);
    document.getElementById("totalCosts").innerHTML = "€ " + totalCosts.reduce(getSum).toFixed(2);
  }
}


// Chart

let chart = document.getElementById('chart').getContext('2d');

let barChart = new Chart(chart, {
    type: 'bar',
    data: {
        labels:['Fats', 'Carbs', 'Protein'],
        datasets: [{
            label: 'Grams',
            data: [
                120,
                36,
                140,
            ],
            backgroundColor: ['blue', 'red', 'green']
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

//