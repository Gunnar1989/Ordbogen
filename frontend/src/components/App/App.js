import React, { useRef, useState, useEffect, useCallback } from "react";
import { Route, BrowserRouter as Router, Switch } from "react-router-dom";
import Home from "../Home/index";

export default function App() {
  return (
    <div>
      <link
        href="https://fonts.googleapis.com/css?family=Archivo+Black&display=swap"
        rel="stylesheet"
      />
      <Router>
        <Switch>
          <Route exact path="/" component={Home} />
        </Switch>
      </Router>
    </div>
  );
}
