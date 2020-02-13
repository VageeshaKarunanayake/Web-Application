function moduleLoad2()
{
        var ye = document.getElementById("year2");
        var year = ye.options[ye.selectedIndex].value;
        var se = document.getElementById("semester2");
        var semester = se.options[se.selectedIndex].value;
        
        if (semester == "" && year == "")
        {
            //Do nothing
        }
        else if(year == '1')
        {
            document.getElementById("semester2").selectedIndex = 2;
            $("#semester2").prop("disabled", true);
            $("#semester2").selectpicker("refresh");
            $("#module2").prop("disabled", true);
            $("#module2").selectpicker("refresh");
            
            VTMMM = null;
            VTMMM = new XMLHttpRequest();
            VTMMM.open("POST","./assets/php/get_modules.php",true);
            VTMMM.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            VTMMM.responseType = JSON;
            VTMMM.onreadystatechange = onAddCompleteVTMMM;
            var msg = "year=1&semester=2";
            VTMMM.send(msg);
        }
        else
        {
            
            $("#semester2").prop("disabled", false);
            $("#semester2").selectpicker("refresh");
            $("#module2").prop("disabled", false);
            $("#module2").selectpicker("refresh");
            
            VTMMM = null;
            VTMMM = new XMLHttpRequest();
            VTMMM.open("POST","./assets/php/get_modules.php",true);
            VTMMM.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            VTMMM.responseType = JSON;
            VTMMM.onreadystatechange = onAddCompleteVTMMM;
            var msg = "year=" + year + "&semester=" + semester;
            VTMMM.send(msg);
        }
}

function onAddCompleteVTMMM()
{
        if(VTMMM.readyState == 4){
            if(VTMMM.status == 200){
                if(VTMMM.responseText != '"NO DATA"')
                {
                    var opta1 = document.getElementById("module2");
                    var retVal = JSON.parse(VTMMM.responseText);
                    var count = retVal["count"];
                    var i;
                    while(opta1.options.length > 0)
                    {
                        opta1.remove(0);
                    }
                    for(i = 0; i < count; i++)
                    {
                        $("#module2").selectpicker();
                        $("#module2").append('<option value="'+retVal[i]["id"]+'" selected="">'+retVal[i]["name"]+'</option>');
                        $("#module2").selectpicker("refresh");

                    }
                    viewTopics();
                }
                else
                {
                    while(opta1.options.length > 0)
                    {
                        opta1.remove(0);
                    }
                    $("#module2").selectpicker("refresh");
                }
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + VTMMM.responseText);
            }
            VTMMM = null;
        }
}

function viewTopics()
{
    var mod = document.getElementById("module2");
    var module = mod.options[mod.selectedIndex].value;
    
    TVT = null;
    TVT = new XMLHttpRequest();
    TVT.open("POST","./assets/php/get_all_topic_by_module.php",true);
    TVT.onreadystatechange = onAddCompleteTVT;
    TVT.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    TVT.responseType = JSON;
    var msg = "cid=" + module;
    TVT.send(msg);
}

function onAddCompleteTVT()
{
        if(TVT.readyState == 4){
            if(TVT.status == 200){
                var table = document.getElementById("TOTABLE");
                if(TVT.responseText != "")
                {
                    var retVal = JSON.parse(TVT.responseText);
                    var count = retVal["count"];
                    
                    for(var z = table.rows.length - 1; z > 0; z--)
                        table.deleteRow(z);
                    
                    for(var i = 0; i < count; i++)
                    {
                        var row = table.insertRow(i+1);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        var cell6 = row.insertCell(5);
                        cell6.className = "text-right";
                        cell1.innerHTML = retVal[i]["id"];
                        cell1.id = retVal[i]["id"];
                        cell2.innerHTML = retVal[i]["name"];
                        cell3.innerHTML = retVal[i]["description"];
                        cell4.innerHTML = retVal[i]["course"];
                        cell5.innerHTML = retVal[i]["scount"];
                        cell6.innerHTML = "<a onclick='edit_group(this)' data-toggle='modal' data-target='#myModal' id='"+(i+1)+"' rel='tooltip' title='Edit Profile' class='btn btn-success btn-link btn-xs'><i class='fa fa-edit'></i></a>   <a onclick='remove_group(this)' id='"+retVal[i]["id"]+"' rel='tooltip' title='Remove' class='btn btn-danger btn-link btn-xs'><i class='fa fa-times'></i></a>";
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
            RTS.open("POST","./assets/php/delete_topic.php",true);
            RTS.onreadystatechange = onAddCompleteRTS;
            RTS.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            var msg = "id=" + element.id;
            RTS.send(msg);
          }
        });

}

function onAddCompleteRTS()
{
        if(RTS.readyState == 4){
            if(RTS.status === 200){
                var table = document.getElementById("TOTABLE");
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