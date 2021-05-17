function triggerClick(){
    document.querySelector('#profileImage').click();
}

function displayImage(event){
if(event.files[0]){
    var reader = new FileReader();

    reader.onload = function(event){
        document.querySelector('#profileDisplay').setAttribute("src", event.target.result);
    }
    reader.readAsDataURL(event.files[0]);
}
}
