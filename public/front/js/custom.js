  /* =============================================================================
    -------------------------------  Nav Icon  ---------------------------------
    ============================================================================= */


const navbar_icon = document.querySelector(".navbar-icon");
navbar_icon.addEventListener("click", function() {
  const body = document.body;
  body.classList.toggle("nav-open");
});

  /* =============================================================================
    -------------------------------  Header  ---------------------------------
    ============================================================================= */


$(document).ready(function() {
  $(window).scroll(function() {
    if ($(document).scrollTop() > 270) {
      $(".header-area").addClass("shrink")
    } else {
      $(".header-area").removeClass("shrink")
    }
  });
});
    



  /* =============================================================================
    -------------------------------  DropDown Hover  ---------------------------------
    ============================================================================= */

    // $(document).ready(function () {
    //     $('.dropdown').hover(function () {
    //     $('.dropdown-menu').addClass('show');
    //     },  function () {
    //     $('.dropdown-menu').removeClass('show');
    //    })
    // })

  

