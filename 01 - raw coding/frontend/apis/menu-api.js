class MenuApi extends Api {
    static URL = '/backend/controllers/menu-controller.php';

    // Functions accessible from outside
    static fetchAll(callback) {
        this.serverRequest("action=fetchAll", callback);
    }

    static fetchByRestaurantId(restaurantId, callback) {
        this.serverRequest("action=fetchByRestaurantId&id=" + restaurantId, callback);
    }

    static add(menu, callback) {
        this.serverRequest("action=add&menu=" + JSON.stringify(menu), callback);
    }

    static delete(menu, callback) {
        this.serverRequest("action=delete&menu=" + JSON.stringify(menu), callback);
    }

    static update(menu, callback) {
        this.serverRequest("action=update&menu=" + JSON.stringify(menu), callback);
    }
}
