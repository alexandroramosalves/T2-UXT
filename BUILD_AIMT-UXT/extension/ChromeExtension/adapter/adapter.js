const serverUrl = "https://t2uxtweb.azurewebsites.net";
function post(endpoint, data) {
  return fetch(serverUrl + "/" + endpoint, {
    method: "POST",
    body: JSON.stringify(data)
  });
}