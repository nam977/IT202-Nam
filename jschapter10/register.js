// Slide 28

$(document).ready( () => {

    $("#email").focus();

    $(":radio").change( () => {
        let radioButton = $(":radio:checked").val();
        console.log(radioButton);
        if(radioButton == "corporate"){
            // enable company_name input text
            $("#company_name").attr("disabled", false);
            $("#company_name").next().text("*");
        } else {
            // disable company_name input text
            $("#company_name").attr("disabled", true);
            $("#company_name").next().text("");
        }
    });

    // Slide 29
    $("#member_form").submit(  event => {
        let isValid = true;

        const emailPattern = /\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2, 4}\b/;

        const email = $("#email").val().trim();

        if(email == ""){
            $("#email").next().text("This field is required.");
            isValid = false;
        }

        // prevent form submission if any entries are invalid
        if(isValid == false){
            event.preventDefault();
        } else if(!emailPattern.test(email)){
            $("#email").next().text("Must be a valid email address.");
            isValid = false;
        }else{
            $("#email").next().text("");
        }

        // validate password
        const password = $("#password").val().trim();
        if(password.length < 6){
            $("#password").next().text("Must be 6 or more characters.");
            isValid = false;
        }else{
            $("#password").next().text("");
        }

        // validate company name
        if($("#company_name").prop("disabled") == false){
            const name = $("company_name").val().trim();
            if(name == ""){
                $("company_name").next().text("This field is required.");
                isValid = false;
            }else{
                $("#company_name").next().text("");
            }
        }

        // prevent form submission if any entries are invalid
        if(isValid == false){
            event.preventDefault();
        }
    });
});