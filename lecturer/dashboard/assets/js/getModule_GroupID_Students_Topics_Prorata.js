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
            $("#module").prop("disabled", true);
            $("#module").selectpicker("refresh");
            
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
            $("#module").prop("disabled", false);
            $("#module").selectpicker("refresh");
            
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
                if(PRO.responseText != '"NO DATA"')
                {
                    var opta1 = document.getElementById("module");
                    var retVal = JSON.parse(PRO.responseText);
                    var count = retVal["count"];
                    var i;
                    while(opta1.options.length > 0)
                    {
                        opta1.remove(0);
                    }
                    for(i = 0; i < count; i++)
                    {
                        $("#module").selectpicker();
                        $("#module").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["name"]+'</option>');
                        $("#module").selectpicker("refresh");

                    }
                    setID();
                    topicLoad();
                }
                else
                {
                    while(opta1.options.length > 0)
                    {
                        opta1.remove(0);
                    }
                    $("#module").selectpicker("refresh");
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
    var ye = document.getElementById("year");
    var year = ye.options[ye.selectedIndex].value;
    var se = document.getElementById("semester");
    var semester = se.options[se.selectedIndex].value;
    var mod = document.getElementById("module");
    var module = mod.options[mod.selectedIndex].value;
    
    
    SGN = null;
    SGN = new XMLHttpRequest();
    SGN.open("POST","./assets/php/get_unallocated_groups.php",true);
    SGN.onreadystatechange = onAddCompleteSGN;
    SGN.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    SGN.responseType = JSON;
    var msg = "year=" + year + "&semester=" + semester + "&module=" + module + "&prorata=" + 1;
    SGN.send(msg);
}

function onAddCompleteSGN()
{
        if(SGN.readyState == 4){
            if(SGN.status == 200){
               var opta2 = document.getElementById("group");
               if(SGN.responseText != "")
                {
                    var retVal = JSON.parse(SGN.responseText);
                    var count = retVal["count"];
                    var i;
                    while(opta2.options.length > 0)
                    {
                        opta2.remove(0);
                    }
                    for(i = 0; i < count; i++)
                    {
                        $("#group").selectpicker();
                        $("#group").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["name"]+'</option>');
                        $("#group").selectpicker("refresh");

                    }
                }
                 else
                {
                    while(opta2.options.length > 0)
                    {
                        opta2.remove(0);
                    }
                    $("#group").selectpicker("refresh");
                }
            }
               else{
                   alert("Async call failed.ResponseText was:\n" + SGN.responseText);
            }
            SGN = null;
        }
}

function ID_topic()
{
    setID();
    topicLoad();
}

function topicLoad()
{
        var mod = document.getElementById("module");
        var module = mod.options[mod.selectedIndex].value;
        
        if(module != "")
        {
            GTD = null;
            GTD = new XMLHttpRequest();
            GTD.open("POST","./assets/php/get_topics.php",true);
            GTD.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            GTD.responseType = JSON;
            GTD.onreadystatechange = onAddCompleteGTD;
            var msg = "module=" + module;
            GTD.send(msg);
        }
}


function onAddCompleteGTD()
{
        if(GTD.readyState == 4){
            if(GTD.status == 200){
                var opta3 = document.getElementById("topic");
                if(GTD.responseText != "")
                {
                    var retVal = JSON.parse(GTD.responseText);
                    var count = retVal["count"];
                    var i;
                    while(opta3.options.length > 0)
                    {
                        opta3.remove(0);
                    }
                    for(i = 0; i < count; i++)
                    {
                        $("#topic").selectpicker();
                        $("#topic").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["name"]+' &nbsp &nbsp used - '+retVal[i]["count"]+'</option>');
                        $("#topic").selectpicker("refresh");

                    }
                }
                else
                {
                    while(opta3.options.length > 0)
                    {
                        opta3.remove(0);
                    }
                    $("#topic").selectpicker("refresh");
                }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + GTD.responseText);
            }
            GTD = null;
        }
}