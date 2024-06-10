$(document).ready(function () {
    $(document).on('click ', '#language_toggle', function () {
        var x = document.getElementById("language_toggle");
        if (x.checked == true) {
            x.innerHTML = "ভাষা:&nbsp;&nbsp;";
            sessionStorage.setItem("language", "bangla");
            window.location.href = "/language/bangla";

        } else {
            x.innerHTML = "Language:&nbsp;&nbsp;";
            sessionStorage.setItem("language", "english");
            window.location.href = "/language/english";

        }
    });
});

let prevScrollPos = window.scrollY;
const navbar = document.getElementById("navbar");
const rscontain = document.getElementById("rs-content");
if (window.innerWidth <= 640) {
window.onscroll = function() {
  // Check if the screen width is 640 pixels or less
  if (window.innerWidth <= 640) {
    const currentScrollPos = window.scrollY;

    if (prevScrollPos > currentScrollPos) {
      // Scrolling up
      navbar.style.top = "0px";
      rscontain.style.paddingTop = "300px";
    } else {
      // Scrolling down
      navbar.style.top = `-${navbar.offsetHeight}px`;
      rscontain.style.paddingTop = "250px";
    }

    prevScrollPos = currentScrollPos;
  } else {
    // Reset styles if the screen width is greater than 640 pixels
    navbar.style.top = "0";
    rscontain.style.paddingTop = "20px";
  }
};
}
//  // Alpine.js code
//  document.addEventListener('DOMContentLoaded', function () {
  
//   Alpine.data('modalHandler', () => ({
//       openModal: () => {
//           // Handle opening the modal here
//       },
//       hideNavbar: () => {
//           // Handle hiding the navbar here
          
          
//           const navbar = document.getElementById("navbar");
//           if (navbar) {
//               navbar.style.top = "0px";
//           }
//       },
//   }));
// });
