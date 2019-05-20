
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
    var variable = eval(value);
    document.getElementById("listToday").innerHTML += variable.name + "<br />" + "fat: " + variable.fat + " grams carbs: " + variable.carbs + " grams protein: " + variable.protein + " grams kcals: " + variable.kcals + " costs: " + variable.price + "<br />";
}

