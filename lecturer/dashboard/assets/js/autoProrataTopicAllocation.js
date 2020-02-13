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
                var opta1 = document.getElementById("module");
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
                        $("#module").selectpicker();
                        $("#module").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["name"]+'</option>');
                        $("#module").selectpicker("refresh");

                    }
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


function prorata_topic_allocation_auto()
{
        var form = document.getElementById("autoPTopic");
        var x;
        
        if(form.year.value == "")
        {
            swal({ title: "Missing",text: "Year cannot be empty", icon:"error"});
        }
        else if(form.semester.value == "")
        {
            swal({ title: "Missing",text: "Semester cannot be empty",icon: "error",}); 
        }
        else if(form.module.value == "")
        {
            swal({ title: "Missing",text: "Module cannot be empty",icon: "error",}); 
        }
        else
        {
            ACD2 = null;
            ACD2 = new XMLHttpRequest();
            ACD2.open("POST","./assets/php/allocate_topic_auto_prorata.php",true);
            ACD2.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ACD2.onreadystatechange = onAddCompleteACD;
            var msg = "module=" + form.module.value;
            ACD2.send(msg);
        }
}

function onAddCompleteACD()
{
    var form = document.getElementById("autoPTopic");
        if(ACD2.readyState == 4){
            if(ACD2.status == 200){
                var retVal = ACD2.responseText;

                if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Groups topic allocation successful",icon: "success",});
                    form.reset();
                }
               else if (retVal == 'NO GROUPS')
                    swal({ title: "Error",text: "No groups found for topic allocation",icon: "error",});
                else if (retVal == 'NO TOPICS')
                    swal({ title: "Error",text: "No topics found for group allocation",icon: "error",});
                else if (retVal == 'FAIL')
                    swal({ title: "Error",text: "Groups topic allocation unsuccessful",icon: "error",});
                else
                    swal({ title: "Error",text: "Internal Server error "+ ACD2.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + ACD2.responseText);
            }
            ACD2 = null;
        }
}