const dishUrl = "/backend/controllers/dish-controller.php";

async function fetchAllDishes(func) {
    let request = new XMLHttpRequest();
    request.open("POST", dishUrl);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("action=getAll");
    request.onreadystatechange = () => {
        if (request.readyState === 4 && request.status === 200) {
            let dishes = request.responseText;
            func(dishes);
        }
    }
}