// ignore these lines for now
// just know that the variable 'color' will end up with a random value from the colors array
var colors = ['red', 'orange', 'yellow', 'green', 'blue', 'indigo', 'violet'],
color = colors[Math.floor(Math.random()*colors.length)],
response = ['blood', 'fruit', 'lemons', 'limes', 'the sky', '\'', '\'', 'my humor', 'an artist', 'coffee', 'sand'],
indexResponse = colors.indexOf(color),
workAround = "The color " + color + ' reminds me of ' + response[indexResponse] + '.';


switch (color) {
	case 'red':
		console.log(workAround)
		break; 
	case 'orange':
		console.log(workAround)
		break; 
	case 'yellow':
		console.log(workAround)
		break; 
	case 'green':
		console.log(workAround)
		break; 
	case 'blue':
		console.log(workAround)
		break; 
	default:
		console.log('I do not know anything by that color.');
	}


    // todo: create a case statement that will handle every color except indigo and violet
    // todo: when a color is encountered log a message that tells the color, and an object of that color
    //       example: Blue is the color of the sky.

    // todo: create a default case that will catch indigo and violet
    // todo: for the default case, log: I do not know anything by that color.
