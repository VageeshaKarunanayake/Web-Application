function view()
{
    CLA = null;
    CLA = new XMLHttpRequest();
    CLA.open("GET","./assets/php/view_student.php",true);
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
                    var cell5 = row.insertCell(4);
                    var cell6 = row.insertCell(5);
                    var cell7 = row.insertCell(6);
                    var cell8 = row.insertCell(7);
                    var cell9 = row.insertCell(8);
                    
                    cell1.className = "text-center";
                    
                    cell1.innerHTML = retVal[i]["id"];
                    cell1.id = retVal[i]["id"];
                    cell2.innerHTML = retVal[i]["name"];
                    cell3.innerHTML = retVal[i]["mobile"];
                    cell4.innerHTML = retVal[i]["email"];
                    cell5.innerHTML = retVal[i]["gpa"];
                    cell6.innerHTML = retVal[i]["year"];
                    cell7.innerHTML = retVal[i]["semester"];
                    
                    if(retVal[i]["prorata"] == 1)
                        cell8.innerHTML = "Prorata";
                    else
                        cell8.innerHTML = "Regular";
                        
                    cell9.innerHTML = "<a onclick='edit_profile(this)' data-toggle='modal' data-target='#myModal' id='"+(i+1)+"' rel='tooltip' title='Edit Profile' class='btn btn-success btn-link btn-xs'><i class='fa fa-edit'></i></a>   <a onclick='remove_profile(this)' id='"+retVal[i]["id"]+"' rel='tooltip' title='Remove' class='btn btn-danger btn-link btn-xs'><i class='fa fa-times'></i></a>";
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
    text: "Once deleted, you will not be able to recover this Student Data!",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    }).then(function (result)
    {
          if (result.value)
          {
            swal("Student Record not Deleted!");
          } 
          else 
          {
            RINDEX = element.parentNode.parentNode.rowIndex;     
            RMP = null;
            RMP = new XMLHttpRequest();
            RMP.open("POST","./assets/php/delete_student.php",true);
            RMP.onreadystatechange = onAddCompleteRMP;
            RMP.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            var msg = "id=" + element.id;
            RMP.send(msg);
            swal("Student Record Deleted!");
          }
        });
        
    

}

function delete_std(element)
{
    
}
function onAddCompleteRMP()
{
        if(RMP.readyState == 4){
            if(RMP.status == 200){
                var table = document.getElementById("viewTable");
                var retVal = RMP.responseText;
                
                if(retVal == 'DELETE FAIL')
                    swal({ title: "Error",text: "Student Deletion Unsuccessful",icon: "error",});
                else if (retVal == 'DELETE SUCCESS')
                {
                    swal({ title: "Sucess",text: "Student Deleted",icon: "success",});
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