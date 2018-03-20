
window.onload = function() {

var links = document.getElementsByClassName("image-item");

        for(var i = 0; links.length > i; i++) {
                
        links[i].addEventListener("mouseover", function(e) {
            var x = event.clientX;  
            var y = event.clientY;
           
            var element = e.target.parentElement.nextSibling;
            element.style.top = y-300 + "px";
            element.style.left = x-70 + "px";
            element.style.display = "block";
            
        });
        
         links[i].addEventListener("mouseleave", function(e) {
            var element = e.target.parentElement.nextSibling;
            element.style.display = "none";
            
        });

    }
};

