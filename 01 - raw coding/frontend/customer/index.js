//const tablesTable = document.getElementById("tables");
const container = document.querySelector("#cards-container");

TableApi.fetchFreeByRestaurantId(cookies.restaurantId, (tables) => {
  /*tablesTable.innerHTML =
    "<thead><tr><th>Id</th><th>number</th><th>free</th><th>orders</th><th>id_restaurant</th></tr></thead>";
  let tbody = document.createElement("tbody");
  tables.forEach((table) => {
    let tr = document.createElement("tr");
    tr.innerHTML = `<td>${table.id}</td><td>${table.number}</td><td>${table.free}</td><td>${table.orders}</td><td>${table.id_restaurant}</td>`;
    tbody.appendChild(tr);
  });
  tablesTable.appendChild(tbody);*/

  tables.forEach((table) => {
    let card = document.createElement("div");
    card.classList.add("card");
    card.onclick = () => {
      cookies.table = JSON.stringify(table);
      saveCookie();
      window.location.href = "order/";
    };
    card.innerHTML = `<img src="../img/table.png"><div class="card-body"><h3 class="card-title">Num: ${table.number}</h3></div>`;
    container.appendChild(card);
  });
});
