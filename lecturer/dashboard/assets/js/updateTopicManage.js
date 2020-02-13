function edit_topic(element)
{
    var table = document.getElementById("TOTABLE");
    rowId = element.id;
    topicID = table.rows[rowId].cells[0].innerHTML;
    name = table.rows[rowId].cells[1].innerHTML;
    description = table.rows[rowId].cells[2].innerHTML;
    course = table.rows[rowId].cells[3].innerHTML;
    
    document.getElementById("topicName3").value = name;
    document.getElementById("topicDescription3").value = description;
    getYearSemesterbyModule();
    moduleLoad3();
    document.getElementById("module3").value = course;
    $("#module3").selectpicker("refresh");

}

function getYearSemesterbyModule()
{
            CBG = null;
            CBG = new XMLHttpRequest();
            CBG.open("POST","./assets/php/get_year_semester_by_module.php",false);
            CBG.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            CBG.onreadystatechange = onAddCompleteCBG;
            var msg = "module=" + course;
            CBG.send(msg);
}

function onAddCompleteCBG()
{
        if(CBG.readyState == 4){
            if(CBG.status == 200){
                var retVal = CBG.responseText;
                
                if(CBG.responseText != "0")
                {
                    var retVal = JSON.parse(CBG.responseText);
                    year = retVal["year"];
                    semester = retVal["semester"];
                    document.getElementById("year3").value = year;
                    document.getElementById("semester3").value = semester;
                    $("#year3").selectpicker("refresh");
                    $("#semester3").selectpicker("refresh");
                }
                    
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + CBG.responseText);
            }
            CBG = null;
        }
}

function moduleLoad3()
{
        var ye = document.getElementById("year3");
        var year = ye.options[ye.selectedIndex].value;
        var se = document.getElementById("semester3");
        var semester = se.options[se.selectedIndex].value;
        
        if(semester == "" && year == "")
        {
            //DO nothing
        }
        else if(year == '1')
        {
            document.getElementById("semester3").selectedIndex = 2;
            $("#semester3").prop("disabled", true);
            $("#semester3").selectpicker("refresh");
            $("#module3").prop("disabled", true);
            $("#module3").selectpicker("refresh");
            
            MDT = null;
            MDT = new XMLHttpRequest();
            MDT.open("POST","./assets/php/get_modules.php",false);
            MDT.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            MDT.responseType = JSON;
            MDT.onreadystatechange = onAddCompleteMDT;
            var msg = "year=1&semester=2";
            MDT.send(msg);
        }
        else
        {
            
            $("#semester3").prop("disabled", false);
            $("#semester3").selectpicker("refresh");
            $("#module3").prop("disabled", false);
            $("#module3").selectpicker("refresh");
            
            MDT = null;
            MDT = new XMLHttpRequest();
            MDT.open("POST","./assets/php/get_modules.php",false);
            MDT.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            MDT.responseType = JSON;
            MDT.onreadystatechange = onAddCompleteMDT;
            var msg = "year=" + year + "&semester=" + semester;
            MDT.send(msg);
            
 
        }
        
}

function onAddCompleteMDT()
{
        if(MDT.readyState == 4){
            if(MDT.status == 200){
                var opta1 = document.getElementById("module3");
                if(MDT.responseText != '"NO DATA"')
                {
                    var retVal = JSON.parse(MDT.responseText);
                    var count = retVal["count"];
                    var i;
                    while(opta1.options.length > 0)
                    {
                        opta1.remove(0);
                    }
                    for(i = 0; i < count; i++)
                    {
                        $("#module3").selectpicker();
                        $("#module3").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["name"]+'</option>');
                        $("#module3").selectpicker("refresh");

                    }
                }
                else
                {
                    while(opta1.options.length > 0)
                    {
                        opta1.remove(0);
                    }
                    $("#module3").selectpicker("refresh");
                }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + MDT.responseText);
            }
            MDT = null;
        }
}

function update_topic_manage()
{
        var form = document.getElementById("updateTopic");
        
        if(form.year3.value == "")
        {
            swal({ title: "Missing",text: "Year cannot be empty", icon:"error"});
        }
        else if(form.semester3.value == "")
        {
            swal({ title: "Missing",text: "Semester cannot be empty",icon: "error",}); 
        }
        else if(form.module3.value == "")
        {
            swal({ title: "Missing",text: "Module cannot be empty",icon: "error",}); 
        }
        else if(form.topicName3.value == "")
        {
            swal({ title: "Missing",text: "Topic name cannot be empty",icon: "error",}); 
        }
        else if(form.topicDescription3.value == "")
        {
            swal({ title: "Missing",text: "Topic description cannot be empty",icon: "error",}); 
        }
        else
        {
            ACD = null;
            ACD = new XMLHttpRequest();
            ACD.open("POST","./assets/php/update_topic.php",true);
            ACD.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ACD.onreadystatechange = onAddCompleteACD;
            var msg = "id=" + topicID + "&name=" + form.topicName3.value + "&description=" + form.topicDescription3.value +"&module=" + form.module3.value;
            ACD.send(msg);
        }
}

function onAddCompleteACD()
{
    var form = document.getElementById("updateTopic");
        if(ACD.readyState == 4){
            if(ACD.status == 200){
                var retVal = ACD.responseText;
                
                if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Topic update successful",icon: "success",});
                    viewTopicsAll();
                    form.reset();
                }
                else
                    swal({ title: "Error",text: "Internal Server error "+ ACD.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + ACD.responseText);
            }
            ACD = null;
        }
}