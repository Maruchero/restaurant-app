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

// Api base class
class Api {
  static URL;
  static showResults = true;
  static showResponseTime = true;

  static serverRequest(parameters, callback) {
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
        callback(res.data);
      }
    };
  }
}
