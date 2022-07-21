/*
 * In this file we will create ajax requests to our php server
*/

const restaurantUrl = "/backend/controllers/restaurant-controller.php";

async function fetchAllRestaurants(func) {
    let request = new XMLHttpRequest();
    request.open("POST", restaurantUrl);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("action=getAll");
    request.onreadystatechange = () => {
        if (request.readyState === 4 && request.status === 200) {
            let restaurants = request.responseText;
            func(restaurants);
        }
    }
}
