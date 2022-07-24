class DishApi extends Api {
    static URL = '/backend/controllers/dish-controller.php';

    static fetchAll(callback) {
        this.serverRequest("action=fetchAll", callback);
    }
    
    static fetchByMenuId(menuId, callback) {
        this.serverRequest("action=fetchByMenuId&id=" + menuId, callback);
    }
    
    static add(dish, callback) {
        this.serverRequest("action=add&dish=" + JSON.stringify(dish), callback);
    }

    static delete(dish, callback) {
        this.serverRequest("action=delete&dish=" + JSON.stringify(dish), callback);
    }

    static update(dish, callback) {
        this.serverRequest("action=update&dish=" + JSON.stringify(dish), callback);
    }
}
