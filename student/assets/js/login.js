function login()
{
        var form = document.getElementById("login-form");
        
        if(form.username.value == "")
        {
            swal({ title: "Missing",text: "UserID cannot be empty",icon: "error",});
        }
        else if(form.password.value == "")
        {
            swal({ title: "Missing",text: "Password cannot be empty",icon: "error",}); 
        }
        else
        {

            LCC = null;
            LCC = new XMLHttpRequest();
            LCC.open("POST","../student/assets/php/login.php",true);
            LCC.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            LCC.onreadystatechange = onAddCompleteLLC;
            var msg = "username=" + form.username.value.toUpperCase() + "&password=" + form.password.value;
            LCC.send(msg);
        }
}

function onAddCompleteLLC()
{
        if(LCC.readyState == 4){
            if(LCC.status == 200){
                var retVal = LCC.responseText;
                if(retVal == '1')
                    swal({ title: "Error",text: "No UserID and Password provided to the server",icon: "error",});
                else if(retVal == '2')
                    swal({ title: "Error",text: "Database execution failure (Query Failure)",icon: "error",});
                else if (retVal == '3')
                    swal({ title: "Missing",text: "No UserID found in the database",icon: "error",});
                else if (retVal == '4')
                    swal({ title: "Sucess",text: "Login successful",icon: "success",}).then(function(){window.location.replace("../student/dashboard/managegroups.php");});
                else
                    swal({ title: "Error",text: "Invalid Credentials",icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + LCC.responseText);
            }
            LCC = null;
        }
}