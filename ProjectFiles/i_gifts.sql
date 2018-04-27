-- create and select the database
DROP DATABASE IF EXISTS i_gifts;
CREATE DATABASE i_gifts;
USE i_gifts;

-- create the tables for the database
CREATE TABLE customers (
  customerID        INT(11)            NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(60)    NOT NULL,
  firstName         VARCHAR(60)    NOT NULL,
  lastName          VARCHAR(60)    NOT NULL,
  shipAddress       VARCHAR(60)    NOT NULL,
  billingAddress    VARCHAR(60)    NOT NULL,
  PRIMARY KEY (customerID),
  UNIQUE INDEX emailAddress (emailAddress)
);

CREATE TABLE administrators (
  adminID           INT(11)          NOT NULL   AUTO_INCREMENT,
  emailAddress      VARCHAR(255)   NOT NULL,
  password          VARCHAR(255)   NOT NULL,
  firstName         VARCHAR(255)   NOT NULL,
  lastName          VARCHAR(255)   NOT NULL,
  PRIMARY KEY (adminID)
);


CREATE TABLE shopping_cart (
  cartID          int(11)          NOT NULL,
  totalCost       decimal(10,2)    NOT NULL,
  customerID      int(11)          NOT NULL,
  PRIMARY KEY (cartID),
  FOREIGN KEY (customerID) REFERENCES customers(customerID)
);

CREATE TABLE orders (
  orderID           INT            NOT NULL   AUTO_INCREMENT,
  customerID        INT            NOT NULL,
  orderDate         DATETIME       NOT NULL,
  shipAmount        DECIMAL(10,2)  NOT NULL,
  taxAmount         DECIMAL(10,2)  NOT NULL,
  shipDate          DATETIME                  DEFAULT NULL,
  shipAddress       VARCHAR(60)    NOT NULL,
  cardType          INT            NOT NULL,
  cardNumber        CHAR(16)       NOT NULL,
  cardExpires       CHAR(7)        NOT NULL,
  billingAddress    VARCHAR(60)    NOT NULL,
  PRIMARY KEY (orderID),
  FOREIGN KEY (customerID) REFERENCES customers(customerID)
);

CREATE TABLE categories (
  categoryID        INT(11)            NOT NULL   AUTO_INCREMENT,
  categoryName      VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE products (
  productID         INT            NOT NULL   AUTO_INCREMENT,
  categoryID        INT            NOT NULL,
  productCode       VARCHAR(10)    NOT NULL,
  productName       VARCHAR(255)   NOT NULL,
  description       TEXT           NOT NULL,
  listPrice         DECIMAL(10,2)  NOT NULL,
  discountPercent   DECIMAL(10,2)  NOT NULL   DEFAULT 0.00,
  dateAdded         DATETIME       NOT NULL,
  PRIMARY KEY (productID),
  FOREIGN KEY (categoryID) REFERENCES categories(categoryID),
  UNIQUE INDEX productCode (productCode)
);

CREATE TABLE orderLine (
  orderID           INT(11)           NOT NULL AUTO_INCREMENT,
  productID         INT(11)           NOT NULL,
  itemPrice         DECIMAL(10,2)     NOT NULL,
  discountAmount    DECIMAL(10,2)     NOT NULL,
  quantity          INT               NOT NULL,
  cartID            INT(11)           NOT NULL,
  PRIMARY KEY (orderID, productID),
  FOREIGN KEY (cartID) REFERENCES shopping_cart(cartID),
  FOREIGN KEY (productID) REFERENCES products(productID),
  FOREIGN KEY (orderID) REFERENCES orders(orderID)
);

-- Insert data into the tables
INSERT INTO categories (categoryID, categoryName) VALUES
(1, 'Flowers'),
(2, 'Food'),
(3, 'Stuffed Animals');

INSERT INTO products (productID, categoryID, productCode, productName, description, listPrice, discountPercent, dateAdded) VALUES
(1, 1, 'Rose', 'Roses', 'Our rose arrangements are fresh and hand picked by our floral designers to guaranteed a unique stylish gift for all our loved ones. \r\nFeatures:\r\n\r\n* New features:\r\n* Glass Vase\r\n* Colorful Organic Dye\r\n* Additional decoration for FREE ', '20.00', '10.00', '2009-10-30 09:32:40'),
(2, 1, 'Daisy', 'Daisy & Roses', 'Our Daisy and Rose arrangements are fresh and hand picked by our floral designers to guaranteed a unique stylish gift for all our loved ones. \r\nFeatures:\r\n\r\n* New features:\r\n* Glass Vase\r\n* Colorful Organic Dye\r\n* Additional decoration for FREE ', '25.00', '0.00', '2009-12-05 16:33:13'),
(3, 1, 'Jasmine', 'Jasmine', 'Our flowers arrangements are fresh and hand picked by our floral designers to guaranteed a unique stylish gift for all our loved ones. \r\nFeatures:\r\n\r\n* New features:\r\n* Glass Vase\r\n* Colorful Organic Dye\r\n* Additional decoration for FREE ', '20.00', '10.00', '2010-02-04 11:04:31'),
(4, 1, 'Lily', 'Lily', 'Our flowers arrangements are fresh and hand picked by our floral designers to guaranteed a unique stylish gift for all our loved ones. \r\nFeatures:\r\n\r\n* New features:\r\n* Glass Vase\r\n* Colorful Organic Dye\r\n* Additional decoration for FREE ', '15.00', '0.00', '2010-06-01 11:12:59'),
(5, 3, 'TwoWolfs', 'LU & Luisa Wolf', 'For the ideal partners! Lu and Luisa meet at Loyola and have been inseparable ever sense.', '20.00', '0.00', '2010-07-30 13:58:35'),
(6, 2, ' Mello', 'Marshmallow ', 'Basket full of Chocolate covered Marshmallow and fruits. ', '20.00', '0.00', '2010-07-30 14:12:41'),
(7, 2, 'ChoStraw', 'Chocolate Covered Strawberries ', 'Basket filled with delicious treats that will fulfill your heart. \r\n', '20.00', '30.00', '2010-06-01 11:29:35'),
(8, 2, 'Fruit', 'Chocolate Mixed Fruit ', 'Basket filled with delicious treats that will fulfill your heart. ', '20.00', '0.00', '2010-07-30 14:18:33'),
(9, 3, 'Teddy', 'Teddy Bear', 'Stuffed Animals are more than just a gift for animal lovers it is a gift for all! ', '10.00', '0.00', '2010-07-30 12:46:40'),
(10, 3, 'Wolf', 'Stuffed Loyola Wolf', 'Stuffed Animals are more than just a gift for animal lovers it is a gift for all! ', '10.00', '0.00', '2010-07-30 13:14:15');


INSERT INTO customers (customerID, emailAddress, password, firstName, lastName, shipAddress, billingAddress) VALUES
(1, 'allan.sherwood@yahoo.com', '650215acec746f0e32bdfff387439eefc1358737', 'Allan', 'Sherwood','100 East Ridgewood Ave' ,'110 East Ridgewood Ave'),
(2, 'barryz@gmail.com', '3f563468d42a448cb1e56924529f6e7bbe529cc7', 'Barry', 'Zimmer', '21 Rosewood Rd', '21 Rosewood Rd'),
(3, 'christineb@solarone.com', 'ed19f5c0833094026a2f1e9e6f08a35d26037066', 'Christine', 'Brown', '16285 Wendell St', '19270 NW Cornell Rd');



INSERT INTO orders (orderID, customerID, orderDate, shipAmount, taxAmount, shipDate, shipAddress, cardType, cardNumber, cardExpires, billingAddress) VALUES
(1, 1, '2010-05-30 09:40:28', '5.00', '32.32', '2010-06-01 09:43:13', '100 East Ridgewood Ave', 2, '4111111111111111', '06/2019', 2),
(2, 2, '2010-06-01 11:23:20', '5.00', '0.00', NULL, '21 Rosewood Rd', 2, '4111111111111111', '04/2020', 4),
(3, 1, '2010-06-03 09:44:58', '10.00', '89.92', NULL, '100 East Ridgewood Ave', 2, '4111111111111111', '06/2019', 2);


INSERT INTO administrators (adminID, emailAddress, password, firstName, lastName) VALUES
(1, 'admin@idealgifts.com', '6a718fbd768c2378b511f8249b54897f940e9022', 'Ideal', 'Gifts'),
(2, 'mflores13@luc.edu', '971e95957d3b74d70d79c20c94e9cd91b85f7aae', 'Maribel', 'Flores'),
(3, 'emontenegro@luc.edu', '3f2975c819cefc686282456aeae3a137bf896ee8', 'Eunice', 'Montenegro');

-- Create a user named mgs_user
GRANT SELECT, INSERT, UPDATE, DELETE
ON *
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';
