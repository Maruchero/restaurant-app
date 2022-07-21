/*
 * In this file we will create ajax requests to our php server
*/

const url = "/backend/controllers/restaurant-controller.php";

async function fetchAllRestaurants(func=null) {
    let request = new XMLHttpRequest();
    request.open("GET", url + "?action=getAllRestaurants");
    request.send();
    request.onreadystatechange = () => {
        if (request.readyState === 4 && request.status === 200) {
            let restaurants = request.responseText;
            if (func) func(restaurants);
        }
    }
}