function onStart()
{
    viewTopicsAll();
}

function viewTopicsAll()
{
    VAT = null;
    VAT = new XMLHttpRequest();
    VAT.open("POST","./assets/php/get_all_topic_allocation.php",true);
    VAT.onreadystatechange = onAddCompleteVAT;
    VAT.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    VAT.responseType = JSON;
    var msg = "prorata=0";
    VAT.send(msg);
}

function onAddCompleteVAT()
{
        if(VAT.readyState == 4){
            if(VAT.status == 200){
                var table = document.getElementById("VTTABLE");
                if(VAT.responseText != "")
                {
                    var retVal = JSON.parse(VAT.responseText);
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
                        
                        cell1.className="text-center";
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
                   alert("Async call failed.ResponseText was:\n" + VAT.responseText);
            }
            VAT = null;
        }
}