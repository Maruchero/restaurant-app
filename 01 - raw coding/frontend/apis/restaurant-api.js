class RestaurantApi extends Api {
    static URL = '/backend/controllers/restaurant-controller.php';

    static fetchAll(callback) {
        this.serverRequest("action=fetchAll", callback);
    }

    static add(restaurant, callback) {
        this.serverRequest("action=add&restaurant=" + JSON.stringify(restaurant), callback);
    }

    static delete(restaurant, callback) {
        this.serverRequest("action=delete&restaurant=" + JSON.stringify(restaurant), callback);
    }

    static update(restaurant, callback) {
        this.serverRequest("action=update&restaurant=" + JSON.stringify(restaurant), callback);
    }
}
