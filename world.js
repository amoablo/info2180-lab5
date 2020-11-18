window.onload = function(){
    var httpRequest = new XMLHttpRequest();
    var button = document.getElementById("lookup");
    

    button.addEventListener("click",function(el){
        el.preventDefault();
        var url = "world.php";
        var country = document.getElementById("country").value;
        httpRequest.open('GET',url+"?country="+country,false);
        httpRequest.send();
        httpRequest.onreadystatechange = getMsg();
        

    });

    var button2 = document.getElementById("city");
    

    button2.addEventListener("click",function(el){
        el.preventDefault();
        var url = "world.php";
        var country = document.getElementById("country").value;
        httpRequest.open('GET',url+"?country="+country+"&context=cities",false);
        httpRequest.send();
        httpRequest.onreadystatechange = getMsg();
        

    });

function getMsg() {
    if (httpRequest.readyState == XMLHttpRequest.DONE)
        if (httpRequest.status == 200) {
            var response = httpRequest.responseText;
            var space = document.getElementById("result");
            space.innerHTML=response;
     } 
    } 
}


