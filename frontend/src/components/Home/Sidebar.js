import React from "react";
import Users from "./Users";

export default function Sidebar() {
  return (
    <div className="column is-3">
      <aside className="is-medium menu">
        <p className="menu-label">Users</p>
        <ul className="menu-list">
          <Users></Users>
        </ul>
      </aside>
    </div>
  );
}
