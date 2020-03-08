import React, { useState, useEffect } from "react";
import axios from "axios";

export default function Users() {
  const [users, setUsers] = useState([]);

  useEffect(() => {
    async function fetch() {
      axios.get(`http://127.0.0.1:8000/user/read.php`).then(res => {
        console.log(res.data);
        setUsers(res.data.users);
      });
    }
    fetch();
  }, []);
  return (
    <>
      {users.map(user => (
        <li>{user.name}</li>
      ))}
    </>
  );
}
