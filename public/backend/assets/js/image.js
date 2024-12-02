// Image 1
const blahinput = document.getElementById("blahinput");
const blahremove = document.getElementById("blahremove");
const blah = document.getElementById("blah");

blahinput.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            blah.src = e.target.result;
            blah.style.display = "block";
            blahremove.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

blahremove.addEventListener("click", function () {
    blahinput.value = "";
    blah.src = "/demo.svg";
    blah.style.display = "block";
    blahremove.style.display = "none";
    document.getElementById('remove_image').value = '1';
});

// Image 2
const blah2input = document.getElementById("blah2input");
const blah2remove = document.getElementById("blah2remove");
const blah2 = document.getElementById("blah2");

blah2input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            blah2.src = e.target.result;
            blah2.style.display = "block";
            blah2remove.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

blah2remove.addEventListener("click", function () {
    blah2input.value = "";
    blah2.src = "/demo.svg";
    blah2.style.display = "block";
    blah2remove.style.display = "none";
    document.getElementById('remove_image2').value = '1';
});

// Image 3
const blah3input = document.getElementById("blah3input");
const blah3remove = document.getElementById("blah3remove");
const blah3 = document.getElementById("blah3");

blah3input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            blah3.src = e.target.result;
            blah3.style.display = "block";
            blah3remove.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

blah3remove.addEventListener("click", function () {
    blah3input.value = "";
    blah3.src = "/demo.svg";
    blah3.style.display = "block";
    blah3remove.style.display = "none";
    document.getElementById('remove_image3').value = '1';
});
// Image 4
const blah4input = document.getElementById("blah4input");
const blah4remove = document.getElementById("blah4remove");
const blah4 = document.getElementById("blah4");

blah4input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            blah4.src = e.target.result;
            blah4.style.display = "block";
            blah4remove.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

blah4remove.addEventListener("click", function () {
    blah4input.value = "";
    blah4.src = "/demo.svg";
    blah4.style.display = "block";
    blah4remove.style.display = "none";
    document.getElementById('remove_image4').value = '1';
});
// Image 5
const blah5input = document.getElementById("blah5input");
const blah5remove = document.getElementById("blah5remove");
const blah5 = document.getElementById("blah5");

blah5input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            blah5.src = e.target.result;
            blah5.style.display = "block";
            blah5remove.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

blah5remove.addEventListener("click", function () {
    blah5input.value = "";
    blah5.src = "/demo.svg";
    blah5.style.display = "block";
    blah5remove.style.display = "none";
    document.getElementById('remove_image5').value = '1';
});
// Image 6
const blah6input = document.getElementById("blah6input");
const blah6remove = document.getElementById("blah6remove");
const blah6 = document.getElementById("blah6");

blah6input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            blah6.src = e.target.result;
            blah6.style.display = "block";
            blah6remove.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

blah6remove.addEventListener("click", function () {
    blah6input.value = "";
    blah6.src = "/demo.svg";
    blah6.style.display = "block";
    blah6remove.style.display = "none";
    document.getElementById('remove_image6').value = '1';
});
// Image 7
const blah7input = document.getElementById("blah7input");
const blah7remove = document.getElementById("blah7remove");
const blah7 = document.getElementById("blah7");

blah7input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            blah7.src = e.target.result;
            blah7.style.display = "block";
            blah7remove.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

blah7remove.addEventListener("click", function () {
    blah7input.value = "";
    blah7.src = "/demo.svg";
    blah7.style.display = "block";
    blah7remove.style.display = "none";
    document.getElementById('remove_image7').value = '1';
});
// Image 8
const blah8input = document.getElementById("blah8input");
const blah8remove = document.getElementById("blah8remove");
const blah8 = document.getElementById("blah8");

blah8input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            blah8.src = e.target.result;
            blah8.style.display = "block";
            blah8remove.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

blah8remove.addEventListener("click", function () {
    blah8input.value = "";
    blah8.src = "/demo.svg";
    blah8.style.display = "block";
    blah8remove.style.display = "none";
    document.getElementById('remove_image8').value = '1';
});
// Image 9
const blah9input = document.getElementById("blah9input");
const blah9remove = document.getElementById("blah9remove");
const blah9 = document.getElementById("blah9");

blah9input.addEventListener("change", function (event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function (e) {
            blah9.src = e.target.result;
            blah9.style.display = "block";
            blah9remove.style.display = "block";
        };
        reader.readAsDataURL(file);
    }
});

blah9remove.addEventListener("click", function () {
    blah9input.value = "";
    blah9.src = "/demo.svg";
    blah9.style.display = "block";
    blah9remove.style.display = "none";
    document.getElementById('remove_image9').value = '1';
});
