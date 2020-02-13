function v_module(element)
{
    var table = document.getElementById("MOTABLE");
    rowId = element.id;
    
     STL3 = null;
     STL3 = new XMLHttpRequest();
     STL3.open("POST","./assets/php/getdata.php",true);
     STL3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
     STL3.responseType = JSON;
     STL3.onreadystatechange = datatomodal2;
     var msg = "rid=" + rowId;
     STL3.send(msg);
    
}
function datatomodal2()
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
                 document.getElementById("id4").value = id3;       
                 document.getElementById("groupName4").value = groupname;
                 document.getElementById("year4").value =  year;
                 document.getElementById("semester4").value = semester;
                 document.getElementById("MC4").value = MC3;
                 document.getElementById("memCount4").value = mmc;
                 getModuleForGroup2();
                 studentLoad4();
                    }

               }
               else{
                   alert("Async call failed.ResponseText was:\n" + STL3.responseText);
            }
            
        }
}
function getModuleForGroup2()
{
            CBGRE = null;
            CBGRE = new XMLHttpRequest();
            CBGRE.open("POST","./assets/php/get_course_by_group.php",false);
            CBGRE.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            CBGRE.onreadystatechange = onAddCompleteCBGRE2;
            var msg = "gid=" + rowId;
            CBGRE.send(msg);
}

function onAddCompleteCBGRE2()
{
        if(CBGRE.readyState == 4){
            if(CBGRE.status == 200){
                var retVal = CBGRE.responseText;
                
                if(CBGRE.responseText != "NO DATA")
                {
                    var retVal = JSON.parse(CBGRE.responseText);
                    module = retVal["course"];
                    document.getElementById("MC4").value = module;
                }
                    
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + CBGRE.responseText);
            }
            CBGRE = null;
        }
}

function studentLoad4()
{
     module = document.getElementById("MC4").value;
        if(module !== "")
        {
            STL3 = null;
            STL3 = new XMLHttpRequest();
            STL3.open("POST","./assets/php/forview.php",true);
            STL3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            STL3.responseType = JSON;
            STL3.onreadystatechange = onAddCompleteSTL4;
            year = document.getElementById("year3").value;
            semester = document.getElementById("semester4").value;
            groupName = document.getElementById("groupName4").value;
            var msg = "module=" + module + "&prorata=" + 0 + "&year=" + year + "&semester=" + semester + "&gid=" + groupName;
            STL3.send(msg);
        }
}
/*
function onAddCompleteSTL4()
{
        if(STL3.readyState == 4){
            if(STL3.status == 200){
                    var opta2 = document.getElementById("members4");
                    if(STL3.responseText != "")
                    {
                        
                        var retVal = JSON.parse(STL3.responseText);
                        var count = retVal["count"];
                        var i;
                        while(opta2.options.length > 0)
                        {
                            opta2.remove(0);
                            $("#members4").selectpicker("refresh");
                        }
                        for(i = 0; i < count; i++)
                        {
                            $("#members4").selectpicker();
                            $("#members4").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["id"]+' - '+retVal[i]["name"]+'</option>');
                            $("#members4").selectpicker("refresh");
    
                        }
                        $('#members4').selectpicker('deselectAll');
                        $("#members4").selectpicker("refresh");
                       
                         
                    }
                    else
                    {
                        while(opta2.options.length > 0)
                        {
                            opta2.remove(0);
                            $("#members4").selectpicker("refresh");
                        }
                    }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + STL3.responseText);
            }
            STL3 = null;
        }
}
*/
function onAddCompleteSTL4()
{
        if(STL3.readyState == 4){
            if(STL3.status == 200){
                var table = document.getElementById("SHOWTABLE");
                if(STL3.responseText != "")
                {
                    var retVal = JSON.parse(STL3.responseText);
                    var count = retVal["count"];
                    
                    for(var x = table.rows.length - 1; x > 0; x--)
                    {
                        table.deleteRow(x);
                    }
                    
                    for(i = 0; i < count; i++)
                    {
                        var row = table.insertRow(i+1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        
                        cell1.className = "text-left";
                        cell2.className ="text-Center";
                        
                        cell1.innerHTML = retVal[i]["id"];
                        cell1.id = retVal[i]["id"];
                        cell2.innerHTML = retVal[i]["name"];
                    }
                     document.getElementById("memCount4").value = count;
                }
                else{
                    for(var x = table.rows.length - 1; x > 0; x--)
                    {
                        table.deleteRow(x);
                    }
                }
                }
               else{
                   alert("Async call failed.ResponseText was:\n" + VGA.responseText);
            }
            VGA = null;
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
        if(ASG.readyState == 4){
            if(ASG.status == 200){
                var retVal = ASG.responseText;
                
                if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Group update successful",icon: "success",});
                    viewModules();
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