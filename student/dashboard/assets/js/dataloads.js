

/*function leaderLoad()
{
        var leder = document.getElementById("leader").value;
   
        
        if(leder !== "")
        {
            var req = null;
            req = new XMLHttpRequest();
            req.open("POST","assets/php/get_leader.php",true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.responseType = JSON;
            req.onreadystatechange = function()
            {
                if(req.readyState == 4 && req.status == 200)
                {
                    var option = document.getElementById("modle");
                    var field = document.getElementById("contact");
                    var year = document.getElementById("lyear");
                    var sem = document.getElementById("lsems");
                    var result = JSON.parse(req.responseText);
                    var count = result['count'];
                    var x;
                    while(option.options.length >0)
                    {
                        option.remove(0);
                    }
                    for(x=0; x < count; x++)
                    {
                        $("#modle").selectpicker();
                        $("#modle").append('<option value="'+result[x]["id"]+'">'+result[x]["name"]+'</option>');
                        $("#modle").selectpicker("refresh");
                        field.value = result["contact"];
                        year.value = result["year"];
                        sem.value = result["semester"];
                    }   
                }
            }
            req.send("lid="+leder);
        }
        else
        {
            
        }
}*/
function gid()
{
        var modl = document.getElementById("modle");
        var modlsend = modl.options[modl.selectedIndex].value;
        
        if(modle !== "")
        {
            var req = null;
            req = new XMLHttpRequest();
            req.open("POST","assets/php/get_groupid.php",true);
            req.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            req.responseType = JSON;
            req.onreadystatechange = function()
            {
                if(req.readyState == 4 && req.status == 200)
                {
                    
                    var fields = document.getElementById("groupid");
                    var result = JSON.parse(req.responseText);
                    fields.value = result;
                      
                }
            }
            req.send("module="+modlsend);
        }
        else
        {
            
        }
}

/*function load_members()
{
    var features = $("#member").selectpicker();
    var req = null;
    req = new XMLHttpRequest();
    req.open("GET","assets/php/get_members.php",true);
    req.onreadystatechange = function()
    {
        if(req.readyState == 4 && req.status == 200)
        {
            
            var result = JSON.parse(req.responseText);
            //console.log(result);
            var count = result['count'];
            var x;
            for(x=0; x < count; x++)
            {
               
            features.append('<option value="'+result[x]["id"]+'">'+result[x]["name"]+'</option>');
            features.selectpicker("refresh");
                
                
               
            }   
        }
    }
    req.send();
    
}*/
