$(document).ready(function () {
    getData();
    var timeout = setTimeout("location.reload(true);",5000); // setting the timeout to refresh the page at an interval of 5 sec
 });
    function getData(){
        
        $.getJSON("recipe.json",  // getting the JSON object
        function (data) {
        var recipe = '';    
        $.each(data, function (key, value) {// ITERATING THROUGH OBJECTS
        var nutrientslist = JSON.stringify (value.nutrients).replace(/\W/g,' '); // triming the data to the required structure
        //Construction of each row in the table from json data
            recipe += '<tr>';
            recipe += '<td>' + 
            value.name + '</td>'; // adding recipe name
            recipe += '<td>' + 
            value.prepTime + '</td>'; // adding preparation time
            recipe += '<td>' + 
            value.cookTime + '</td>';// adding cooking time
            recipe += '<td>' + 
            value.serves + '</td>';// adding no of serves
            recipe += '<td>' + 
            value.category + '</td>';// adding category 
            recipe += '<td>' + 
            value.ingredients + '</td>'; // adding ingredients
            recipe += '<td>' + 
            value.method + '</td>'; // adding method
            recipe += '<td>' + 
            nutrientslist + '</td>';  // adding nutrients
            recipe += '<td><img src=' + 
            value.image  + '/></td>'; // adding recipe image
            recipe += '<td><img src=' + 
            value.icon  + '></td>';   // adding recipe icon
            
        recipe += '</tr>';
    });
      
    $('#table').append(recipe); //inserting the rows to the table
});
    }
