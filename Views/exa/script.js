$("#start").click(function () {
  //   alert("start");
  $("#content-start").addClass("animate__animated animate__backOutLeft");
  setTimeout(function () {
    $("#content-start").remove();
    $("#content-books").removeClass("hidden");
    $("#content-books").addClass(
      "container animate__animated animate__backInRight"
    );
  }, 1000);
});
