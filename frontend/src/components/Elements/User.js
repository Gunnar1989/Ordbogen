import React, { useState, useEffect } from "react";
import axios from "axios";

export default function User({ modalState, setModalState, id }) {
  const [selectedUser, setSelectedUSer] = useState("");

  useEffect(() => {
    async function fetch() {
      axios
        .get(`http://127.0.0.1:8000/user/read_one.php?id=${id}`)
        .then(res => {
          console.log(res.data);
          setSelectedUSer(res.data);
        });
    }
    fetch();
  }, []);

  if (!modalState) {
    return null;
  }
  const closeModal = () => {
    modalState = setModalState(!modalState);
  };
  return (
    <div className="modal is-active has-shadow">
      <div className="modal-background" />
      <div className="modal-card">
        <header className="modal-card-head has-background-primary has-text-centered">
          <p className="modal-card-title has-text-white-ter">
            {selectedUser.name}
          </p>
        </header>
        <section className="modal-card-body">
          <div className="content">
            <div className="field-label is-pulled-left is-normal">
              <label className="label">Name:</label>
            </div>
            <div className="label-body"> {selectedUser.name}</div>
          </div>
        </section>
        <footer className="modal-card-foot">
          <input type="button" value="Create" />
          <a className="button is-danger is-pulled-right" onClick={closeModal}>
            Cancel
          </a>
        </footer>
      </div>
    </div>
  );
}
