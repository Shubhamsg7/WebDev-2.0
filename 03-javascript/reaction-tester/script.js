var start = new Date().getTime();

//random colors 
function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}

//shape appear
function makeShapeAppear() {
    //set top
    var top = Math.random() * 400;
    //set left
    var left = Math.random() * 400;
    //set width
    var width = (Math.random() * 200) + 100;

    //set border radius
    if (Math.random() > .5) {
        document.getElementById("shape").style.borderRadius = "50%";
    } else {
        document.getElementById("shape").style.borderRadius = "0";
    }

    document.getElementById("shape").style.backgroundColor = getRandomColor();
    document.getElementById("shape").style.top = top + "px";
    document.getElementById("shape").style.left = left + "px";
    document.getElementById("shape").style.width = width + "px";
    document.getElementById("shape").style.height = width + "px";
    document.getElementById("shape").style.display = "block";
    start = new Date().getTime();
}

function appearAfterDelay() {
    setTimeout(makeShapeAppear, Math.random() + 2000);
}
appearAfterDelay();

//time show
document.getElementById("shape").onclick = function () {
    document.getElementById("shape").style.display = "none";
    var end = new Date().getTime();
    var timetaken = (end - start) / 1000;
    document.getElementById("timeTaken").innerHTML = timetaken + "s";

    appearAfterDelay();
}