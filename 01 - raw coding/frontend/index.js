
const restaurantsTable = document.getElementById('restaurants-table');

RestaurantApi.fetchAll((restaurants) => {
    restaurantsTable.innerHTML = "<thead><tr><th>Id</th><th>Name</th></tr></thead>";
    let tbody = document.createElement("tbody");
    restaurants.forEach(restaurant => {
        let tr = document.createElement('tr');
        tr.innerHTML = `<td>${restaurant.id}</td><td>${restaurant.name}</td>`;
        tr.onclick = () => {
            cookies.restaurantId = restaurant.id;
            cookies.restaurantName = restaurant.name;
            saveCookie();
            window.location.href = 'restaurant/';
        };
        tbody.appendChild(tr);
    });
    restaurantsTable.appendChild(tbody);
});
