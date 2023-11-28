const select = selector => document.querySelector(selector);

document.addEventListener("DOMContentLoaded", () => {
    // get values user entered in textboxes
    const email1 = select("#email_1").value;
    const email2 = select("#email_2").value;
    const firstName = select("#first_name").value;

    //create an error message and set it to an empty string
    let errorMessage = "";

    // check user entries - add to error message if invalid
    if(email == ""){
        errorMessage += "First email is required.\n";
    }

    if(email2 == ""){
        errorMessage += "Second email is required.\n";
    }

    if(email != email2){
        errorMessage += "Both emails must match.\n";
    }

    if(firstName == ""){
        errorMessage += "First name is required.\n";
    }

    //prevent form submission if there's an error message
    if(errorMessage != ""){
        alert(errorMessage);
        evt.preventDefault();
    }

    select("#clear_form").addEventListener("click", () => {
        select("#email_1").value = "";
        select("#email_2").value = "";
        select("#first_name").value = "";

        select("#email_1").focus();
    });

    select("#email_1").focus();
});
