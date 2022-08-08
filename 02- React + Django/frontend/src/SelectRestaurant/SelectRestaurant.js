import React from "react";
import "./SelectRestaurant.css";

import { Input, GlassCard, Button } from "../MyComponents/MyComponents";

export class SelectRestaurant extends React.Component {
  /* Override */
  constructor(props) {
    super(props);
    this.state = {
      restaurants: [],
    };
  }

  componentDidMount() {
    this.loadRestaurants();
  }

  render() {
    return (
      <>
        <GlassCard>
          <Input label="Username" id="username-input" type="text" />
          <Input label="Password" id="password-input" type="password" />
          <span id="login-output"></span>
          <Button onClick={() => this.#login()}>Login</Button>
        </GlassCard>
      </>
    );
  }

  /* Backend calls */
  loadRestaurants() {
    fetch(process.env.REACT_APP_API + "restaurant")
      .then((response) => response.json())
      .then((data) => {
        this.setState({
          restaurants: data,
        });
      });
  }

  /* Functions */
  #login() {
    const username = document.getElementById("username-input").value;
    const password = document.getElementById("password-input").value;
    const output = document.getElementById("login-output");

    if (username === "") {
      output.innerHTML = "Please insert username";
      return;
    }
    if (password === "") {
      output.innerHTML = "Please insert password";
      return;
    }

    const restaurantIndex = this.state.restaurants.findIndex(
      (restaurant) => restaurant.username === username
    );
    if (!(restaurantIndex+1) || this.state.restaurants[restaurantIndex].password !== password) {
      output.innerHTML = "Username or password is incorrect";
      return;
    }
    output.innerHTML = "Login successful";
    window.location.href = "selectMode/" + this.state.restaurants[restaurantIndex].id;
  }
}
