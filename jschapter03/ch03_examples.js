// Slide 5
let lastName = "Hopper";

if(lastName == "Hopper"){
    console.log("Last name is Hopper");
}

if(lastName != "Grace"){
    console.log("Last name is not Grace");
}

// Slide 8
let rate = "some number";

if(isNaN(rate) || rate < 0){
    console.log("Rate is not valid.");
}

// Slide 10
let age = prompt("What is your age?");

if(age >= 18){
    alert("You may vote.");
}else{
    alert("You are not old enough to vote.");
}

// Slide 15
let years = parseInt(prompt("Enter number of years."));

while(isNaN(years) || years <= 0){
    years = parseInt(prompt("Years must be a positive number."));
}

// Slide 19
for(let index = 3; index > 0; index--){
    document.write(index + "...");
}

document.write("Blast Off!");

// Slide 31
const totals = [];
totals[0] = 141.95;
totals[1] = 212.25;
totals[2] = 411;

console.log("totals[2] = " + totals[2]);
console.log("totals length = " + totals.length);

totals[totals.length] = 23.4;
totals[totals.length] = 56.7;

// Slide 34
let sum = 0;
for(var index = 0; index < totals.length; index++){
    sum += totals[index];
}

// TODO Modify this to use parseFloat and toFixed(14)
console.log("sum = " + sum);
// Slide 36: for-in loop
// index holds the current index
for(let index in totals){
    console.log("totals[" + index + "] = " + totals[index]);
}

// Slide 37: for-of loop
// value holds the current value
for(let value of totals){
    console.log("value = " + value);
}