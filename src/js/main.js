

var ingredient = [];

function addrecipe()
{
    var ingredientObject = {};
    ingredientObject['name']  = String(document.getElementById("ingredient-name").value).trim();
    ingredientObject['quantity'] = String(document.getElementById("ingredient-quantity").value).trim();
    ingredientObject['description'] = String(document.getElementById("ingredient-description").value).trim();
    ingredient.push(ingredientObject);
    document.getElementById("hidden-name").value = JSON.stringify(ingredient);
    document.getElementById("numIngredient").textContent = ingredient.length;

}
var rank =[];
function rankRecipe(){

}
