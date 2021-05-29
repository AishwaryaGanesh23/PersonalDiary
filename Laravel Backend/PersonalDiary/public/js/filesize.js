function upload_check()
{
    var upload = document.getElementById("file_id");
    var max = document.getElementById("max_id").value;

    if(upload.files[0].size > max)
    {
       alert("File too big!");
       upload.value = "";
    }
}