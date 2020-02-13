function limit_student_selection()
{
    
}

function create_group()
{
        var form = document.getElementById("addGroup");
        var x;
        
        if(form.year.value == "")
        {
            swal({ title: "Missing",text: "Year cannot be empty", icon:"error"});
        }
        else if(form.semester.value == "")
        {
            swal({ title: "Missing",text: "Semester cannot be empty",icon: "error",}); 
        }
        else if(form.MC.value == "")
        {
            swal({ title: "Missing",text: "Module cannot be empty",icon: "error",}); 
        }
        else if(form.groupName.value == "")
        {
            swal({ title: "Missing",text: "Group Name cannot be empty",icon: "error",}); 
        }
        else if(form.memCount.value == "")
        {
            swal({ title: "Missing",text: "Member Count cannot be empty",icon: "error",}); 
        }
        else if(form.members.value == "")
        {
            swal({ title: "Missing",text: "Members should be selected",icon: "error",}); 
        }
        else
        {
            var SLE = document.getElementById("members");
            var selectedStudents = [];
            for (var i = 0; i < SLE.length; i++) {
                if (SLE.options[i].selected) 
                    selectedStudents.push(SLE.options[i].value);
    }
            ASG = null;
            ASG = new XMLHttpRequest();
            ASG.open("POST","./assets/php/add_group.php",true);
            ASG.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ASG.onreadystatechange = onAddCompleteASG;
            var prorata=0;
            var msg = "year=" + form.year.value + "&semester=" + form.semester.value + "&module=" + form.MC.value + "&name=" + form.groupName.value + "&count=" + form.memCount.value + "&members=" + selectedStudents +"&prorata=" +prorata;
            ASG.send(msg);
        }
}

function onAddCompleteASG()
{
    var form = document.getElementById("addGroup");
        if(ASG.readyState == 4){
            if(ASG.status == 200){
                var retVal = ASG.responseText;
                
                if (retVal == 'OK')
                {
                    viewGroupsAll();
                    form.reset();
                    swal({ title: "Success",text: "Group Registration successful",icon: "success"});
                    location.reload();
                }
                else
                    swal({ title: "Error",text: "Internal Server error "+ ASG.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + ASG.responseText);
            }
            ASG = null;
        }
}