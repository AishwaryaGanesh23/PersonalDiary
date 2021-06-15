function openList(evt, ListName) {
        // Declare all variables
        var i, tabcontent, tablinks;
      
        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
          tabcontent[i].style.display = "none";
        }
      
        // Get all elements with class="tablinks" and remove the class "active"
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
          tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
      
        // Show the current tab, and add an "active" class to the button that opened the tab
        document.getElementById(ListName).style.display = "block";
        evt.currentTarget.className += " active";
      }
          // Get the element with id="defaultOpen" and click on it
          document.getElementById("defaultOpen").click();

function ShowHideDiv(checkfullday) {
        var start = document.getElementById("div1");
        var end = document.getElementById("div2");
        var enddate = document.getElementById("div3");

        start.style.display = checkfullday.checked ? "none" : "block";
        end.style.display = checkfullday.checked ? "none" : "block";
        enddate.style.display = checkfullday.checked ? "none" : "block";

        var date = document.getElementById("lab_startdate");
        date.innerHTML = checkfullday.checked ? "Event date" : "Start Date";
        
    } checkmedia

    function ShowHideMedia(checkmedia) {
      var showmedia = document.getElementById("media");
      showmedia.style.display = checkmedia.checked ? "block" : "none";
  }

//task start end date restriction
var startdate = document.getElementById('startdate');
var enddate = document.getElementById('enddate');

startdate.addEventListener('change', function() {
  if (startdate.value)
    enddate.min = startdate.value;
}, false);
enddate.addEventLiseter('change', function() {
    if (enddate.value)
    startdate.max = enddate.value;
}, false);

var starttime = document.getElementById('starttime');
var endtime = document.getElementById('endtime');

starttime.addEventListener('change', function() {
  if (starttime.value)
  endtime.min = starttime.value;
}, false);

endtime.addEventLiseter('change', function() {
    if (endtime.value)
    starttime.max = endtime.value;
}, false);