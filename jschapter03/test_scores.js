// declare empty array
const scores = [];

let score = 0;

do{
    // TODO prompt user for test score (int)
    score = parseInt(prompt("Enter a Test Score"));
    // if-else to error-check this "score variable"
    // if valid, add value to array
    // if not valid, display alert

    if(score < 0 || score > 100){
        alert("Invalid Input. Test Score must be between 0 and 100");
    }else{
        scores[scores.length] = score;
    }
}while(score != -1);

if(scores.length > 0){
    // TODO using a for-loop display all array elements
    // using document.write
    for(let index in scores){
        document.write("scores[" + index + "] = " + scores[index] + "<br>");
    }

    // TODO sum all the values in the array
    // using a for-loop
    let sum = 0;
    for(let index of scores){
        sum += index;
    }

    document.write("<br>Test Score Sum: " + sum);
    // calculate average
    // TODO display average using document.write;
    let average = sum / scores.length;
    document.write("<br>Test Score Average: " + average);
}