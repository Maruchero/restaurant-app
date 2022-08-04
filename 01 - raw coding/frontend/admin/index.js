const tablesTable = document.getElementById("tables-table");
let tables;

fetchTables();

function fetchTables() {
  TableApi.fetchAll((result) => {
    tables = result;
    tablesTable.innerHTML =
      "<thead><tr><th>Number</th><th>Free</th><th>Order</th><th>Order time</th><th>mark as completed</th><th>actions</th></tr></thead>";
    tables.forEach((table) => {
      const row = document.createElement("tr");
      row.innerHTML = `<td>${table.number}</td>
        <td>${table.free}</td>
        <td>${table.orders}</td>
        <td>${table.orders}</td>
        <td><button class="icon" title="Mark as completed" style="color:#0c4"><i class="fa-solid fa-check"></i></button></td>
        <td>
          <button onclick="updateTable(${table.id})" class="icon" title="Modify table"><i class="fa-solid fa-pen-to-square"></i></button>
          <button onclick="deleteTable(${table.id})" class="icon" title="Remove table"><i class="fa-solid fa-xmark" style="color:red"></i></button>
        </td>`;
      tablesTable.appendChild(row);
    });
  });
}

function addTable() {
  let lastNumber = 0;
  tables.forEach((table) => {
    if (table.number > lastNumber) lastNumber = table.number;
  });

  const table = {
    number: ++lastNumber,
    free: true,
    orders: "",
    id_restaurant: cookies.restaurantId,
  };

  TableApi.add(table, () => {
    fetchTables();
  });
}

function deleteTable(id) {
  const table = {
    id: id,
    number: null,
    free: null,
    orders: null,
    id_restaurant: null,
  };

  TableApi.delete(table, () => {
    fetchTables();
  });
}
