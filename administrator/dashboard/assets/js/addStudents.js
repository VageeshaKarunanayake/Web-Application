function year_change()
{
    year = document.getElementById("year").value;
    if(year == '1')
    {
            document.getElementById("semester").selectedIndex = 2;
            $("#semester").prop("disabled", true);
            $("#semester").selectpicker("refresh");
    }
    else
    {
        $("#semester").prop("disabled", false);
        $("#semester").selectpicker("refresh");
    }
}
function register()
{
        var form = document.getElementById("RegisterStudent");
        var x;
        var check = /\S+@\S+\.\S+/;
        
        if(form.name.value == "")
        {
            swal({ title: "Missing",text: "Student name cannot be empty", icon:"error"});
        }
        else if(form.username.value == "")
        {
            swal({ title: "Missing",text: "StudentID cannot be empty",icon: "error",}); 
        }
        else if(form.gpa.value == "")
        {
            swal({ title: "Missing",text: "GPA cannot be empty",icon: "error",}); 
        }
        else if(form.mobile.value == "")
        {
            swal({ title: "Missing",text: "Student mobile Number cannot be empty",icon: "error",}); 
        }
        else if(form.mobile.value.length != 10) {
            swal({ title: "Missing",text: "Student mobile Number must have 10 digits",icon: "error",});
        }
        else if(form.email.value == "")
        {
            swal({ title: "Missing",text: "Student e-mail cannot be empty",icon: "error",}); 
        }
        else if(!check.test(form.email.value))
        {
            swal({ title: "Missing",text: "Administrator e-mail cannot be invalid",icon: "error",});
        }
        else if(form.year.value == "")
        {
            swal({ title: "Missing",text: "Year cannot be empty",icon: "error",}); 
        }
        else if(form.semester.value == "")
        {
            swal({ title: "Missing",text: "Semester cannot be empty",icon: "error",}); 
        }
        else if(form.prorata.value == "")
        {
            swal({ title: "Missing",text: "Please select the student type",icon: "error",}); 
        }
        else
        {
            if(form.prorata.checked == true)
                    x = 1;
            else
                    x = 0;

            RS = null;
            RS = new XMLHttpRequest();
            RS.open("POST","./assets/php/add_student.php",true);
            RS.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            RS.onreadystatechange = onAddCompleteRS;
            var msg = "id=" + form.username.value.toUpperCase() + "&name=" + form.name.value + "&gpa=" + form.gpa.value + "&mobile=" + form.mobile.value + "&email=" + form.email.value + "&year=" + form.year.value + "&semester=" + form.semester.value + "&prorata=" + x;
            RS.send(msg);
        }
}

function onAddCompleteRS()
{
    var form = document.getElementById("RegisterStudent");
        if(RS.readyState == 4){
            if(RS.status == 200){
                var retVal = RS.responseText;
                if(retVal == '1')
                    swal({ title: "Error",text: "All the fields have not been provided to the server",icon: "error",});
                else if(retVal == '3')
                    swal({ title: "Missing",text: "Registration Unsuccessful",icon: "error",});
                else if (retVal == '10')
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