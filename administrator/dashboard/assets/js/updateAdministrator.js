function edit_profile(element)
{
    var table = document.getElementById("viewTable");
    rowId = element.id;
    var username = table.rows[rowId].cells[0].innerHTML;
    var name = table.rows[rowId].cells[1].innerHTML;
    var mobile = table.rows[rowId].cells[2].innerHTML;
    var email = table.rows[rowId].cells[3].innerHTML;
    
    document.getElementById("username3").value = username;
    document.getElementById("name3").value = name;
    document.getElementById("mobile3").value = mobile;
    document.getElementById("email3").value = email;
}

function update_administrator()
{
        var form = document.getElementById("updateAdministrator");
        var check = /\S+@\S+\.\S+/;
        
        if(form.name3.value == "")
        {
            swal({ title: "Missing",text: "Administrator name cannot be empty", icon:"error"});
        }
        else if(form.mobile3.value == "")
        {
            swal({ title: "Missing",text: "Administrator mobile Number cannot be empty",icon: "error",}); 
        }
        else if(form.mobile.value.length != 10) {
            swal({ title: "Missing",text: "Administrator mobile Number must have 10 digits",icon: "error",});
        }
        else if(form.email3.value == "")
        {
            swal({ title: "Missing",text: "Administrator e-mail cannot be empty",icon: "error",}); 
        }
        else if(!check.test(form.email.value))
        {
            swal({ title: "Missing",text: "Administrator e-mail cannot be invalid",icon: "error",});
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
            UAAA = null;
            UAAA = new XMLHttpRequest();
            UAAA.open("POST","./assets/php/update_admin.php",true);
            UAAA.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            UAAA.onreadystatechange = onAddCompleteUAAA;
            var msg = "id=" + form.username.value.toUpperCase() + "&name=" + form.name.value + "&mobile=" + form.mobile.value + "&email=" + form.email.value + "&password=" + form.registerPassword3.value;
            UAAA.send(msg);
        }
}

function onAddCompleteUAAA()
{
    var form = document.getElementById("updateAdministrator");
        if(UAAA.readyState == 4){
            if(UAAA.status == 200){
                var retVal = UAAA.responseText;
                if(retVal == 'FAIL')
                    swal({ title: "Error",text: "Update Unsuccessful",icon: "error",});
                else if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Update successful",icon: "success",});
                    view();
                    form.reset();
                }
                else
                    swal({ title: "Error",text: "Internal Server error "+ UAAA.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + UAAA.responseText);
            }
            UAAA = null;
        }
}