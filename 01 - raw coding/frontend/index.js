
const restaurantsTable = document.getElementById('restaurants-table');

fetchAllRestaurants((restaurants) => {
    let restaurantsArray = JSON.parse(restaurants);
    restaurantsTable.innerHTML = "<thead><tr><th>Id</th><th>Name</th></tr></thead>";
    let tbody = document.createElement("tbody");
    restaurantsArray.forEach(restaurant => {
        let tr = document.createElement('tr');
        tr.innerHTML = `<td>${restaurant.id}</td><td>${restaurant.name}</td>`;
        tr.setAttribute("onclick", `window.location.href = 'restaurant/'; restaurantId = ${restaurant.id}`);
        tbody.appendChild(tr);
    });
    restaurantsTable.appendChild(tbody);
});
