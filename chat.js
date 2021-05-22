const sub = document.getElementById("submit");
sub.onclick = function(){
    var txt = document.getElementById("txt");
    var txtvalue = txt.value;
    txt.innerHTML = "";
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "chatting.php", true);
    // xhr.onload = ()=>{
    //     if(xhr.readyState === XMLHttpRequest.DONE){
    //         if(xhr.status === 200){
    //             document.getElementById("msg-list").innerHTML += this.responseText;
    //             console.log(xhr.responseText);
    //         }
    //     }
    // }
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("msg-list").innerHTML += this.responseText;
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("txtvalue="+txtvalue);
}

setInterval(function(){
    var xhr = new XMLHttpRequest();
    var k = document.getElementById("msg-list");
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            k.innerHTML += this.responseText;
        }
    }
    xhr.open("GET", 'chatting1.php', true);
    xhr.send();

}, 4000);


document.querySelector("body").onload = function(){

    var xhr = new XMLHttpRequest();
    document.getElementById("msg-list").innerHTML = "";
    xhr.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("msg-list").innerHTML += this.responseText;
        }
    }
    xhr.open("GET", 'receivemsg.php', true);
    xhr.send();
}
