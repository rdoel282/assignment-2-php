/*selectors*/
var imageParent = document.getElementsByClassName("caption-style-2")[0];
var continent = document.getElementById("continent");
var city = document.getElementById("city");
var country = document.getElementById("country");

/*array of strings and number that reprsents the current filters.*/
var currentFilter = [0, 0, 0];




// ERROR (add logic) one filter working at a time.


continent.addEventListener("change", function() {
    var classNum = 0;
    checkFilter(continent, classNum);
});

country.addEventListener("change", function() {
    var classNum = 1;
    checkFilter(country, classNum);
});

city.addEventListener("change", function() {
    var classNum = 2;
    checkFilter(city, classNum);
});

function checkFilter(select, classNum) {

    //toggle back on.
    if (currentFilter[classNum] != 0) {
        applyFilter(currentFilter[classNum], classNum);
    }
    //toggle off.
    if (select.value != 0) {
        applyFilter(select.value, classNum);
    }

    currentFilter[classNum] = select.value;
}

function applyFilter(selectValue, classNum) {

    var image = imageParent.firstElementChild;

    while (image.nextElementSibling) {
        //hide
        if (image.classList[classNum] != selectValue) {

            image.classList.toggle("hide");
        }
        var image = image.nextElementSibling;
    }
    if (image.classList[classNum] != selectValue) {
        image.classList.toggle("hide");
    }


}

function titleSearch() {}

function clear(select) {}

function checkQueryString() {
    var queryString = ["continent", "country", "city"];
    var url = window.location.href;

    for (var i; queryString.length > i; i++) {
        if (url.indexOf('?' + queryString[i] + '=') != -1) {
            url.substring()
            //applyFilter(,i);
        }
        else if (url.indexOf('&' + queryString[i] + '=') != -1) {
            //applyFilter(,i);
        }
    }


}
