import React, { useEffect, useState } from "react";
import Table from "../Elements/Table";
import CreateTask from "../Elements/CreateTask";

export default function Main() {
  const [modalState, setModalState] = useState(false);

  return (
    <div className="column is-9">
      <div className="content is-medium">
        <div className="box">
          <h4 id="let" className="title is-3">
            To Do List
          </h4>
          <article className="message is-primary">
            <div className="message-body">
              <Table></Table>
            </div>
          </article>
        </div>
      </div>
      <a onClick={() => setModalState(!modalState)}>Create Task</a>
      {modalState && (
        <CreateTask
          modalState={modalState}
          setModalState={setModalState}
        ></CreateTask>
      )}
    </div>
  );
}
