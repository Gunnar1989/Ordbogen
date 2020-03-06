import axios from "axios";

export async function GetToDo() {
  let response;
  axios
    .get(`http://127.0.0.1:8000/task/read.php`)
    .then(res => {
      response = res.data;
    })
    .then(() => {
      console.log(response);
      return response;
    });
}
