var accordion = document.getElementsByClassName("side_accordian");
var i;
            
    for (i = 0; i < accordion.length; i++) 
    {
        accordion[i].addEventListener("click", function() 
        {
            
            var acc_disp = this.nextElementSibling;
            if (acc_disp.style.display === "block") 
            {
                acc_disp.style.display = "none";
            } 
            else 
            {
                acc_disp.style.display = "block";
            }
        });
    }
