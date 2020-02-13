function edit_group(element)
{
    var table = document.getElementById("VETABLE");
    rowId = element.id;
    groupName = table.rows[rowId].cells[0].innerHTML;
    year = table.rows[rowId].cells[3].innerHTML;
    semester = table.rows[rowId].cells[4].innerHTML;
    
    document.getElementById("groupName3").value = groupName;
    document.getElementById("year3").value = year;
    document.getElementById("semester3").value = semester;
    
    getModuleForGroup();
    prorataStudentLoad3();
}

function getModuleForGroup()
{
            CBG = null;
            CBG = new XMLHttpRequest();
            CBG.open("POST","./assets/php/get_course_by_group.php",false);
            CBG.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            CBG.onreadystatechange = onAddCompleteCBG;
            var msg = "gid=" + groupName;
            CBG.send(msg);
}

function onAddCompleteCBG()
{
        if(CBG.readyState == 4){
            if(CBG.status == 200){
                var retVal = CBG.responseText;
                
                if(CBG.responseText != "NO DATA")
                {
                    var retVal = JSON.parse(CBG.responseText);
                    module = retVal["course"];
                    document.getElementById("MC3").value = module;
                }
                    
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + CBG.responseText);
            }
            CBG = null;
        }
}

function prorataStudentLoad3()
{
        if(module != "")
        {
            PSTL3 = null;
            PSTL3 = new XMLHttpRequest();
            PSTL3.open("POST","./assets/php/get_students_for_update_group.php",true);
            PSTL3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            PSTL3.responseType = JSON;
            PSTL3.onreadystatechange = onAddCompletePSTL3;
            var msg = "module=" + module + "&prorata=" + 1 + "&year=" + year + "&semester=" + semester;
            PSTL3.send(msg);
        }
}

function onAddCompletePSTL3()
{
        if(PSTL3.readyState == 4){
            if(PSTL3.status == 200){
                    var opta3 = document.getElementById("members3");
                    
                    if(PSTL3.responseText != "")
                    {
                        var retVal = JSON.parse(PSTL3.responseText);
                        var count = retVal["count"];
                        var i;
                        while(opta3.options.length > 0)
                        {
                            opta3.remove(0);
                            $("#members3").selectpicker("refresh");
                        }
                        for(i = 0; i < count; i++)
                        {
                            $("#members3").selectpicker();
                            $("#members3").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["id"]+' - '+retVal[i]["name"]+'</option>');
                            $("#members3").selectpicker("refresh");
    
                        }
                        $('#members3').selectpicker('deselectAll');
                        $("#members3").selectpicker("refresh");
                    }
                    else
                    {
                        while(opta3.options.length > 0)
                        {
                            opta3.remove(0);
                            $("#members3").selectpicker("refresh");
                        }
                    }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + PSTL3.responseText);
            }
            PSTL3 = null;
        }
}

function update_group()
{
        var form = document.getElementById("updateGroup");
        var x;
        
        if(form.year3.value == "")
        {
            swal({ title: "Missing",text: "Year cannot be empty", icon:"error"});
        }
        else if(form.semester3.value == "")
        {
            swal({ title: "Missing",text: "Semester cannot be empty",icon: "error",}); 
        }
        else if(form.MC3.value == "")
        {
            swal({ title: "Missing",text: "Module cannot be empty",icon: "error",}); 
        }
        else if(form.groupName3.value == "")
        {
            swal({ title: "Missing",text: "Group Name cannot be empty",icon: "error",}); 
        }
        else if(form.memCount3.value == "")
        {
            swal({ title: "Missing",text: "Member Count cannot be empty",icon: "error",}); 
        }
        else if(form.members3.value == "")
        {
            swal({ title: "Missing",text: "Members should be selected",icon: "error",}); 
        }
        else
        {
            var SLE = document.getElementById("members3");
            var selectedStudents = [];
            for (var i = 0; i < SLE.length; i++) {
                if (SLE.options[i].selected) 
                    selectedStudents.push(SLE.options[i].value);
    }
            ASG = null;
            ASG = new XMLHttpRequest();
            ASG.open("POST","./assets/php/update_group_students_by_id.php",true);
            ASG.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ASG.onreadystatechange = onAddCompleteASG;
            var prorata=0;
            var msg = "&id=" + form.groupName3.value + "&count=" + form.memCount3.value + "&members=" + selectedStudents;
            ASG.send(msg);
        }
}

function onAddCompleteASG()
{
    var form = document.getElementById("updateGroup");
        if(ASG.readyState == 4){
            if(ASG.status == 200){
                var retVal = ASG.responseText;
                
                if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Group Registration successful",icon: "success",});
                    viewGroupsAll();
                    form.reset();
                }
                else
                    swal({ title: "Error",text: "Internal Server error "+ ASG.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + ASG.responseText);
            }
            ASG = null;
        }
}