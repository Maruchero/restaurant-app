import React from "react";
import { useParams } from "react-router-dom";

import { MenuService, DishService } from "../services";

import styles from "./Order.module.css";

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
              dishes.forEach((dish) => {
                dish.count = 0;
              });

              let _dishes = this.state.dishes;
              _dishes[menu.name] = dishes;
              this.setState({ dishes: _dishes });
            })
            .catch((error) => {
              console.error(error);
            });
        });
      })
      .catch((error) => {
        console.error(error);
      });
  }

  render() {
    return (
      <div className={styles.background}>
        <div className={styles.menu}>
          <h1 className={styles.h1}>Menu</h1>

          {Object.keys(this.state.dishes).map(
            (
              menu // Foreach sub menu
            ) => (
              <div className="sub-menu" key={menu}>
                <h3 className={styles["submenu-title"]}>{menu}</h3>
                <div className="dishes">
                  {this.state.dishes[menu].map(
                    (
                      dish // Foreach dish
                    ) => (
                      <div className={styles.dish} key={dish.id}>
                        <div className={styles.grid}>
                          <div className={styles.selector}>
                            <button>-</button>
                            <span>{dish.count}</span>
                            <button>+</button>
                          </div>
                          <div className={styles["dish-name"]}>{dish.name}</div>
                          <div className="dish-ingredients">
                            {dish.ingredients}
                          </div>
                        </div>
                        <div className="dish-price">{dish.price}</div>
                      </div>
                    )
                  )}
                </div>
              </div>
            )
          )}
        </div>
      </div>
    );
  }
}

export function Order() {
  let match = useParams();
  const id = Number.parseInt(match.id);
  return <OrderCmp restaurantId={id} />;
}
