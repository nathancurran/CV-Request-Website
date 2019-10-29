function validation() {
    $( "#myForm" ).submit(function( event ) {
        var first_name = $("#first_name").val();
        var last_name = $("#last_name").val();
        var email_address = $("#email_address").val();
        
        var name_regex = /^[a-zA-Z@_-]+$/;
        var email_regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9_\.\-\+])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (first_name == "" || !name_regex.test(first_name)) {
            alert("Please enter a valid first name.");
            event.preventDefault();
        }

        if (last_name == "" || !name_regex.test(last_name)){
            alert("Please enter a valid last name.");
            event.preventDefault();
        }

        if (email_address == "" || !email_regex.test(email_address)){
            alert("Please enter a valid email address.");
            event.preventDefault();
        }

    });
}