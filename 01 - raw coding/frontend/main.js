// Cookie parser
const cookies = {};
for (let cookie of document.cookie.split('; ')) {
    let [key, value] = cookie.split('=');
    cookies[key] = value;
}
