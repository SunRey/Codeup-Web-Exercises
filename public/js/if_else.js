// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet', 'black', 'gray', 'brown', 'tan'];
var color = colors[Math.floor(Math.random()*colors.length)];
var response = ['blood', 'fruit', 'lemons', 'limes', 'the sky', '\'', '\'', 'my humor', 'an artist', 'coffee', 'sand'];

var favorite = 'green'; // TODO: change this to your favorite color from the list

if (color == 'red'|| color == 'orange' || color == 'yellow' || color == 'green' || color == 'blue' || color == 'black' || 
	color == 'gray' || color == 'brown' || color == 'tan') {
	var indexResponse = colors.indexOf(color),
	workAround = console.log( "The color " + color + ' reminds me of ' + response[indexResponse] + '.');
} 
else {
	console.log('I do not know anything by that color.');
}
// TODO: Create a block of if/else statements to check for every color except indigo and violet.
// TODO: When a color is encountered log a message that tells the color, and an object of that color.
//       Example: Blue is the color of the sky.

// TODO: Have a final else that will catch indigo and violet.
// TODO: In the else, log: I do not know anything by that color.

// TODO: Using the ternary operator, conditionally log a statement that
//       says whether the random color matches your favorite color.
console.log((favorite==color) ? "matches my favorite color" : 'does not match ma FAV color');

var indexResponse = colors.indexOf(color),
workAround = "The color " + color + ' reminds me of ' + response[indexResponse] + '.',
message = (color == 'violet' || color == 'indigo') ? 'I do not know anything by that color.' : workAround;
console.log(message);

