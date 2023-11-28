const displayErrorMsgs = msgs => {
    // create new ul tag
    const ul = document.createElement("ul");         
    ul.classList.add("messages");            
 
    // create li tag for each error message and add to ul tag
    for (let msg of msgs) {                          
        const li = document.createElement("li");     
        const text = document.createTextNode(msg);   
        li.appendChild(text);                        
        ul.appendChild(li);                          
    }
 
    // If no ul element yet, add it before form tag.
    // Otherwise, replace it.
    const node = select("ul");                            
    if (node == null) {                                      
        const form = select("form");                      
        form.parentNode.insertBefore(ul, form);      
    } 
    else {                                           
        node.parentNode.replaceChild(ul, node);      
    }  
};

const processEntries = () => {
    // get form controls to check for validity
    const email = select("#email_address");
    const phone = select("#phone");
    const country = select("#country");
    const terms = select("#terms");
 
    // create array for error messages
    const msgs = [];
 
    // check user entries for validity
    if (email.value == "") {
        msgs[msgs.length] = "Please enter an email address."; } 
    if (phone.value == "") {
        msgs[msgs.length] =
            "Please enter a mobile phone number."; } 
    if (country.value == "") {
        msgs[msgs.length] = "Please select a country."; } 
    if (terms.checked == false) {
        msgs[msgs.length] =
            "You must agree to the terms of service."; }
	// submit the form or notify user of errors
    if (msgs.length == 0) {      // no error messages
        select("form").submit(); 
    } else {
        displayErrorMsgs(msgs);   
    }
};
 
const resetForm = () => {
    select("form").reset();      // don't need to clear span elements
    select("ul").remove();       // remove the error messages
    select("#email_address").focus();
};
 
document.addEventListener("DOMContentLoaded", () => {
    select("#register").addEventListener("click", processEntries);
    select("#reset_form").addEventListener("click", resetForm);  
    select("#email_address").focus();   
});
