function edit_module(element)
{
    oldModule = element.id;
    document.getElementById("moduleCode3").value = oldModule;

}

function update_module()
{
        var form = document.getElementById("updateModule");
        
        if(form.moduleName3.value == "")
        {
            swal({ title: "Missing",text: "Module name cannot be empty", icon:"error"});
        }
        else if(form.moduleCode3.value == "")
        {
            swal({ title: "Missing",text: "Module code cannot be empty",icon: "error",}); 
        }
        else if(form.year3.value == "")
        {
            swal({ title: "Missing",text: "Year cannot be empty",icon: "error",}); 
        }
        else if(form.semester3.value == "")
        {
            swal({ title: "Missing",text: "Semester cannot be empty",icon: "error",}); 
        }
        else
        {
            UPDMM = null;
            UPDMM = new XMLHttpRequest();
            UPDMM.open("POST","./assets/php/update_course.php",true);
            UPDMM.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            UPDMM.onreadystatechange = onAddCompleteUPDMM;
            var msg = "old_code=" + oldModule + "&new_code=" + form.moduleCode3.value + "&new_name=" + form.moduleName3.value +"&year=" + form.year3.value + "&semester=" + form.semester3.value;
            UPDMM.send(msg);
        }
}

function onAddCompleteUPDMM()
{
    var form = document.getElementById("updateModule");
        if(UPDMM.readyState == 4){
            if(UPDMM.status == 200){
                var retVal = UPDMM.responseText;
                
                if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Module update successful",icon: "success",});
                    viewModulesAll();
                    form.reset();
                }
                else if (retVal == 'FAIL')
                    swal({ title: "Error",text: "Module update unsuccessful",icon: "error",});
                else
                    swal({ title: "Error",text: "Internal Server error "+ UPDMM.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + UPDMM.responseText);
            }
            UPDMM = null;
        }
}