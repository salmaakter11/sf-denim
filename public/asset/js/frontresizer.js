var resizer = document.querySelector(".resizer"),
    // sidebar = document.querySelector(".sidebar");
    sidebar = document.getElementById("sidebar");

var resizer2 = document.querySelector(".resizer2"),
    sidebar2 = document.getElementById("sidebar2");

function initResizerFn(resizer, sidebar) {
    var x, w;

    function startTracking(clientX) {
        x = clientX;
        var sbWidth = window.getComputedStyle(sidebar).width;
        w = parseInt(sbWidth, 10);

        document.addEventListener("mousemove", moveHandler);
        document.addEventListener("touchmove", touchMoveHandler);
        document.addEventListener("mouseup", stopTracking);
        document.addEventListener("touchend", stopTracking);
    }

    function moveHandler(e) {
        var dx = e.clientX - x;
        updateSidebarWidth(dx, sidebar);
    }

    function touchMoveHandler(e) {
        var touch = e.touches[0];
        if (touch) {
            var dx = touch.clientX - x;
            updateSidebarWidth(dx, sidebar);
        }
    }

    function stopTracking() {
        document.removeEventListener("mouseup", stopTracking);
        document.removeEventListener("touchend", stopTracking);
        document.removeEventListener("mousemove", moveHandler);
        document.removeEventListener("touchmove", touchMoveHandler);
    }

    function updateSidebarWidth(dx, sidebar) {
        var cw = w + dx;
        if (cw < 700) {
            sidebar.style.width = `${cw}px`;
        }
    }

    resizer.addEventListener("mousedown", function (e) {
        startTracking(e.clientX);
    });

    resizer.addEventListener("touchstart", function (e) {
        var touch = e.touches[0];
        if (touch) {
            startTracking(touch.clientX);
        }
    });
}

function initResizerFn2(resizer, sidebar) {
    var x, w;

    function startTracking(clientX) {
        x = clientX;
        var sbWidth = window.getComputedStyle(sidebar).width;
        w = parseInt(sbWidth, 10);

        document.addEventListener("mousemove", moveHandler);
        document.addEventListener("touchmove", touchMoveHandler);
        document.addEventListener("mouseup", stopTracking);
        document.addEventListener("touchend", stopTracking);
    }

    function moveHandler(e) {
        var dx = e.clientX - x;
        updateSidebarWidth(dx, sidebar2);
    }

    function touchMoveHandler(e) {
        var touch = e.touches[0];
        if (touch) {
            var dx = touch.clientX - x;
            updateSidebarWidth(dx, sidebar2);
        }
    }

    function stopTracking() {
        document.removeEventListener("mouseup", stopTracking);
        document.removeEventListener("touchend", stopTracking);
        document.removeEventListener("mousemove", moveHandler);
        document.removeEventListener("touchmove", touchMoveHandler);
    }

    function updateSidebarWidth(dx, sidebar) {
        var cw = w - dx;
        if (cw < 700) {
            sidebar.style.width = `${cw}px`;
        }
    }

    resizer2.addEventListener("mousedown", function (e) {
        startTracking(e.clientX);
    });

    resizer2.addEventListener("touchstart", function (e) {
        var touch = e.touches[0];
        if (touch) {
            startTracking(touch.clientX);
        }
    });
}

initResizerFn(resizer, sidebar);
initResizerFn2(resizer2, sidebar2);

function sidebarsizefixer(){
    var sidebar = document.querySelector(".sidebar");
    if (sidebar.style.width <= "180px") {
       sidebar.style.width = "5px";
    }else{
       sidebar.style.width = "180px";
    }
   
 }
 function sidebarsizefixer2(){
    var sidebar = document.querySelector(".sidebar2");
    if (sidebar.style.width <= "180px") {
       sidebar.style.width = "5px";
    }else{
       sidebar.style.width = "180px";
    }
   
 }