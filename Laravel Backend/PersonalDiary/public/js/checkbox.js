function ShowHideMedia(checkmedia) {
    var showmedia = document.getElementById("media");
    showmedia.style.display = checkmedia.checked ? "block" : "none";
}

function ShowHideDiv(checkfullday) {
    var start = document.getElementById("divstime");
    var end = document.getElementById("divetime");
    var enddate = document.getElementById("divedate");

    start.style.display = checkfullday.checked ? "none" : "block";
    end.style.display = checkfullday.checked ? "none" : "block";
    enddate.style.display = checkfullday.checked ? "none" : "block";

    var date = document.getElementById("lab_startdate");
    date.innerHTML = checkfullday.checked ? "Event date" : "Start Date";
    
}

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