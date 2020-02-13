function register()
{
        var form = document.getElementById("RegisterLecturer");
        var check = /\S+@\S+\.\S+/;
        
        if(form.lname.value == "")
        {
            swal({ title: "Missing",text: "Lecturer name cannot be empty", icon:"error"});
        }
        else if(form.mobile.value == "")
        {
            swal({ title: "Missing",text: "Lecturer mobile Number cannot be empty",icon: "error",}); 
        }
        else if(form.mobile.value.length != 10) {
            swal({ title: "Missing",text: "Lecturer mobile Number must have 10 digits",icon: "error",});
        }
        else if(form.email.value == "")
        {
            swal({ title: "Missing",text: "Lecturer e-mail cannot be empty",icon: "error",}); 
        }
        else if(!check.test(form.email.value))
        {
            swal({ title: "Missing",text: "Lecturer e-mail cannot be invalid",icon: "error",});
        }
        else if(form.registerPassword.value == "")
        {
            swal({ title: "Missing",text: "Password cannot be empty",icon: "error",}); 
        }
        else if(form.registerPasswordConfirmation.value == "")
        {
            swal({ title: "Missing",text: "Confirm Password cannot be empty",icon: "error",}); 
        }
        else if(form.registerPassword.value != form.registerPasswordConfirmation.value)
        {
            swal({ title: "Error",text: "Passwords do not match ",icon: "error",}); 
        }
        else
        {
            RS = null;
            RS = new XMLHttpRequest();
            RS.open("POST","./assets/php/add_lecturer.php",true);
            RS.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            RS.onreadystatechange = onAddCompleteRS;
            var msg = "name=" + form.lname.value + "&mobile=" + form.mobile.value + "&email=" + form.email.value + "&password=" + form.registerPassword.value + "&cpassword=" + form.registerPasswordConfirmation.value;
            RS.send(msg);
        }
}

function onAddCompleteRS()
{
    var form = document.getElementById("RegisterLecturer");
        if(RS.readyState == 4){
            if(RS.status == 200){
                var retVal = RS.responseText;
                if(retVal == 'FAIL')
                    swal({ title: "Error",text: "Registration Unsuccessful",icon: "error",});
                else if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Registration successful",icon: "success",});
                    form.reset();
                }
                    
                else
                    swal({ title: "Error",text: "Internal Server error "+ RS.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + RS.responseText);
            }
            RS = null;
        }
}