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
                    viewGroups();
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

function viewGroups()
{
    var ye = document.getElementById("year2");
    var year = ye.options[ye.selectedIndex].value;
    var se = document.getElementById("semester2");
    var semester = se.options[se.selectedIndex].value;
    var mod = document.getElementById("MC2");
    var module = mod.options[mod.selectedIndex].value;
    
    GVF = null;
    GVF = new XMLHttpRequest();
    GVF.open("POST","./assets/php/get_groups.php",true);
    GVF.onreadystatechange = onAddCompleteGVF;
    GVF.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    GVF.responseType = JSON;
    var prorata = 1;
    var msg = "year=" + year + "&semester=" + semester + "&module=" + module + "&prorata=" + prorata;
    GVF.send(msg);
}

function onAddCompleteGVF()
{
        if(GVF.readyState == 4){
            if(GVF.status == 200){
                var table = document.getElementById("VETABLE");
                if(GVF.responseText != "")
                {
                    var retVal = JSON.parse(GVF.responseText);
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
                        
                         cell1.className="text-center";
                        cell4.className = "text-right";
                        cell5.className = "text-right";
                         cell6.className = "text-right"; 
                         
                        cell1.innerHTML = retVal[i]["id"];
                        cell1.id = retVal[i]["id"];
                        cell2.innerHTML = retVal[i]["name"];
                        cell3.innerHTML = retVal[i]["memcount"];
                        cell4.innerHTML = retVal[i]["year"];
                        cell5.innerHTML = retVal[i]["semester"];
                        cell6.innerHTML = "<a onclick='edit_group(this)' data-toggle='modal' data-target='#myModal' id='"+(i+1)+"' rel='tooltip' title='Edit Profile' class='btn btn-success btn-link btn-xs'><i class='fa fa-edit'></i></a>   <a onclick='remove_group(this)' id='"+retVal[i]["id"]+"' rel='tooltip' title='Remove' class='btn btn-danger btn-link btn-xs'><i class='fa fa-times'></i></a>";
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
                   alert("Async call failed.ResponseText was:\n" + GVF.responseText);
            }
            GVF = null;
        }
}

function remove_group(element)
{
    
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Group Data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    }).then(function (result)
    {
          if (result.value)
          {
            swal("Group Record not Deleted!");
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
                var table = document.getElementById("VETABLE");
                var retVal = VGD.responseText;
                
                if(retVal == 'FAIL')
                    swal({ title: "Error",text: "Group Deletion Unsuccessful",icon: "error",});
                else if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Group Deleted",icon: "success",});
                    table.deleteRow(rowIndex);
                    location.reload();
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