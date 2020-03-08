import React, { useState, useEffect } from "react";
import axios from "axios";

export default function User({ modalState, setModalState }) {
  const [task, setTask] = useState("");
  const [title, setTitle] = useState("");
  const [description, setDescription] = useState("");
  const [active, setActie] = useState(0);

  if (!modalState) {
    return null;
  }
  const createUser = () => {
    axios
      .post(`http://127.0.0.1:8000/task/create.php`, {
        headers: {
          "Content-Type": "application/json",
          "Access-Control-Allow-Origin": "*"
        },
        body: JSON.stringify({
          title: title,
          description: description,
          active: active
        })
      })
      .then(
        response => {
          console.log(response);
        },
        error => {
          console.log(error);
        }
      );
  };
  const closeModal = () => {
    modalState = setModalState(!modalState);
  };
  const handleChange = value => {};
  return (
    <div className="modal is-active has-shadow">
      <div className="modal-background" />
      <div className="modal-card">
        <header className="modal-card-head has-background-primary has-text-centered">
          <p className="modal-card-title has-text-white-ter">Create Task</p>
        </header>
        <section className="modal-card-body">
          <div className="content">
            <div className="field-label is-pulled-left is-normal">
              <label className="label">Title:</label>
            </div>
            <div className="label-body">
              <input
                type="text"
                className="input"
                onChange={e => setTitle(e.target.value)}
              />
            </div>
            <div className="field-label is-pulled-left is-normal">
              <label className="label">Description:</label>
            </div>
            <div className="label-body">
              <input
                type="text"
                className="input"
                onChange={e => setDescription(e.target.value)}
              />
            </div>
            <div className="field-label is-pulled-left is-normal">
              <label className="label">User ID:</label>
            </div>
            <div className="label-body">
              <input
                type="text"
                className="input"
                onChange={e => handleChange(e.target.value)}
              />
            </div>
            <div className="field-label is-pulled-left is-normal">
              <label className="label">Status:</label>
            </div>
            <div className="label-body">
              <input
                type="text"
                className="input"
                onChange={e => setActie(e.target.value)}
              />
            </div>
          </div>
        </section>
        <footer className="modal-card-foot">
          <input
            type="button"
            className="button"
            value="Create"
            onClick={() => createUser()}
          />
          <a className="button is-danger is-pulled-right" onClick={closeModal}>
            Cancel
          </a>
        </footer>
      </div>
    </div>
  );
}
