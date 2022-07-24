// Cookie parser
const cookies = {};
for (let cookie of document.cookie.split('; ')) {
    let [key, value] = cookie.split('=');
    cookies[key] = value;
}

// Api base class
class Api {
    static URL;

    static serverRequest(parameters, callback) {
        let request = new XMLHttpRequest();
        request.open("POST", this.URL);
        request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        request.send(parameters);
        request.onreadystatechange = () => {
            if (request.readyState === 4 && request.status === 200) {
                try {
                    let res = JSON.parse(request.responseText);
                    callback(res);
                } catch (e) {
                    console.error(e);
                }
            }
        }
    }
}
