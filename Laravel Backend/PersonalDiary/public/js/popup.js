function openForm() {
document.getElementById("myForm").style.display = "block";
document.getElementsByClassName('blur')[0].style.display="block";
}
        
function closeForm() {
document.getElementById("myForm").style.display = "none";
document.getElementsByClassName('blur')[0].style.display="none";
}

function closeForm1() {
document.getElementById("myForm1").style.display = "none";
document.getElementsByClassName('blur')[0].style.display="none";
}

function closeForm2() {
document.getElementById("myForm2").style.display = "none";
document.getElementsByClassName('blur')[0].style.display="none";
}

function upload() {
document.getElementById("myForm").style.display = "none";
document.getElementById("myForm1").style.display = "block";
document.getElementsByClassName('blur')[0].style.display="block";
}

function deletePic() {
document.getElementById("myForm").style.display = "none";
document.getElementById("myForm2").style.display = "block";
document.getElementsByClassName('blur')[0].style.display="block";
}
