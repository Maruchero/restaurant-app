CREATE DATABASE db_restaurants;

USE db_restaurants;


--@block
CREATE TABLE `restaurants`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL
);
CREATE TABLE `tables`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `number` INT NOT NULL,
    `free` BOOLEAN NOT NULL,
    `orders` TEXT NOT NULL,
    `id_restaurant` INT UNSIGNED NOT NULL
);
CREATE TABLE `menus`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `create_date` DATETIME NULL,
    `modify_date` DATETIME NULL,
    `id_restaurant` INT UNSIGNED NOT NULL
);
CREATE TABLE `dishes`(
    `id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` VARCHAR(255) NOT NULL,
    `ingredients` VARCHAR(255) NOT NULL,
    `price` DOUBLE(8, 2) NOT NULL,
    `id_menu` INT UNSIGNED NOT NULL
);
ALTER TABLE
    `tables` ADD CONSTRAINT `tables_id_restaurant_foreign` FOREIGN KEY(`id_restaurant`) REFERENCES `restaurant`(`id`);
ALTER TABLE
    `menu` ADD CONSTRAINT `menu_id_restaurant_foreign` FOREIGN KEY(`id_restaurant`) REFERENCES `restaurant`(`id`);
ALTER TABLE
    `dishes` ADD CONSTRAINT `dishes_id_menu_foreign` FOREIGN KEY(`id_menu`) REFERENCES `menu`(`id`);


--@block
INSERT INTO restaurants(name) VALUES
    ("Marcello's");

INSERT INTO menus(name, create_date, modify_date, id_restaurant) VALUES
    ('Pizze', '2022-07-20 11:50:39.860', '2022-07-20 11:50:39.860', 1),
    ('Cucina', '2022-07-20 11:50:39.860', '2022-07-20 11:50:39.860', 1),
    ('Bibite', '2022-07-20 11:50:39.860', '2022-07-20 11:50:39.860', 1);


INSERT INTO dishes(name, ingredients, price, id_menu) VALUES
    ('Margherita', 'Pomodoro, mozzarella, basilico', 4.50, 1),
    ('Prosciutto', 'Pomodoro, mozzarella, prosciutto cotto', 5.00, 1),
    ('Calzone', 'Pomodoro, mozzarella, prosciutto cotto, salame', 5.50, 1),
    ('Capricciosa', 'Pomodoro, mozzarella, prosciutto cotto, salame, funghi', 6.00, 1),
    ('Quattro formaggi', 'Pomodoro, mozzarella, ricotta, gorgonzola, emmental', 5.50, 1),
    ('Bigoli con ragù di cervo', 'Bigoli, ragù di cervo', 6.50, 2),
    ("Pasta all'arrabbiata", 'Pasta, pomodoro, cipolla, olive nere, capperi, peperoncino, basilico', 9.00, 2),
    ('Carbonara', 'Pasta, pancetta, pecorino, uova', 6.50, 2),
    ('Coca cola', '', 2, 3),
    ('Fanta', '', 2, 3),
    ('Sprite', '', 2, 3),
    ('Pepsi', '', 2, 3),
    ('The limone/pesca', '', 2, 3),
    ('Lemon soda', '', 2, 3);