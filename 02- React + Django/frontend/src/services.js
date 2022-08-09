class Service {
  static URL = "";

  static async _fetch(method, body = {}) {
    try {
      let response = await fetch(this.URL + method + "/", {
        method: "POST",
        headers: {
          "Content-Type": "application/json",
        },
        body: JSON.stringify(body),
      });
      let data = await response.json();
      return data;
    } catch (error) {
      console.error(error);
      return error;
    }
  }

  static async getAll() {
    return this._fetch("fetchAll");
  }

  static async getById(id) {
    return this._fetch("fetchById", { id });
  }

  static async add(object) {
    return this._fetch("add", object);
  }

  static async update(object) {
    return this._fetch("update", object);
  }

  static async delete(id) {
    return this._fetch("delete", { id });
  }
}

export class RestaurantService extends Service {
  static URL = process.env.REACT_APP_API + "restaurant/";
}

export class MenuService extends Service {
  static URL = process.env.REACT_APP_API + "menu/";

  static async getByRestaurantId(id) {
    return this._fetch("fetchByRestaurantId", { restaurantId: id });
  }
}

export class DishService extends Service {
  static URL = process.env.REACT_APP_API + "dish/";

  static async getByMenuId(id) {
    return this._fetch("fetchByMenuId", { id });
  }
}

export class AreaService extends Service {
  static URL = process.env.REACT_APP_API + "area/";

  static async getByRestaurantId(id) {
    return this._fetch("fetchByRestaurantId", { id });
  }
}

export class TableService extends Service {
  static URL = process.env.REACT_APP_API + "table/";

  static async getByAreaId(id) {
    return this._fetch("fetchByAreaId", { id });
  }
}

export class OrderService extends Service {
  static URL = process.env.REACT_APP_API + "order/";

  static async getByTableId(id) {
    return this._fetch("fetchByTableId", { id });
  }
}

export class OrderDishService extends Service {
  static URL = process.env.REACT_APP_API + "orderdish/";

  static async getByOrderId(id) {
    return this._fetch("fetchByOrderId", { id });
  }
}
