import React from "react";
import { useParams } from "react-router-dom";

import './SelectMode.css';

class SelectModeCmp extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      id: props.restaurantId,
      restaurant: { name: "Restaurant" },
    };
  }

  componentDidMount() {
    this.#loadRestaurant();
  }

  #loadRestaurant() {
    fetch(process.env.REACT_APP_API + "restaurant/")
      .then((response) => response.json())
      .then((data) => {
        this.setState({
        restaurant: data.find((restaurant) => restaurant.id === this.state.id),
        });
      });
  }

  render () {
    return (
      <section>
        <div className="left-panel">
          <div className="container">
            <h1 className="title" id="restaurant-name">
              {this.state.restaurant.name}
            </h1>
            <p>
              Welcome to our restaurant! Take a look at the menu and enjoy your
              meal.
            </p>
            <div className="buttons">
              <a className="button" href="../admin/">
                Admin
              </a>
              <a className="button empty" href="../customer/">
                Customer
              </a>
            </div>
          </div>
        </div>
        <div className="right-panel">
          <img src="/restaurant-home.jpg" alt="" />
        </div>
      </section>
    );
  }
}

export function SelectMode(props) {
  let match = useParams();
  const id = Number.parseInt(match.id);
  //const { token } = props;

  return (
    <SelectModeCmp restaurantId={id} />
  );
}
