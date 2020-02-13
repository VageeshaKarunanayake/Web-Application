function edit_topic(element)
{
    var table = document.getElementById("VTTABLE");
    rowId = element.id;
    groupName = table.rows[rowId].cells[0].innerHTML;
    topicID = table.rows[rowId].cells[2].innerHTML;

    document.getElementById("groupName3").value = groupName;
    
    getGroupDetails();
    topicLoad3();
}

function getGroupDetails()
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
                    year = retVal["year"];
                    semester = retVal["semester"];
                    document.getElementById("MC3").value = module;
                    document.getElementById("year3").value = year;
                    document.getElementById("semester3").value = semester;
                }
                    
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + CBG.responseText);
            }
            CBG = null;
        }
}

function topicLoad3()
{
        
        if(module != "")
        {
            TLLL = null;
            TLLL = new XMLHttpRequest();
            TLLL.open("POST","./assets/php/get_topics.php",true);
            TLLL.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            TLLL.responseType = JSON;
            TLLL.onreadystatechange = onAddCompleteTLLL;
            var msg = "module=" + module;
            TLLL.send(msg);
        }
}


function onAddCompleteTLLL()
{
        if(TLLL.readyState == 4){
            if(TLLL.status == 200){
                var opta3 = document.getElementById("topic3");
                if(TLLL.responseText != "")
                {
                    var retVal = JSON.parse(TLLL.responseText);
                    var count = retVal["count"];
                    var i;
                    while(opta3.options.length > 0)
                    {
                        opta3.remove(0);
                    }
                    for(i = 0; i < count; i++)
                    {
                        $("#topic3").selectpicker();
                        $("#topic3").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["name"]+' &nbsp &nbsp used - '+retVal[i]["count"]+'</option>');
                        $("#topic3").selectpicker("refresh");

                    }
                    document.getElementById("topic3").value = topicID;
                    $("#topic3").selectpicker("refresh");
                }
                else
                {
                    while(opta3.options.length > 0)
                    {
                        opta3.remove(0);
                    }
                    $("#topic3").selectpicker("refresh");
                }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + TLLL.responseText);
            }
            TLLL = null;
        }
}

function update_topic_allocation()
{
        var form = document.getElementById("updateTopic");
        
        if(form.topic3.value == "")
        {
            swal({ title: "Missing",text: "Topic cannot be empty",icon: "error",}); 
        }
        else
        {
            UTAA = null;
            UTAA = new XMLHttpRequest();
            UTAA.open("POST","./assets/php/update_group_topic.php",true);
            UTAA.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            UTAA.onreadystatechange = onAddCompleteUTAA;
            var prorata=0;
            var msg = "gid=" + form.groupName3.value + "&tid=" + form.topic3.value;
            UTAA.send(msg);
        }
}

function onAddCompleteUTAA()
{
    var form = document.getElementById("updateTopic");
        if(UTAA.readyState == 4){
            if(UTAA.status == 200){
                var retVal = UTAA.responseText;
                if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Topic update successful",icon: "success",});
                    viewTopicsAll();
                    form.reset();
                }
                else if (retVal == 'FAIL')
                    swal({ title: "Error",text: "Topic update unsuccessful",icon: "error",});
                else
                    swal({ title: "Error",text: "Internal Server error "+ UTAA.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + UTAA.responseText);
            }
            UTAA = null;
        }
}