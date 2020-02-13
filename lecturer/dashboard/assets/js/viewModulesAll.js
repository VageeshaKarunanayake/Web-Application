function onStart()
{
    viewModulesAll();
}

function viewModulesAll()
{
    VAM = null;
    VAM = new XMLHttpRequest();
    VAM.open("POST","./assets/php/get_all_course.php",true);
    VAM.onreadystatechange = onAddCompleteVAM;
    VAM.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    VAM.responseType = JSON;
    VAM.send();
}

function onAddCompleteVAM()
{
        if(VAM.readyState == 4){
            if(VAM.status == 200){
                var table = document.getElementById("MOTABLE");
                if(VAM.responseText != "")
                {
                    var retVal = JSON.parse(VAM.responseText);
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
                        
                        cell1.innerHTML = retVal[i]["id"];
                        cell1.className="text-center";
                        cell1.id = retVal[i]["id"];
                        cell2.innerHTML = retVal[i]["name"];
                        
                        cell3.innerHTML = retVal[i]["year"];
                        cell3.className="text-right";
                        
                        cell4.innerHTML = retVal[i]["semester"];
                        cell4.className="text-right";
                        
                        cell5.className="text-right";
                        cell5.innerHTML = "<a onclick='edit_module(this)' data-toggle='modal' data-target='#myModal'  id='"+retVal[i]["id"]+"' rel='tooltip' title='Edit Profile' class='btn btn-success btn-link btn-xs'><i class='fa fa-edit'></i></a>   <a onclick='remove_module(this)' id='"+retVal[i]["id"]+"' rel='tooltip' title='Remove' class='btn btn-danger btn-link btn-xs'><i class='fa fa-times'></i></a>";
                    }
                }
                    else
                    {
                        for(var z = table.rows.length - 1; z > 0; z--)
                        table.deleteRow(z);
                    }
                    
                }
               else{
                   alert("Async call failed.ResponseText was:\n" + VAM.responseText);
            }
            VAM = null;
        }
}
function edit_module(element)
{
    var id = element.id;
    alert(id);

}