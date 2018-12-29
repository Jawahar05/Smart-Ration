//filter content
filterSelection("new")
function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
}

function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) { element.className += " " + arr2[i]; }
    }
}

function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn-panel");
for (var i = 0; i <= btns.length; i++) {
    btns[i].addEventListener("click", function () {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

//get value
function getvalue(district) {
    var search = district;
}


function getposition(post) {
    var p = post;
    var x = document.getElementById("disid");
    var y = document.getElementById("storeid");
    if (post == "supervisor") {
        x.style.visibility = "visible";
        y.style.visibility = "hidden";
    }
    if (p == "supplier") {
        x.style.visibility = "visible";
        y.style.visibility = "visible";
    }
    if(p == "administrator"){
        x.style.visibility = "hidden";
        y.style.visibility = "hidden";
    }
}

function hideid()
{
    var x = document.getElementById("disid");
    var y = document.getElementById("storeid");
    x.style.visibility = "hidden";
    y.style.visibility = "hidden";
}