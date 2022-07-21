
const menuUrl = "/backend/controllers/menu-controller.php";

async function fetchAllMenus(func) {
    let request = new XMLHttpRequest();
    request.open("POST", menuUrl);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("action=getAll");
    request.onreadystatechange = () => {
        if (request.readyState === 4 && request.status === 200) {
            let menus = request.responseText;
            func(menus);
        }
    }
}