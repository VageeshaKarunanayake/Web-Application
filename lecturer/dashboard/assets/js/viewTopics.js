function moduleLoad2()
{
        var ye = document.getElementById("year2");
        var year = ye.options[ye.selectedIndex].value;
        var se = document.getElementById("semester2");
        var semester = se.options[se.selectedIndex].value;
        if(semester == "" && year == "")
        {
            //DO nothing
        }
        else if(year == '1')
        {
            document.getElementById("semester2").selectedIndex = 2;
            $("#semester2").prop("disabled", true);
            $("#semester2").selectpicker("refresh");
            $("#MC2").prop("disabled", true);
            $("#MC2").selectpicker("refresh");
            
            MDT = null;
            MDT = new XMLHttpRequest();
            MDT.open("POST","./assets/php/get_modules.php",true);
            MDT.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            MDT.responseType = JSON;
            MDT.onreadystatechange = onAddCompleteMDT;
            var msg = "year=1&semester=2";
            MDT.send(msg);
        }
        else
        {
            
            $("#semester2").prop("disabled", false);
            $("#semester2").selectpicker("refresh");
            $("#MC2").prop("disabled", false);
            $("#MC2").selectpicker("refresh");
            
            MDT = null;
            MDT = new XMLHttpRequest();
            MDT.open("POST","./assets/php/get_modules.php",true);
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
                var opta1 = document.getElementById("MC2");
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
                        $("#MC2").selectpicker();
                        $("#MC2").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["name"]+'</option>');
                        $("#MC2").selectpicker("refresh");

                    }
                    viewTopics();
                }
                else
                {
                    while(opta1.options.length > 0)
                    {
                        opta1.remove(0);
                    }
                    $("#MC2").selectpicker("refresh");
                }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + MDT.responseText);
            }
            MDT = null;
        }
}

function viewTopics()
{
    var mod = document.getElementById("MC2");
    var module = mod.options[mod.selectedIndex].value;
    
    TVT = null;
    TVT = new XMLHttpRequest();
    TVT.open("POST","./assets/php/get_topic_allocation.php",true);
    TVT.onreadystatechange = onAddCompleteTVT;
    TVT.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    TVT.responseType = JSON;
    var prorata=0;
    var msg = "module=" + module + "&prorata=" + prorata;
    TVT.send(msg);
}

function onAddCompleteTVT()
{
        if(TVT.readyState == 4){
            if(TVT.status == 200){
                var table = document.getElementById("VTTABLE");
                if(TVT.responseText != "")
                {
                    var retVal = JSON.parse(TVT.responseText);
                    var count = retVal["count"];
                    
                    for(var z = table.rows.length - 1; z > 0; z--)
                        table.deleteRow(z);
                    
                    for(i = 0; i < count; i++)
                    {
                        var row = table.insertRow(i+1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        
                        cell1.className = "text-center";
                        cell4.className = "text-right";
                        cell5.className = "text-right";
                        
                        cell1.innerHTML = retVal[i]["gid"];
                        cell1.id = retVal[i]["gid"];
                        cell2.innerHTML = retVal[i]["group"];
                        cell3.innerHTML = retVal[i]["tid"];
                        cell3.id = retVal[i]["tid"];
                        cell4.innerHTML = retVal[i]["topic"];
                        cell5.innerHTML = "<a onclick='edit_topic(this)' data-toggle='modal' data-target='#myModal' id='"+(i+1)+"' rel='tooltip' title='Edit Profile' class='btn btn-success btn-link btn-xs'><i class='fa fa-edit'></i></a>   <a onclick='remove_topic(this)' id='"+retVal[i]["tid"]+"' name='"+retVal[i]["gid"]+"' rel='tooltip' title='Remove' class='btn btn-danger btn-link btn-xs'><i class='fa fa-times'></i></a>";
                        // tid as id and gid as name 
                    }
                }
                    else
                    {
                        for(var z = table.rows.length - 1; z > 0; z--)
                        table.deleteRow(z);
                    }
                    
                }
               else{
                   alert("Async call failed.ResponseText was:\n" + TVT.responseText);
            }
            TVT = null;
        }
}

function remove_topic(element)
{
    
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    }).then(function (result)
    {
          if (result.value)
          {
            swal("Topic Record not Deleted!");
          } 
          else 
          {
            rowIndex = element.parentNode.parentNode.rowIndex;     
            RTS = null;
            RTS = new XMLHttpRequest();
            RTS.open("POST","./assets/php/delete_topic_allocation.php",true);
            RTS.onreadystatechange = onAddCompleteRTS;
            RTS.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            var msg = "tid=" + element.id + "&gid=" + element.name;
            RTS.send(msg);
          }
        });

}

function onAddCompleteRTS()
{
        if(RTS.readyState == 4){
            if(RTS.status === 200){
                var table = document.getElementById("VTTABLE");
                var retVal = RTS.responseText;
                
                if(retVal == 'FAIL')
                    swal({ title: "Error",text: "Topic Deletion Unsuccessful",icon: "error",});
                else if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Topic Deleted",icon: "success",});
                    table.deleteRow(rowIndex);
                }
                else
                    swal({ title: "Error",text: "Internal Server error "+ RTS.responseText,icon: "error",});
                    
                }
               else{
                   alert("Async call failed.ResponseText was:\n" + RTS.responseText);
            }
            RTS = null;
        }
}