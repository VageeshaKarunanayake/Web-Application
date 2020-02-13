function dashboardLoad()
{
            DASL = null;
            DASL = new XMLHttpRequest();
            DASL.open("POST","./assets/php/dashboard_data.php",true);
            DASL.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            DASL.responseType = JSON;
            DASL.onreadystatechange = onAddCompleteDASL;
            DASL.send();
}


function onAddCompleteDASL()
{
        if(DASL.readyState == 4){
            if(DASL.status == 200){
                    var retVal = JSON.parse(DASL.responseText);
                    
                    var course = retVal["course"];
                    var group = retVal["group"];
                    var regular = retVal["regular"];
                    var prorata = retVal["prorata"];
                    var topic = retVal["topic"];
                    
                    document.getElementById("module_count").innerHTML = course;
                    document.getElementById("group_count").innerHTML = group;
                    document.getElementById("regular_students").innerHTML = regular;
                    document.getElementById("prorata_students").innerHTML = prorata;
                    document.getElementById("topic_count").innerHTML = topic;
                    
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + DASL.responseText);
            }
            DASL = null;
        }
}