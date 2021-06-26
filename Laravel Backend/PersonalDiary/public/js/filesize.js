function upload_check()
{
    var form = document.getElementsByName("uploadform")
    var upload = document.getElementById("file_id");
    var max = document.getElementById("max_id").value;

    if(upload.files[0].size > max)
    {
       alert("File size exceeded! Maximum file size allowed is 8mb.");
       upload.value = "";
    }

    else{
        uploadform.submit()
    }
}

setTimeout(function(){
    $('.alert').hide();
  },1000);

