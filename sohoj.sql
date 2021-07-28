CREATE TABLE Product (product_id int(10) NOT NULL AUTO_INCREMENT, Name varchar(50) NOT NULL, Location varchar(255) NOT NULL, price int(10) NOT NULL, entry_date date, Contact_no int(11) NOT NULL, PRIMARY KEY (product_id));
CREATE TABLE Seller (Seller_id int(10) NOT NULL AUTO_INCREMENT, Name varchar(50) NOT NULL, Age int(3), contact_no int(11) NOT NULL UNIQUE, Location varchar(255) NOT NULL, Password varchar(255) NOT NULL, Email varchar(100) NOT NULL UNIQUE, PRIMARY KEY (Seller_id));
CREATE TABLE Buyer (Buyer_id int(10) NOT NULL AUTO_INCREMENT, Name varchar(50) NOT NULL, Contact int(11) NOT NULL UNIQUE, Email varchar(100) NOT NULL UNIQUE, Location varchar(255) NOT NULL, password varchar(255) NOT NULL, PRIMARY KEY (Buyer_id));
CREATE TABLE `Add` (Productproduct_id int(10) NOT NULL, SellerSeller_id int(10) NOT NULL, PRIMARY KEY (Productproduct_id, SellerSeller_id));
CREATE TABLE Cart (orderid int(10) AUTO_INCREMENT,BuyerBuyer_id int(10) NOT NULL, Productproduct_id int(10) NOT NULL, price int(10) NOT NULL, payed_money int(10) NOT NULL, Due int(10) NOT NULL, PRIMARY KEY (orderid));
ALTER TABLE `Add` ADD INDEX FKAdd753958 (Productproduct_id), ADD CONSTRAINT FKAdd753958 FOREIGN KEY (Productproduct_id) REFERENCES Product (product_id);
ALTER TABLE `Add` ADD INDEX FKAdd304585 (SellerSeller_id), ADD CONSTRAINT FKAdd304585 FOREIGN KEY (SellerSeller_id) REFERENCES Seller (Seller_id);
ALTER TABLE Cart ADD INDEX FKCart524679 (BuyerBuyer_id), ADD CONSTRAINT FKCart524679 FOREIGN KEY (BuyerBuyer_id) REFERENCES Buyer (Buyer_id);
ALTER TABLE Cart ADD INDEX FKCart781159 (Productproduct_id), ADD CONSTRAINT FKCart781159 FOREIGN KEY (Productproduct_id) REFERENCES Product (product_id);
ALTER TABLE product add COLUMN imagename varchar(100) UNIQUE;
ALTER TABLE product ADD availability tinyint(1) DEFAULT NULL;
ALTER TABLE product add COLUMN descriptiom varchar(250);
ALTER TABLE product add totalsold int(11) null;
CREATE TABLE IF NOT EXISTS order1( orderid INT(10) AUTO_INCREMENT, price int(10) not null, tid varchar(255) not null UNIQUE, buyerid int(10), productid int(10), CONSTRAINT pk1 PRIMARY KEY(orderid), CONSTRAINT fk1 FOREIGN KEY (buyerid) REFERENCES cart(BuyerBuyer_id), CONSTRAINT fk2 FOREIGN KEY (productid) REFERENCES cart(Productproduct_id) );
CREATE TABLE IF NOT EXISTS checkout( order_id INT(10) AUTO_INCREMENT, status varchar(255) not null, CONSTRAINT pk2 PRIMARY key(order_id), CONSTRAINT fk4 FOREIGN KEY(order_id) REFERENCES order1(orderid));

CREATE TABLE if NOT EXISTS COMMENT(
    cid int(10) Auto_increment,
	id int(10),
    comments varchar(255),
	pid int(10),
    
    CONSTRAINT pk6 PRIMARY KEY(id),
    CONSTRAINT fk6 FOREIGN KEY(id) REFERENCES product(product_id),
CONSTRAINT fk50 FOREIGN KEY(pid) REFERENCES buyer(Buyer_id));
ALTER TABLE product add COLUMN sellerid int(10);
ALTER TABLE cart add COLUMN tid varchar(100);
ALTER TABLE cart
add COLUMN status varchar(255);

