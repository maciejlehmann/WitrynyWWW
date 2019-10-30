function myFunction1() {
	document.getElementById('obrazek5').src='https://cdn.pixabay.com/photo/2015/09/09/16/05/forest-931706_960_720.jpg';
}

function myFunction2() {
	document.getElementById('obrazek5').src='https://cdn.pixabay.com/photo/2015/12/01/20/28/road-1072823_960_720.jpg';
}


function myFunction3() {
  var btn = document.createElement("BUTTON");
  btn.innerHTML = "Nowy przycisk";
  document.body.appendChild(btn);
}


function myFunction4() {
	var x;
	x = document.querySelector(".jakasklasa");
	x.style.backgroundColor = "red";
}

var x = document.getElementsByClassName("badge-light");
x[0].innerHTML = 6;


var x = document.getElementsByClassName('progrss-bar');
console.log(x);
var width = 77;


var k = 0;
function move() {
  if (k == 0) {
    k = 1;
    var elem = document.getElementById("myBar");
    var width = 10;
    var id = setInterval(frame, 80);
    function frame() {
      if (width >= 100) {
        clearInterval(id);
        k = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width + "%";
      }
    }
  }
}

var slider = document.getElementById("myRange");
var output = document.getElementById("val");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}

function myFunction5() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}

var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.display === "block") {
      content.style.display = "none";
    } else {
      content.style.display = "block";
    }
  });
}

function myFunction6() {
  myVar = setTimeout(showPage, 1500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}

function on() {
  document.getElementById("overlay").style.display = "block";
}

function off() {
  document.getElementById("overlay").style.display = "none";
}

var close = document.getElementsByClassName("closebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}

function myFunction7() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}

function myFunction8() {
  var x = document.getElementById("obrazek");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}


function myFunction9() {
  var x = document.getElementById("div9");
  if (x.innerHTML === "Witaj!") {
    x.innerHTML = "Miło Cię widzieć!";
  } else {
    x.innerHTML = "Witaj!";
  }
}


function myFunction10() {
   var element = document.getElementById("div10");
   element.classList.toggle("div10style");
}


function myFunction11() {
  var x = document.getElementById("change");
  document.getElementById("tochange").innerHTML = x.value;
}

function myFunction12() {
  var element = document.getElementById("obr");
  element.classList.add("obroc");
}

function myFunction13() {
  var element = document.getElementById("div13");
  element.classList.remove("style13");
}

// Get the container element
var btnContainer = document.getElementById("div14");

// Get all buttons with class="btn" inside the container
var btns = btnContainer.getElementsByClassName("prz");

// Loop through the buttons and add the active class to the current/clicked button
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}

var toggler = document.getElementsByClassName("caret");
var w;

for (w = 0; w < toggler.length; w++) {
  toggler[w].addEventListener("click", function() {
    this.parentElement.querySelector(".nested").classList.toggle("akt");
    this.classList.toggle("caret-down");
  });
}
