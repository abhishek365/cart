$(document).ready(function () {
  $("body").on("click", ".add-to-cart", function (e) {
    e.preventDefault();
    // id=$(this).data("id");
    // console.log(id);
    $.ajax({
      method: "POST",
      url: "function.php",
      data: {
        id: $(this).data("id"),
        action: "add",
      },
      dataType: "JSON",
    }).done(function (data) {
      //console.log(data);
      displayCart(data);
    });
  });
});
function displayCart(data) {
  var html = "";
  html = `
    <table>
    <tr>
    <th>Product Id</th>
    <th>Product Name</th>
    <th>Product Quantity</th>
    <th>Product Price</th>
    <th>Remove Products</th>
    </tr>
    `;
  var total = 0;
  for (var i = 0; i < data.length; i++) {
    data[i].price = data[i].price * data[i].quantity;
    html += `
        <tr>
        <td>${data[i].id}</td>
        <td>${data[i].name}</td>
        <td>${data[i].quantity}
        <input type="number" id="inputBtn-${data[i].id}">
        <button data-id="${data[i].id}" type="submit" class ="submitBtn" >Add quantity</td>
        <td>${data[i].price}</td>
        <td><a href='#' data="
        ${data[i].id}
        " class='deleteBtn'>X</a>
        </td>
        </tr>
        `;
    total += data[i].price;
  }
  html += `</table>`;
  html += `<h3>Total cart price:${total}</h3>`;
  $("#table").html(html);
  $("table").css({
    "background-color": "tan",
    width: "100%",
    "text-align": "center",
  });
  $("td").css("padding", "1%");
  $("th").css({ padding: "1%", border: "solid black" });
}
$(document).ready(function () {
  $("body").on("click", ".submitBtn", function (e) {
    e.preventDefault();
    $.ajax({
      method: "POST",
      url: "update.php",
      data: {
        id: $(this).data("id"),
        action: "update",
        value: $("#inputBtn-" + $(this).data("id")).val(),
      },
      dataType: "JSON",
    }).done(function (data) {
      displayCart(data);
    });
  });
});
$(document).ready(function () {
  $("body").on("click", ".deleteBtn", function (e) {
    e.preventDefault();
    $.ajax({
      method: "POST",
      url: "delete.php",
      data: {
        id: $(this).attr("data"),
        action: "delete",
      },
      dataType: "JSON",
    }).done(function (data) {
      displayCart(data);
    });
  });
});
