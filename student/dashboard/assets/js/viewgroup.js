function onStart()
{
    viewModules();
}

function viewModules()
{
    var le = document.getElementById("leader");
    var leader = le.value;
    VMS = null;
    VMS = new XMLHttpRequest();
    VMS.open("POST","./assets/php/get_group.php",true);
    VMS.onreadystatechange = onAddCompleteVMS;
    VMS.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    VMS.responseType = JSON;
    var prorata=0;
    var msg = "led=" + leader;
    VMS.send(msg);
}

function onAddCompleteVMS()
{
        if(VMS.readyState == 4){
            if(VMS.status == 200){
                var table = document.getElementById("MOTABLE");
                if(VMS.responseText != "")
                {
                    var retVal = JSON.parse(VMS.responseText);
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
                        
                        cell1.innerHTML = retVal[i]["id"];
                        cell1.className="text-center";
                        cell1.id = retVal[i]["id"];
                        cell2.innerHTML = retVal[i]["name"];
                        cell3.innerHTML = retVal[i]["year"];
                        cell3.className="text-right";
                        cell4.innerHTML = retVal[i]["semester"];
                        cell4.className="text-right";
                        cell5.className="text-right";
                        cell5.innerHTML = "<a onclick='edit_module(this)' data-toggle='modal' data-target='#myModal' id='"+retVal[i]["id"]+"' rel='tooltip' title='Edit Profile' class='btn btn-success btn-link btn-xs'><i class='fa fa-edit'></i></a> <a onclick='v_module(this)' data-toggle='modal' data-target='#myModalview' id='"+retVal[i]["id"]+"' rel='tooltip' title='Edit Profile' class='btn btn-info btn-link btn-xs'><i class='fa fa-eye'></i></a>  <a href='./assets/php/delete_group.php?id="+retVal[i]["id"]+"' id='' rel='tooltip' title='Remove' class='btn btn-danger btn-link btn-xs'><i class='fa fa-times'></i></a>";
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
                   alert("Async call failed.ResponseText was:\n" + VMS.responseText);
            }
            VMS = null;
        }
}




function remove_module(element)
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
            swal("Module Record not Deleted!");
          } 
          else 
          {
            rowIndex = element.parentNode.parentNode.rowIndex;     
            VGD = null;
            VGD = new XMLHttpRequest();
            VGD.open("POST","./assets/php/delete_group.php",true);
            VGD.onreadystatechange = onAddCompleteVGD;
            VGD.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            var msg = "id=" + element.id;
            VGD.send(msg);
          }
        });

}

function onAddCompleteVGD()
{
        if(VGD.readyState == 4){
            if(VGD.status == 200){
                var table = document.getElementById("MOTABLE");
                var retVal = VGD.responseText;
                
                if(retVal == 'FAIL')
                    swal({ title: "Error",text: "Module Deletion Unsuccessful",icon: "error",});
                else if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Module Deleted",icon: "success",});
                    table.deleteRow(rowIndex);
                }
                else
                    swal({ title: "Error",text: "Internal Server error "+ VGD.responseText,icon: "error",});
                    
                }
               else{
                   alert("Async call failed.ResponseText was:\n" + VGD.responseText);
            }
            VGD = null;
        }
}