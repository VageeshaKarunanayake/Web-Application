function forget()
{
        var form = document.getElementById("forget-form");
        
        if(form.username.value == "")
        {
            swal({ title: "Missing",text: "UserID cannot be empty",icon: "error",});
        }
        else
        {
            FUP = null;
            FUP = new XMLHttpRequest();
            FUP.open("POST","../administrator/assets/php/reset.php",true);
            FUP.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            FUP.onreadystatechange = onAddCompleteFUP;
            var msg = "username=" + form.username.value;
            FUP.send(msg);
        }
}

function onAddCompleteFUP()
{
        if(FUP.readyState == 4){
            if(FUP.status == 200){
                var retVal = FUP.responseText;
                if(retVal == '1')
                    swal({ title: "Error",text: "No UserID provided to the server",icon: "error",});
                else if (retVal == '2')
                    swal({ title: "Missing",text: "No UserID found in the database",icon: "error",});
                else if (retVal == '3')
                    swal({ title: "Error",text: "Password Reset Unsuccessful",icon: "error",});
                else if(retVal == '10')
                    swal({ title: "Sucess",text: "Password Reset successful",icon: "success",});
                else
                    swal({ title: "Error",text: "Internal Error "+FUP.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + FUP.responseText);
            }
            FUP = null;
        }
}