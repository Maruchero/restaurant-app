// Cookie parser
const cookies = {};
for (let cookie of document.cookie.split("; ")) {
  let [key, value] = cookie.split("=");
  cookies[key] = value;
}

function saveCookie() {
  for (let key in cookies) {
    document.cookie = `${key}=${cookies[key]}; `;
  }
}

// Apis
class Api {
  static URL;
  static showResults = true;
  static showResponseTime = true;

  static serverRequest(parameters, callback=null) {
    // make a new request
    let request = new XMLHttpRequest();

    let start;
    if (this.showResponseTime) {
      start = new Date().getTime();
    }

    request.open("POST", this.URL);
    request.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    request.send(parameters);
    request.onreadystatechange = () => {
      if (request.readyState === 4 && request.status === 200) {
        if (this.showResponseTime) {
          let end = new Date().getTime();
          console.log(
            `Server responded in ${end - start}ms for request [${parameters}]`
          );
        }
        if (this.showResults) {
          console.log(request.responseText);
        }
        // check if the response is corrupted
        let res;
        try {
          res = JSON.parse(request.responseText);
          if (res.error) {
            console.error("Internal error: " + res.error);
            return;
          }
        } catch (e) {
          //console.error(e);
          console.error("Failed to parse into JSON: " + request.responseText);
          return;
        }
        // response is good
        if (callback)
          callback(res.data);
      }
    };
  }
}

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

class MenuApi extends Api {
  static URL = '/backend/controllers/menu-controller.php';

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
