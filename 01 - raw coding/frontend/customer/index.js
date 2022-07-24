let tablesTable = document.getElementById("tables");

fetchAllTables((tables) => {
  let tablesArray = JSON.parse(tables);
  tablesTable.innerHTML =
    "<thead><tr><th>Id</th><th>number</th><th>free</th><th>orders</th><th>id_restaurant</th></tr></thead>";
  let tbody = document.createElement("tbody");
  tablesArray.forEach((table) => {
    let tr = document.createElement("tr");
    tr.innerHTML = `<td>${table.id}</td><td>${table.number}</td><td>${table.free}</td><td>${table.orders}</td><td>${table.id_restaurant}</td>`;
    tbody.appendChild(tr);
  });
  tablesTable.appendChild(tbody);
});
