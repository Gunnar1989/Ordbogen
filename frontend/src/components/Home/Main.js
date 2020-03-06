import React from "react";
import Table from "../Elements/Table";

export default function Main() {
  return (
    <div class="column is-9">
      <div class="content is-medium">
        <div class="box">
          <h4 id="let" class="title is-3">
            To Do List
          </h4>
          <article class="message is-primary">
            <div class="message-body">
              <Table></Table>
            </div>
          </article>
        </div>
      </div>
    </div>
  );
}
