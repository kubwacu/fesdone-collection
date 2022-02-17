function fileValidation(){
    var fileInput = document.getElementById("file_input");
    var filePath = fileInput.value;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
    if(!allowedExtensions.exec(filePath)){
        alert('Please upload file having extensions .jpg/ .jpeg/ .png/ .gif only. ');
        fileInput.value = '';
        return false;
    }else{
        //image preview
        if(fileInput.files && fileInput.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                document.getElementById("imagePreview").innerHTML = '<img src="'+e.target.result+'"/>';
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
}