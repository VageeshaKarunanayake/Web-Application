function onStart()
{
    viewGroupsAll();
}

function viewGroupsAll()
{
    VGA = null;
    VGA = new XMLHttpRequest();
    VGA.open("POST","./assets/php/get_all_groups.php",true);
    VGA.onreadystatechange = onAddCompleteVGA;
    VGA.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    VGA.responseType = JSON;
    var msg = "prorata=1";
    VGA.send(msg);
}

function onAddCompleteVGA()
{
        if(VGA.readyState == 4){
            if(VGA.status == 200){
                var table = document.getElementById("VETABLE");
                if(VGA.responseText != "")
                {
                    var retVal = JSON.parse(VGA.responseText);
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
                        var cell3 = row.insertCell(2);
                        var cell4 = row.insertCell(3);
                        var cell5 = row.insertCell(4);
                        var cell6 = row.insertCell(5);
                        
                        cell1.className = "text-center";
                        cell3.className = "text-left";
                        cell4.className = "text-right";
                        cell5.className = "text-right";
                        cell5.className = "text-right";
                        cell6.className = "text-right";
                        
                        cell1.innerHTML = retVal[i]["id"];
                        cell1.id = retVal[i]["id"];
                        cell2.innerHTML = retVal[i]["name"];
                        cell3.innerHTML = retVal[i]["memcount"];
                        cell4.innerHTML = retVal[i]["year"];
                        cell5.innerHTML = retVal[i]["semester"];
                        cell6.innerHTML = "<a onclick='edit_group(this)' data-toggle='modal' data-target='#myModal' id='"+(i+1)+"' rel='tooltip' title='Edit Profile' class='btn btn-success btn-link btn-xs'><i class='fa fa-edit'></i></a>  <a onclick='v_group(this)' data-toggle='modal' data-target='#myModalview' id='"+(i+1)+"' rel='tooltip' title='Edit Profile' class='btn btn-info btn-link btn-xs'><i class='fa fa-eye'></i></a> <a onclick='remove_group(this)' id='"+retVal[i]["id"]+"' rel='tooltip' title='Remove' class='btn btn-danger btn-link btn-xs'><i class='fa fa-times'></i></a>";
                    }
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