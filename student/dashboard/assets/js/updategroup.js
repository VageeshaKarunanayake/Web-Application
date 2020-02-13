function edit_module(element)
{
    var table = document.getElementById("MOTABLE");
    rowId = element.id;
    
     STL3 = null;
     STL3 = new XMLHttpRequest();
     STL3.open("POST","./assets/php/getdata.php",true);
     STL3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     STL3.responseType = JSON;
     STL3.onreadystatechange = datatomodal;
     var msg = "rid=" + rowId;
     STL3.send(msg);
    
}
function datatomodal()
{
        if(STL3.readyState == 4){
            if(STL3.status == 200){
                    if(STL3.responseText != "")
                    {
                        
                        var retVal = JSON.parse(STL3.responseText);
                        var count = retVal["count"];
                        var groupname = retVal["name"];
                        var year = retVal["year"];
                        var semester = retVal["semester"];
                        var MC3 = retVal["course"];
                        var id3 = retVal["id"];
                        var mmc = retVal["student_count"]; 
                 document.getElementById("id3").value = id3;       
                 document.getElementById("groupName3").value = groupname;
                 document.getElementById("year3").value =  year;
                 document.getElementById("semester3").value = semester;
                 document.getElementById("MC3").value = MC3;
                 document.getElementById("memCount3").value = mmc;
                 getModuleForGroup();
                 studentLoad3();
                    }

               }
               else{
                   alert("Async call failed.ResponseText was:\n" + STL3.responseText);
            }
            
        }
}
function getModuleForGroup()
{
            CBG = null;
            CBG = new XMLHttpRequest();
            CBG.open("POST","./assets/php/get_course_by_group.php",false);
            CBG.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            CBG.onreadystatechange = onAddCompleteCBG;
            var msg = "gid=" + rowId;
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

function studentLoad3()
{
     module = document.getElementById("MC3").value;
        if(module !== "")
        {
            STL3 = null;
            STL3 = new XMLHttpRequest();
            STL3.open("POST","./assets/php/get_students_for_update_group.php",true);
            STL3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            STL3.responseType = JSON;
            STL3.onreadystatechange = onAddCompleteSTL3;
            year = document.getElementById("year3").value;
            semester = document.getElementById("semester3").value;
            groupName = document.getElementById("groupName3").value;
            var msg = "module=" + module + "&prorata=" + 0 + "&year=" + year + "&semester=" + semester + "&gid=" + groupName;
            STL3.send(msg);
        }
}

function onAddCompleteSTL3()
{
        if(STL3.readyState == 4){
            if(STL3.status == 200){
                    var opta2 = document.getElementById("members3");
                    if(STL3.responseText != "")
                    {
                        
                        var retVal = JSON.parse(STL3.responseText);
                        var count = retVal["count"];
                        var i;
                        while(opta2.options.length > 0)
                        {
                            opta2.remove(0);
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
                        while(opta2.options.length > 0)
                        {
                            opta2.remove(0);
                            $("#members3").selectpicker("refresh");
                        }
                    }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + STL3.responseText);
            }
            STL3 = null;
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
                    swal({ title: "Sucess",text: "Group update successful",icon: "success",});
                    viewModules();
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