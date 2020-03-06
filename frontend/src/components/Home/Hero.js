import React from "react";

export default function Hero() {
  return (
    <section class="hero is-primary">
      <div class="hero-body">
        <div class="columns">
          <div class="column is-12">
            <div class="container content">
              <i class="is-large fab fa-discord"></i>
              <i class="is-large fas fa-code"></i>
              <h1 class="title">Gunnar Helgason</h1>
              <h3 class="subtitle">Ordbog To-Do</h3>
              <a
                href="https://github.com/Gunnar1989/Ordbogen"
                target="_blank"
                class="button is-primary is-large"
              >
                <span class="icon">
                  <i class="fab fa-github"></i>
                </span>
                <span>Github</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
