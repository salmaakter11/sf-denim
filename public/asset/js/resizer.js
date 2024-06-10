var resizer = document.querySelector(".resizer"),
    sidebar = document.querySelector(".sidebar");

function initResizerFn(resizer, sidebar) {
    // track current position
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
        updateSidebarWidth(dx);
    }

    function touchMoveHandler(e) {
        var touch = e.touches[0];
        if (touch) {
            var dx = touch.clientX - x;
            updateSidebarWidth(dx);
        }
    }

    function stopTracking() {
        document.removeEventListener("mouseup", stopTracking);
        document.removeEventListener("touchend", stopTracking);
        document.removeEventListener("mousemove", moveHandler);
        document.removeEventListener("touchmove", touchMoveHandler);
    }

    function updateSidebarWidth(dx) {
        var cw = w + dx; // complete width
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

initResizerFn(resizer, sidebar);

function sidebarsizefixer() {
    var sidebar = document.querySelector(".sidebar");
    var currentWidth = parseInt(sidebar.style.width, 10);

    if (currentWidth <= 333) {
        // If the sidebar is closed or has a width less than or equal to 333px, open it.
        sidebar.style.width = "335px";
    } else {
        // If the sidebar is open, close it.
        sidebar.style.width = "5px";
    }
}