import React from "react";

export default function Hero() {
  return (
    <section className="hero is-primary">
      <div className="hero-body">
        <div className="columns">
          <div className="column is-12">
            <div className="container content">
              <i className="is-large fab fa-discord"></i>
              <i className="is-large fas fa-code"></i>
              <h1 className="title">Gunnar Helgason</h1>
              <h3 className="subtitle">Ordbog To-Do</h3>
              <a
                href="https://github.com/Gunnar1989/Ordbogen"
                target="_blank"
                className="button  is-medium"
              >
                <span>Code</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
