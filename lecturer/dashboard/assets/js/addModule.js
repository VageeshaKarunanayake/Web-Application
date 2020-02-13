function create_module()
{
        var form = document.getElementById("addModule");
        var x;
        
        if(form.moduleName.value == "")
        {
            swal({ title: "Missing",text: "Module name cannot be empty", icon:"error"});
        }
        else if(form.moduleCode.value == "")
        {
            swal({ title: "Missing",text: "Module code cannot be empty",icon: "error",}); 
        }
        else if(form.year.value == "")
        {
            swal({ title: "Missing",text: "Year cannot be empty",icon: "error",}); 
        }
        else if(form.semester.value == "")
        {
            swal({ title: "Missing",text: "Semester cannot be empty",icon: "error",}); 
        }
        else
        {
            ACD = null;
            ACD = new XMLHttpRequest();
            ACD.open("POST","./assets/php/add_course.php",true);
            ACD.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ACD.onreadystatechange = onAddCompleteACD;
            var prorata=0;
            var msg = "id=" + form.moduleCode.value + "&name=" + form.moduleName.value + "&year=" + form.year.value + "&semester=" + form.semester.value;
            ACD.send(msg);
        }
}

function onAddCompleteACD()
{
    var form = document.getElementById("addModule");
        if(ACD.readyState == 4){
            if(ACD.status == 200){
                var retVal = ACD.responseText;
                
                if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Module addition successful",icon: "success",});
                    viewModulesAll();
                    form.reset();
                }
                else if (retVal == 'FAIL')
                    swal({ title: "Error",text: "Module addition unsuccessful",icon: "error",});
                else
                    swal({ title: "Error",text: "Internal Server error "+ ACD.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + ACD.responseText);
            }
            ACD = null;
        }
}