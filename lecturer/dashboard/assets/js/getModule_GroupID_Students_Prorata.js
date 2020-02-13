function moduleLoad()
{
        var ye = document.getElementById("year");
        var year = ye.options[ye.selectedIndex].value;
        var se = document.getElementById("semester");
        var semester = se.options[se.selectedIndex].value;
        
        if (semester == "" && year == "")
        {
            //Do nothing
        }
        else if(year == '1')
        {
            document.getElementById("semester").selectedIndex = 2;
            $("#semester").prop("disabled", true);
            $("#semester").selectpicker("refresh");
            $("#MC").prop("disabled", true);
            $("#MC").selectpicker("refresh");
            
            PRO = null;
            PRO = new XMLHttpRequest();
            PRO.open("POST","./assets/php/get_modules.php",true);
            PRO.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            PRO.responseType = JSON;
            PRO.onreadystatechange = onAddCompletePRO;
            var msg = "year=" + year + "&semester=2";
            PRO.send(msg);
        }
        else
        {
            
            $("#semester").prop("disabled", false);
            $("#semester").selectpicker("refresh");
            $("#MC").prop("disabled", false);
            $("#MC").selectpicker("refresh");
            
            PRO = null;
            PRO = new XMLHttpRequest();
            PRO.open("POST","./assets/php/get_modules.php",true);
            PRO.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            PRO.responseType = JSON;
            PRO.onreadystatechange = onAddCompletePRO;
            var msg = "year=" + year + "&semester=" + semester;
            PRO.send(msg);
        }
}


function onAddCompletePRO()
{
        if(PRO.readyState == 4){
            if(PRO.status == 200){
                var opta1 = document.getElementById("MC");
                if(PRO.responseText != '"NO DATA"')
                {
                    var retVal = JSON.parse(PRO.responseText);
                    var count = retVal["count"];
                    var i;
                    while(opta1.options.length > 0)
                    {
                        opta1.remove(0);
                    }
                    for(i = 0; i < count; i++)
                    {
                        $("#MC").selectpicker();
                        $("#MC").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["name"]+'</option>');
                        $("#MC").selectpicker("refresh");

                    }
                    prorata_ID_StudentLoad();
                }
                else
                {
                    while(opta1.options.length > 0)
                    {
                        opta1.remove(0);
                    }
                    $("#MC").selectpicker("refresh");
                }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + PRO.responseText);
            }
            PRO = null;
        }
}

function setID()
{
    var mod = document.getElementById("MC");
    var module = mod.options[mod.selectedIndex].value;
    
    
    SGN = null;
    SGN = new XMLHttpRequest();
    SGN.open("POST","./assets/php/get_groupid.php",true);
    SGN.onreadystatechange = onAddCompleteSGN;
    SGN.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    SGN.responseType = JSON;
    var msg = "module=" + module;
    SGN.send(msg);
}

function onAddCompleteSGN()
{
        if(SGN.readyState == 4){
            if(SGN.status == 200){
                var field = document.getElementById("groupName");
                field.value = SGN.responseText;
                    
                }
               else{
                   alert("Async call failed.ResponseText was:\n" + SGN.responseText);
            }
            SGN = null;
        }
}

function prorata_ID_StudentLoad()
{
    setID();
    prorataStudentLoad()
}

function prorataStudentLoad()
{
        var mod = document.getElementById("MC");
        var module = mod.options[mod.selectedIndex].value;
        var ye = document.getElementById("year");
        var year = ye.options[ye.selectedIndex].value;
        var se = document.getElementById("semester");
        var semester = se.options[se.selectedIndex].value;
        
        if(module != "")
        {
            PSTL = null;
            PSTL = new XMLHttpRequest();
            PSTL.open("POST","./assets/php/get_students.php",true);
            PSTL.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            PSTL.responseType = JSON;
            PSTL.onreadystatechange = onAddCompletePSTL;
            var msg = "module=" + module + "&prorata=" + 1 + "&year=" + year + "&semester=" + semester;
            PSTL.send(msg);
        }
}

function onAddCompletePSTL()
{
        if(PSTL.readyState == 4){
            if(PSTL.status == 200){
                    var opta3 = document.getElementById("members");
                    
                    if(PSTL.responseText != "")
                    {
                        var retVal = JSON.parse(PSTL.responseText);
                        var count = retVal["count"];
                        var i;
                        while(opta3.options.length > 0)
                        {
                            opta3.remove(0);
                            $("#members").selectpicker("refresh");
                        }
                        for(i = 0; i < count; i++)
                        {
                            $("#members").selectpicker();
                            $("#members").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["id"]+' - '+retVal[i]["name"]+'</option>');
                            $("#members").selectpicker("refresh");
    
                        }
                        $('#members').selectpicker('deselectAll');
                        $("#members").selectpicker("refresh");
                    }
                    else
                    {
                        while(opta3.options.length > 0)
                        {
                            opta3.remove(0);
                            $("#members").selectpicker("refresh");
                        }
                    }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + PSTL.responseText);
            }
            PSTL = null;
        }
}