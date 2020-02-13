function topic_allocation()
{
        var form = document.getElementById("addTopic");
        var x;
        
        if(form.year.value == "")
        {
            swal({ title: "Missing",text: "Year cannot be empty", icon:"error"});
        }
        else if(form.semester.value == "")
        {
            swal({ title: "Missing",text: "Semester cannot be empty",icon: "error",}); 
        }
        else if(form.module.value == "")
        {
            swal({ title: "Missing",text: "Module cannot be empty",icon: "error",}); 
        }
        else if(form.group.value == "")
        {
            swal({ title: "Missing",text: "Group Name cannot be empty",icon: "error",}); 
        }
        else if(form.topic.value == "")
        {
            swal({ title: "Missing",text: "Topic cannot be empty",icon: "error",}); 
        }
        else
        {
            TAL = null;
            TAL = new XMLHttpRequest();
            TAL.open("POST","./assets/php/allocate_topic.php",true);
            TAL.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            TAL.onreadystatechange = onAddCompleteTAL;
            var prorata=0;
            var msg = "gid=" + form.group.value + "&tid=" + form.topic.value;
            TAL.send(msg);
        }
}

function onAddCompleteTAL()
{
    var form = document.getElementById("addTopic");
        if(TAL.readyState == 4){
            if(TAL.status == 200){
                var retVal = TAL.responseText;
                
                if (retVal == 'OK'){
                    swal({ title: "Sucess",text: "Topic Allocation Successful",icon: "success",});
                    viewTopicsAll();
                    form.reset();
                }
                else if(retVal == 'FAIL')
                    swal({ title: "Error",text: "Topic Allocation Unsuccessful"+ TAL.responseText,icon: "error",});
                else
                    swal({ title: "Error",text: "Internal Server Error "+ TAL.responseText,icon: "error",});
               }
               else{
                   alert("Async call failed.ResponseText was:\n" + TAL.responseText);
            }
            TAL = null;
        }
}