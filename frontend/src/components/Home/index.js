import React from "react";
import Hero from "./Hero";
import Sidebar from "./Sidebar";
import Main from "./Main";

export default function index() {
  return (
    <div>
      <Hero></Hero>
      <section className="section">
        <div className="container">
          <div className="columns">
            <Sidebar></Sidebar>
            <Main></Main>
          </div>
        </div>
      </section>
    </div>
  );
}
