const serverUrl = "http://localhost:8000";
function post(endpoint, data) {
  return fetch(serverUrl + "/" + endpoint, {
    method: "POST",
    body: JSON.stringify(data)
  });
}