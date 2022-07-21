
const menusTable = document.querySelector('#menus-table');
const dishesTable = document.querySelector('#dishes-table');
const tablesTable = document.querySelector('#tables-table');

fetchAllMenus((menus) => {
    let menusArray = JSON.parse(menus);
    menusTable.innerHTML = "<thead><tr><th>Id</th><th>Name</th><th>create_date</th><th>modify_date</th><th>id_restaurant</th></tr></thead>";
    let tbody = document.createElement("tbody");
    menusArray.forEach(menu => {
        let tr = document.createElement('tr');
        tr.innerHTML = `<td>${menu.id}</td><td>${menu.name}</td><td>${menu.create_date}</td><td>${menu.modify_date}</td><td>${menu.id_restaurant}</td>`;
        tbody.appendChild(tr);
    });
    menusTable.appendChild(tbody);
});

fetchAllDishes((dishes) => {
    let dishesArray = JSON.parse(dishes);
    dishesTable.innerHTML = "<thead><tr><th>Id</th><th>Name</th><th>ingredients</th><th>id_menu</th></tr></thead>";
    let tbody = document.createElement("tbody");
    dishesArray.forEach(dish => {
        let tr = document.createElement('tr');
        tr.innerHTML = `<td>${dish.id}</td><td>${dish.name}</td><td>${dish.ingredients}</td><td>${dish.id_menu}</td>`;
        tbody.appendChild(tr);
    });
    dishesTable.appendChild(tbody);
});

fetchAllTables((tables) => {
    let tablesArray = JSON.parse(tables);
    tablesTable.innerHTML = "<thead><tr><th>Id</th><th>number</th><th>orders</th><th>id_restaurant</th></tr></thead>";
    let tbody = document.createElement("tbody");
    tablesArray.forEach(table => {
        let tr = document.createElement('tr');
        tr.innerHTML = `<td>${table.id}</td><td>${table.number}</td><td>${table.orders}</td><td>${table.id_restaurant}</td>`;
        tbody.appendChild(tr);
    });
    tablesTable.appendChild(tbody);
});
