function onStart()
{
    viewTopicsAll();
}

function viewTopicsAll()
{
    
    TVT = null;
    TVT = new XMLHttpRequest();
    TVT.open("POST","./assets/php/get_all_topics.php",true);
    TVT.onreadystatechange = onAddCompleteTVT;
    TVT.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    TVT.responseType = JSON;
    TVT.send();
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
                        cell4.className = "text-right";
                        cell5.className = "text-right";
                        cell6.className = "text-right";
                        
                        cell1.innerHTML = retVal[i]["id"];
                        cell1.id = retVal[i]["id"];
                        cell2.innerHTML = retVal[i]["name"];
                        cell4.innerHTML = retVal[i]["course"];
                        cell3.innerHTML = retVal[i]["description"];
                        cell5.innerHTML = retVal[i]["scount"];
                        cell6.innerHTML = "<a onclick='edit_topic(this)' data-toggle='modal' data-target='#myModal' id='"+(i+1)+"' rel='tooltip' title='Edit Profile' class='btn btn-success btn-link btn-xs'><i class='fa fa-edit'></i></a>   <a onclick='remove_topic(this)' id='"+retVal[i]["id"]+"' rel='tooltip' title='Remove' class='btn btn-danger btn-link btn-xs'><i class='fa fa-times'></i></a>";
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