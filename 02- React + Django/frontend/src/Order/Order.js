import React from "react";
import { useParams } from "react-router-dom";

import { MenuService, DishService } from "../services";

import "./Order.css";

class OrderCmp extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      restaurantId: props.restaurantId,
      menus: [],
      dishes: {},
    };
  }

  componentDidMount() {
    MenuService.getByRestaurantId(this.state.restaurantId)
      .then((menus) => {
        this.setState({ menus: menus });

        menus.forEach((menu) => {
          DishService.getByMenuId(menu.id)
            .then((dishes) => {
              let _dishes = this.state.dishes;
              _dishes[menu.name] = dishes;
              this.setState({ dishes: _dishes });
              console.log(this.state.dishes);
            })
            .catch((error) => {
              console.error(error);
            });
        });
      })
      .catch((error) => {
        console.log(error);
      });
  }

  render() {
    return (
      <>
        <div className="menu">
          <h1>Menu</h1>

          {Object.keys(this.state.dishes).map((menu) => (  // Foreach sub menu
            <div className="sub-menu" key={menu}>
              <h3>{menu}</h3>
              <div className="dishes">

                {this.state.dishes[menu].map((dish) => (  // Foreach dish
                  <div className="dish" key={dish.id}>
                    <div className="dish-name">{dish.name}</div>
                    <div className="dish-ingredients">{dish.ingredients}</div>
                    <div className="dish-price">{dish.price}</div>
                  </div>
                ))}

              </div>
            </div>
          ))}

        </div>
      </>
    );
  }
}

export function Order() {
  let match = useParams();
  const id = Number.parseInt(match.id);
  return <OrderCmp restaurantId={id} />;
}
