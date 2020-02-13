function onStart()
{
    view();
}

function view()
{
    CLA = null;
    CLA = new XMLHttpRequest();
    CLA.open("GET","./assets/php/view_lecturers.php",true);
    CLA.onreadystatechange = onAddCompleteCLA;
    CLA.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    CLA.responseType = JSON;
    CLA.send();
}

function onAddCompleteCLA()
{
        if(CLA.readyState == 4){
            if(CLA.status == 200){
                var table = document.getElementById("viewTable");
                var retVal = JSON.parse(CLA.responseText);
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
                    
                    cell1.className = "text-left";
                    //cell2.className = "text-center";
                    cell3.className = "text-right";
                    cell4.className = "text-right";
                    
                    cell1.innerHTML = retVal[i]["name"];
                    cell2.innerHTML = retVal[i]["email"];
                    cell3.innerHTML = retVal[i]["mobile"];
                    cell4.innerHTML = "<a onclick='edit_profile(this)' data-toggle='modal' data-target='#myModal' id='"+(i+1)+"' rel='tooltip' title='Edit Profile' class='btn btn-success btn-link btn-xs'><i class='fa fa-edit'></i></a>   <a onclick='remove_profile(this)' id='"+retVal[i]["email"]+"' rel='tooltip' title='Remove' class='btn btn-danger btn-link btn-xs'><i class='fa fa-times'></i></a>";
                }
                    
                }
               else{
                   alert("Async call failed.ResponseText was:\n" + CLA.responseText);
            }
            CLA = null;
        }
}

function remove_profile(element)
{
    
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this Lecturer Data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    }).then(function (result)
    {
          if (result.value)
          {
            swal("Lecturer Record not Deleted!");
          } 
          else 
          {
            RINDEX = element.parentNode.parentNode.rowIndex;     
            RMP = null;
            RMP = new XMLHttpRequest();
            RMP.open("POST","./assets/php/delete_lecturer.php",true);
            RMP.onreadystatechange = onAddCompleteRMP;
            RMP.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            var msg = "email=" + element.id;
            RMP.send(msg);
            swal("Lecturer Record Deleted!");
          }
        });

}

function onAddCompleteRMP()
{
        if(RMP.readyState == 4){
            if(RMP.status == 200){
                var retVal = RMP.responseText;
                if(retVal == 'FAIL')
                    swal({ title: "Error",text: "Lecturer Deletion Unsuccessful",icon: "error",});
                else if (retVal == 'OK')
                {
                    swal({ title: "Sucess",text: "Lecturer Deleted",icon: "success",});
                    var table1 = document.getElementById("viewTable");
                    table1.deleteRow(RINDEX);
                }
                else
                    swal({ title: "Error",text: "Internal Server error "+ RMP.responseText,icon: "error",});
                    
                }
               else{
                   alert("Async call failed.ResponseText was:\n" + RMP.responseText);
            }
            RMP = null;
        }
}