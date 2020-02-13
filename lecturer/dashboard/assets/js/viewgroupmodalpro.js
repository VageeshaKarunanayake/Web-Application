function v_group(element)
{
    var table = document.getElementById("VETABLE");
    rowId = element.id;
    groupName = table.rows[rowId].cells[0].innerHTML;
    year = table.rows[rowId].cells[3].innerHTML;
    semester = table.rows[rowId].cells[4].innerHTML;
    
    document.getElementById("groupName4").value = groupName;
    document.getElementById("year4").value = year;
    document.getElementById("semester4").value = semester;
    getModuleForGroup_prorata_student_view();
    studentLoad4();
    
}

function getModuleForGroup_prorata_student_view()
{
            CBGRE = null;
            CBGRE = new XMLHttpRequest();
            CBGRE.open("POST","./assets/php/get_course_by_group.php",false);
            CBGRE.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            CBGRE.onreadystatechange = onAddCompleteCBGRE;
            var msg = "gid=" + groupName;
            CBGRE.send(msg);
}

function onAddCompleteCBGRE()
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
        if(module != "")
        {
            STLTL3 = null;
            STLTL3 = new XMLHttpRequest();
            STLTL3.open("POST","./assets/php/getstudent_view.php",true);
            STLTL3.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            STLTL3.responseType = JSON;
            STLTL3.onreadystatechange = onAddCompleteSTLTL3;
            var msg = "module=" + module + "&prorata=" + 0 + "&year=" + year + "&semester=" + semester + "&gid=" + groupName;
            STLTL3.send(msg);
        }
}

/* function onAddCompleteSTLTL3()
{
        if(STLTL3.readyState == 4){
            if(STLTL3.status == 200){
                    var opta2 = document.getElementById("members4");
                    if(STLTL3.responseText != "")
                    {
                        
                        var retVal = JSON.parse(STLTL3.responseText);
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
                        document.getElementById("memCount4").value = count;
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
                   alert("Async call failed.ResponseText was:\n" + STLTL3.responseText);
            }
            STLTL3 = null;
        }
}

*/
function onAddCompleteSTLTL3()
{
        if(STLTL3.readyState == 4){
            if(STLTL3.status == 200){
                var table = document.getElementById("SHOWTABLE");
                if(STLTL3.responseText != "")
                {
                    var retVal = JSON.parse(STLTL3.responseText);
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

