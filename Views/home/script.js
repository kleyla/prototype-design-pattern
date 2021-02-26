class Tripulante {
  _color;

  setAtributo(color) {
    this._color = color;
  }
}
$(document).ready(function () {
  console.log("Ready");
  // tripulante1 = new Tripulante();
  // tripulante1.setColor("cian");
  // // n atributos
  // tripulante2 = tripulante1;
  // tripulante1.setColor("rojo");

  // console.log(tripulante1);
  // console.log(tripulante2);

  //   getLeopard();
  getLibros();
});

$("#start").click(function () {
  $("#content-start").addClass("animate__animated animate__backOutLeft");
  setTimeout(function () {
    $("#content-start").remove();
    $("#content-books").removeClass("hidden");
    $("#content-books").addClass(
      "container animate__animated animate__backInRight"
    );
  }, 1000);
});

function getLibros() {
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "biblioteca/operacion";

  var strData = "dato=" + "dato";

  request.open("POST", ajaxUrl, true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(strData);
  // console.log(request);
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var objData = JSON.parse(request.responseText);
      if (objData.status) {
        // console.log(objData["data"].length);

        books = "";
        book8 = "";
        bg = "bg-one";
        for (i = 0; i < objData["data"].length; i++) {
          //   console.log(objData["data"][i]["titulo"]);

          if (objData["data"][i]["tipo"] == "Revista") {
            book = `<div class="book-cover book-border">
                        <h4 class="titulo">${objData["data"][i]["titulo"]}</h4>
                        <h4>${objData["data"][i]["tema"]}</h4>
                    </div>

                    <div class="book-back book-back-border">
                        <p><b>Autores: </b>${objData["data"][i]["autores"]}</p>
                        <p><b>Editorial: </b>${objData["data"][i]["editorial"]}</p>
                    </div>
                </div>`;
          } else {
            book = `<div class="book-cover book-border">
                          <h4>${objData["data"][i]["titulo"]}</h4>
                      </div>
  
                      <div class="book-back book-back-border">
                          <p><b>Autor: </b>${objData["data"][i]["autor"]}</p>
                          <p><b>Editorial: </b>${objData["data"][i]["editorial"]}</p>
                      </div>
                  </div>`;
          }
          if (i >= 0 && i < 4) {
            book = '<div class="book bg-one">' + book;
          }
          if (i >= 4 && i < 8) {
            book = '<div class="book bg-two">' + book;
          }
          if (i >= 8 && i < 12) {
            book = '<div class="book bg-three">' + book;
          }
          if (i >= 12 && i < 16) {
            book = '<div class="book bg-four">' + book;
          }
          if (i >= 16) {
            book = '<div class="book bg-five">' + book;
          }

          book8 = book8 + book;
          if (i == 7 || i == 15 || i == 23) {
            book8 = '<div class="row">' + book8 + "</div>";
            books = books + book8;
            book8 = "";
          }
        }
        $("#content-books").append(books);
      }
    }
  };
}
