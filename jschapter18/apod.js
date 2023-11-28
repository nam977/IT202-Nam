const clearDisplay = () => {
    const display = document.querySelector("#display");

    while(display.firstChild){
        display.firstChild.remove();
    }
}

const displayError = error => {
    clearDisplay();
    const display = document.querySelector("#display");
    const span = document.createElement("span");
    span.setAttribute('class', 'error');
    const text = document.createTextNode(error);
    span.appendChild(text);
    display.appendChild(span);
}

// TESTING ONLY
// displayError('error 1');
// displayError('error 2');

const displayData = data => {
    clearDisplay();
    console.log(data);
    // TODO display APOD data
    clearDisplay();
    const display = document.querySelector("#display");
    const h3 = document.createElement('h3');
    const title = document.createTextNode(data.title);
    h3.appendChild(title);
    display.appendChild(h3);
}

const displayPicture = data => {
    if(data.error){
        displayError(data.error.message);
    }else if(data.code){
        displayError(data.msg);       
    }else{
        displayData(data);
    }
}

document.addEventListener("DOMContentLoaded", () => {
    document.querySelector("#view_button").addEventListener
    ("click", () => {

        const dateTextbox = document.querySelector("#date");
        let dateStr  = dateTextbox.value;

        if(dateStr){
            // Slide 28
            const domain = `https://api.nasa.gov/planetary/apod`;
            const demo_api_key = 'DEMO_KEY';
            // copy paste YOUR API Key here.....
            const my_api_key = '4KKYSK6AtyuVGHwwTdJDOUVYMyT5uPFGNzZBK2IB';
            const request = `?api_key=${demo_api_key}&date=${dateStr}`;
            const url = domain + request;
            console.log("url = " + url);

            fetch(url)
                .then( response => response.json() )
                .then( json => displayPicture(json))
                .catch( e => displayError(e.message));
        }else{
            // date is empty
            const msg = "Please select a valid date.";
            displayError(msg);
        }
    });
});