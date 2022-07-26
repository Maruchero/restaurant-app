class TableApi extends Api {
    static URL = '/backend/controllers/table-controller.php';

    static fetchAll(callback) {
        this.serverRequest("action=fetchAll", callback);
    }

    static fetchByRestaurantId(restaurantId, callback) {
        this.serverRequest("action=fetchByRestaurantId&id=" + restaurantId, callback);
    }

    static fetchFreeByRestaurantId(restaurantId, callback) {
        this.serverRequest("action=fetchFreeByRestaurantId&id=" + restaurantId, callback);
    }

    static add(table, callback) {
        this.serverRequest("action=add&table=" + JSON.stringify(table), callback);
    }

    static delete(table, callback) {
        this.serverRequest("action=delete&table=" + JSON.stringify(table), callback);
    }

    static update(table, callback) {
        this.serverRequest("action=update&table=" + JSON.stringify(table), callback);
    }
}
