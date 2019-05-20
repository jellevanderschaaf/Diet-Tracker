
// Food Items objects

var mincedBeef = {
    fat: 72,
    carbs: 1.8,
    protein: 120,
    kcals: 1140,
    price: 6.4,
};

var egg = {
    fat: 6.7,
    carbs: 0.9,
    protein: 7.7,
    kcals: 95,
    price: 0.164,
};

var butter = {
    fat: 82.5,
    carbs: 0.7,
    protein: 0.7,
    kcals: 748,
    price: 1.196,
};

//

function addFoodItemToList(value) {
    document.getElementById("listToday").innerHTML += value + "<br />";

}

