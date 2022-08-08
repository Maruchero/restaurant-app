export class RestaurantService {
  static #URL = process.env.REACT_APP_API + "restaurant/";

  static async getAll() {
    return await fetch(this.#URL)
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async getById(id) {}

  static async add(restaurant) {
    return await fetch(this.#URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(restaurant),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async update(restaurant) {
    return await fetch(this.#URL + restaurant.id, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(restaurant),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async delete(id) {
    return await fetch(this.#URL + id, {
      method: "DELETE",
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }
}

export class MenuService {
  static #URL = process.env.REACT_APP_API + "menu/";

  static async getAll() {
    return await fetch(this.#URL)
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async getById(id) {}

  static async getByRestaurantId(id) {}

  static async add(menu) {
    return await fetch(this.#URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(menu),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async update(menu) {
    return await fetch(this.#URL + menu.id, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(menu),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async delete(id) {
    return await fetch(this.#URL + id, {
      method: "DELETE",
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }
}

export class DishService {
  static #URL = process.env.REACT_APP_API + "dish/";

  static async getAll() {
    return await fetch(this.#URL)
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async getById(id) {}

  static async getByMenuId(id) {}

  static async add(dish) {
    return await fetch(this.#URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(dish),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async update(dish) {
    return await fetch(this.#URL + dish.id, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(dish),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async delete(id) {
    return await fetch(this.#URL + id, {
      method: "DELETE",
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }
}

export class AreaService {
  static #URL = process.env.REACT_APP_API + "area/";

  static async getAll() {
    return await fetch(this.#URL)
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async getById(id) {}

  static async getByRestaurantId(id) {}

  static async add(area) {
    return await fetch(this.#URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(area),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async update(area) {
    return await fetch(this.#URL + area.id, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(area),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async delete(id) {
    return await fetch(this.#URL + id, {
      method: "DELETE",
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }
}

export class TableService {
  static #URL = process.env.REACT_APP_API + "table/";

  static async getAll() {
    return await fetch(this.#URL)
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async getById(id) {}

  static async getByAreaId(id) {}

  static async add(table) {
    return await fetch(this.#URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(table),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async update(table) {
    return await fetch(this.#URL + table.id, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(table),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async delete(id) {
    return await fetch(this.#URL + id, {
      method: "DELETE",
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }
}

export class OrderService {
  static #URL = process.env.REACT_APP_API + "order/";

  static async getAll() {
    return await fetch(this.#URL)
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async getById(id) {}

  static async getByTableId(id) {}

  static async add(order) {
    return await fetch(this.#URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(order),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async update(order) {
    return await fetch(this.#URL + order.id, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(order),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async delete(id) {
    return await fetch(this.#URL + id, {
      method: "DELETE",
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }
}

export class OrderDishService {
  static #URL = process.env.REACT_APP_API + "orderDish/";

  static async getAll() {
    return await fetch(this.#URL)
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async getById(id) {}

  static async getByOrderId(id) {}

  static async getByDishId(id) {}

  static async add(orderDish) {
    return await fetch(this.#URL, {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(orderDish),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async update(orderDish) {
    return await fetch(this.#URL + orderDish.id, {
      method: "PUT",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(orderDish),
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }

  static async delete(id) {
    return await fetch(this.#URL + id, {
      method: "DELETE",
    })
      .then((response) => response.json())
      .then((data) => {
        return data;
      })
      .catch((error) => {
        console.error(error);
      });
  }
}
