function edit_profile(element)
{
    var table = document.getElementById("viewTable");
    rowId = element.id;
    var sid = table.rows[rowId].cells[0].innerHTML;
    var name = table.rows[rowId].cells[1].innerHTML;
    var mobile = table.rows[rowId].cells[2].innerHTML;
    var email = table.rows[rowId].cells[3].innerHTML;
    var year = table.rows[rowId].cells[4].innerHTML;
    var semester = table.rows[rowId].cells[5].innerHTML;
    var prorata = table.rows[rowId].cells[6].innerHTML;
    
    document.getElementById("username3").value = sid;
    document.getElementById("name3").value = name;
    document.getElementById("mobile3").value = mobile;
    document.getElementById("email3").value = email;
    document.getElementById("year3").selectedIndex = year;
    $("#year3").selectpicker();
    $("#year3").selectpicker("refresh");
    
    document.getElementById("semester3").selectedIndex = semester;
    $("#semester3").selectpicker();
    $("#semester3").selectpicker("refresh");
    
    /*if (prorata == "Yes")
    {
        document.getElementById("prorata3").checked = true;
    }
    else
    {
        document.getElementById("prorata3").checked = false;
    } */
    
    
}

function year_change3()
{
    year = document.getElementById("year3").value;
    if(year == '1')
    {
            document.getElementById("semester3").selectedIndex = 2;
            $("#semester3").prop("disabled", true);
            $("#semester3").selectpicker("refresh");
    }
    else
    {
        $("#semester3").prop("disabled", false);
        $("#semester3").selectpicker("refresh");
    }
}

function update_student()
{
        var form = document.getElementById("updateStudent");
        var x;
        
        if(form.name3.value == "")
        {
            swal({ title: "Missing",text: "Student name cannot be empty", icon:"error"});
        }
        else if(form.gpa3.value == "")
        {
            swal({ title: "Missing",text: "GPA cannot be empty",icon: "error",}); 
        }
        else if(form.mobile3.value == "")
        {
            swal({ title: "Missing",text: "Student mobile Number cannot be empty",icon: "error",}); 
        }
        else if(form.email3.value == "")
        {
            swal({ title: "Missing",text: "Student e-mail cannot be empty",icon: "error",}); 
        }
        else if(form.year3.value == "")
        {
            swal({ title: "Missing",text: "Year cannot be empty",icon: "error",}); 
        }
        else if(form.semester3.value == "")
        {
            swal({ title: "Missing",text: "Semester cannot be empty",icon: "error",}); 
        }
        else if(form.prorata3.value == "")
        {
            swal({ title: "Missing",text: "Please select the student type",icon: "error",}); 
        }
        else
        {
            if(form.prorata3.checked == true)
                    x = 1;
            else
                    x = 0;

            USSS = null;
            USSS = new XMLHttpRequest();
            USSS.open("POST","./assets/php/update_student.php",true);
            USSS.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            USSS.onreadystatechange = onAddCompleteUSSS;
            var msg = "id=" + form.username3.value.toUpperCase() + "&name=" + form.name3.value + "&gpa=" + form.gpa3.value + "&mobile=" + form.mobile3.value + "&email=" + form.email3.value + "&year=" + form.year3.value + "&semester=" + form.semester3.value + "&prorata=" + x;
            USSS.send(msg);
        }
}

function onAddCompleteUSSS()
{
    var form = document.getElementById("updateStudent");
        if(USSS.readyState == 4){
            if(USSS.status == 200){
                var retVal = USSS.responseText;
                if(retVal == '1')
                    swal({ title: "Error",text: "All the fields have not been provided to the server",icon: "error",});
                else if(retVal == '3')
                    swal({ title: "Missing",text: "Update Unsuccessful",icon: "error",});
                else if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Update successful",icon: "success",});
                    view();
                    form.reset();
                }
                else
                    swal({ title: "Error",text: "Internal Server error "+ USSS.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + USSS.responseText);
            }
            USSS = null;
        }
}