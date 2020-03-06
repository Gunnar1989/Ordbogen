import React, { useEffect, useState } from "react";
import axios from "axios";
import User from "./User";
import Todo from "./Todo";

export default function Table() {
  const [todos, setTodos] = useState([]);
  const [id, setId] = useState(0);
  const [todoId, setTodoId] = useState(0);
  const [modalState, setModalState] = useState(false);
  const [todoModalState, setToDoModalState] = useState(false);

  useEffect(() => {
    async function fetch() {
      axios.get(`http://127.0.0.1:8000/task/read.php`).then(res => {
        setTodos(res.data.tasks);
        console.log(res.data.tasks);
      });
    }
    fetch();
  }, []);

  return (
    <>
      <table className="">
        <thead>
          <tr>
            <th>Task</th>
            <th>Description</th>
            <th>Created</th>
            <th>Assigned To</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          {todos.map(todo => (
            <tr>
              <td>
                <a
                  onClick={() => {
                    setTodoId(todo.id);
                    setToDoModalState(!todoModalState);
                  }}
                >
                  {todo.title}
                </a>
              </td>
              <td>{todo.description}</td>
              <td>{todo.datetime}</td>
              <td>
                <a
                  onClick={() => {
                    setId(todo.user_id);
                    setModalState(!modalState);
                  }}
                >
                  {todo.user_name ? todo.user_name : "Unassinged"}
                </a>
              </td>
              <td>{todo.active ? "Yes" : "No"}</td>
            </tr>
          ))}
        </tbody>
      </table>
      {modalState && (
        <User id={id} modalState={modalState} setModalState={setModalState} />
      )}
      {todoModalState && (
        <Todo
          todoId={todoId}
          todoModalState={todoModalState}
          setToDoModalState={setToDoModalState}
        />
      )}
    </>
  );
}
