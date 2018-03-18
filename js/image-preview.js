//alert("hello");
window.onload = function() {
document.getElementById("listImg").onmouseover = function(event){
        var x = event.clientX;  
        var y = event.clientY; 
        
        var pop = document.getElementById("pop");
        pop.style.top = y-75 + "px";
        pop.style.left = x-35 + "px";
        pop.style.display = "block";

    };

    // document.getElementById("imgList").onmouseover = function(event){
    //         alert("testing");
    //     var x = event.clientX;  
    //     var y = event.clientY; 
        
    //     var pop = document.getElementById("pop");
    //     pop.style.top = y-75 + "px";
    //     pop.style.left = x-35 + "px";
    //     pop.style.display = "block";

    // };
    
    // document.getElementsByClassName("list-group-item").onmouseover = function(){
    //     alert("testing");
    // };
     


document.getElementById("listImg").onmouseout = function(){
        document.getElementById("pop").style.display = "none";
    };  
    
    


};