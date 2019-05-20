
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
    name: "butter (100 grams",
    fat: 82.5,
    carbs: 0.7,
    protein: 0.7,
    kcals: 748,
    price: 1.196,
};

//

function addFoodItemToList(value) {
    var food = eval(value);
    document.getElementById("listToday").innerHTML += food.name + "<br />" + "fat: " + food.fat + " grams carbs: " + food.carbs + " grams protein: " + food.protein + " grams kcals: " + food.kcals + " costs: " + food.price + "<br />";
}

