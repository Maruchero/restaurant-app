import React from "react";
import { useParams } from "react-router-dom";

import { RestaurantService } from "../services";

import styles from "./SelectMode.module.css";

class SelectModeCmp extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      id: props.restaurantId,
      restaurant: { name: "Restaurant" },
    };
  }

  componentDidMount() {
    RestaurantService.getAll().then((restaurants) => {
      this.setState({
        restaurant: restaurants.find(
          (restaurant) => restaurant.id === this.state.id
        ),
      });
    });
  }

  render() {
    return (
      <section>
        <div className={styles["left-panel"]}>
          <div className={styles["container"]}>
            <h1 className={styles["title"]} id="restaurant-name">
              {this.state.restaurant.name}
            </h1>
            <p className={styles.p}>
              Welcome to our restaurant! Take a look at the menu and enjoy your
              meal.
            </p>
            <div className={styles["buttons"]}>
              <a
                className={styles["button"]}
                href={"../admin/" + this.state.restaurant.id}
              >
                Admin
              </a>
              <a
                className={styles["button"] + " " + styles["empty"]}
                href={"../order/" + this.state.restaurant.id}
              >
                Order
              </a>
            </div>
          </div>
        </div>
        <div className={styles["right-panel"]}>
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

  return <SelectModeCmp restaurantId={id} />;
}
