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
                    
                    var admin = retVal["admin"];
                    var lecturer = retVal["lecturer"];
                    var regular = retVal["regular"];
                    var prorata = retVal["prorata"];
                    
                    document.getElementById("administrators_count").innerHTML = admin;
                    document.getElementById("lecturers_count").innerHTML = lecturer;
                    document.getElementById("regular_students").innerHTML = regular;
                    document.getElementById("prorata_students").innerHTML = prorata;
                    
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + DASL.responseText);
            }
            DASL = null;
        }
}