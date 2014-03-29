// $(document).ready(function() {

// $(".add").click(function() {
//     var child = $('#field').clone(true);
//     child = $(child);
//     console.log(child);
//     child.find(':nth-child(1)').val("");
//     child.find(':nth-child(2)').val("");
//     child.find(':nth-child(3)').val("");
//     child.insertAfter('#field');
//     //console.log($bla);
//     return false;
// });

// $(".remove").click(function() {
//     $(this).parent().remove();
// });

// $("#form_id").live('submit',function(){
//     if($(this).find('#username').val()==''){
//         alert('username cant left empty!!');
//         return false;
//     }
// });
// $("#fancyform").live('submit', function(){
//     $(this).find('#fields').val();
// });


// });

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
