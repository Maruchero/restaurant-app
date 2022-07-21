
const tableUrl = "/backend/controllers/table-controller.php";

async function fetchAllTables(func) {
    let request = new XMLHttpRequest();
    request.open("POST", tableUrl);
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("action=getAll");
    request.onreadystatechange = () => {
        if (request.readyState === 4 && request.status === 200) {
            let tables = request.responseText;
            func(tables);
        }
    }
}