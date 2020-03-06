import React from "react";
import Hero from "./Hero";
import Sidebar from "./Sidebar";
import Main from "./Main";

export default function index() {
  return (
    <div>
      <Hero></Hero>
      <section class="section">
        <div class="container">
          <div class="columns">
            <Sidebar></Sidebar>
            <Main></Main>
          </div>
        </div>
      </section>
    </div>
  );
}
