// When user gets to the table set it to occupied
const table = JSON.parse(cookies.table);
table.free = false;
TableApi.update(table);

// Compile Menu
const restaurantDishes = [];

const menu = document.querySelector('#menu');
menu.innerHTML = '<h2>Menu</h2>';

MenuApi.fetchByRestaurantId(cookies.restaurantId, (menus) => {
    menus.forEach(menu_ => {
        const subMenu = document.createElement('div');
        subMenu.classList.add('submenu');
        subMenu.innerHTML = `
            <h3>${menu_.name}</h3>
        `;
        const menuContent = document.createElement('div');
        menuContent.classList.add('menu-content');
    
        DishApi.fetchByMenuId(menu_.id, (dishes) => {
            dishes.forEach(dish => {
                // add to dishes
                restaurantDishes.push({
                    id: dish.id,
                    name: dish.name,
                    count: 0,
                });
                // add selector to html
                const dishSelector = document.createElement('div');

                // add to html
                const menuItem = document.createElement('div');
                menuItem.classList.add('menu-item');
                menuItem.innerHTML = `
                    <div class="left">
                        <div class="dish-selector">
                            <input type="text" id="dish-${dish.id}" value="0" />
                            <button onclick=addDish(${dish.id})><i class="fa-solid fa-angle-up"></i></button>
                            <button onclick=removeDish(${dish.id})><i class="fa-solid fa-angle-down"></i></button>
                        </div>
                        <h4>${dish.name}</h4>
                        <p>${dish.ingredients}</p>
                    </div>
                    <span>${dish.price}</span>
                `;
                menuContent.appendChild(menuItem);
            });
            subMenu.appendChild(menuContent);
            menu.appendChild(subMenu);
        });
    });
})

function leaveTable() {
    table.free = true;
    TableApi.update(table);
    window.location.href = '../';
}
