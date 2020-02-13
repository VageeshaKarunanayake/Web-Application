function edit_profile(element)
{
    var table = document.getElementById("viewTable");
    rowId = element.id;
    var name = table.rows[rowId].cells[0].innerHTML;
    var email = table.rows[rowId].cells[1].innerHTML;
    var mobile = table.rows[rowId].cells[2].innerHTML;
    
    document.getElementById("name3").value = name;
    document.getElementById("email3").value = email;
    document.getElementById("mobile3").value = mobile;
}

function update_lectuer()
{
        var form = document.getElementById("updateLecturer");
        var check = /\S+@\S+\.\S+/;
        
        if(form.name3.value == "")
        {
            swal({ title: "Missing",text: "Lecturer name cannot be empty", icon:"error"});
        }
        else if(form.mobile3.value == "")
        {
            swal({ title: "Missing",text: "Lecturer mobile Number cannot be empty",icon: "error",}); 
        }
        else if(form.mobile.value.length != 10) {
            swal({ title: "Missing",text: "Lecturer mobile Number must have 10 digits",icon: "error",});
        }
        else if(form.email3.value == "")
        {
            swal({ title: "Missing",text: "Lecturer e-mail cannot be empty",icon: "error",}); 
        }
        else if(!check.test(form.email.value))
        {
            swal({ title: "Missing",text: "Lecturer e-mail cannot be invalid",icon: "error",});
        }
        else if(form.registerPassword3.value == "")
        {
            swal({ title: "Missing",text: "Password cannot be empty",icon: "error",}); 
        }
        else if(form.registerPasswordConfirmation3.value == "")
        {
            swal({ title: "Missing",text: "Confirm Password cannot be empty",icon: "error",}); 
        }
        else if(form.registerPassword3.value != form.registerPasswordConfirmation3.value)
        {
            swal({ title: "Error",text: "Passwords do not match ",icon: "error",}); 
        }
        else
        {
            ULLL = null;
            ULLL = new XMLHttpRequest();
            ULLL.open("POST","./assets/php/update_lecturer.php",true);
            ULLL.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ULLL.onreadystatechange = onAddCompleteULLL;
            var msg = "name=" + form.name3.value + "&mobile=" + form.mobile3.value + "&email=" + form.email3.value + "&password=" + form.registerPassword3.value;
            ULLL.send(msg);
        }
}

function onAddCompleteULLL()
{
    var form = document.getElementById("updateLecturer");
        if(ULLL.readyState == 4){
            if(ULLL.status == 200){
                var retVal = ULLL.responseText;
                if(retVal == 'FAIL')
                    swal({ title: "Error",text: "Update Unsuccessful",icon: "error",});
                else if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Update successful",icon: "success",});
                    view();
                    form.reset();
                }
                else
                    swal({ title: "Error",text: "Internal Server error "+ ULLL.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + ULLL.responseText);
            }
            ULLL = null;
        }
}