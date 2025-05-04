CREATE DATABASE nvcTech;

USE nvcTech;

	CREATE TABLE product (
		name VARCHAR(100) ,
        link VARCHAR(255),
		price DECIMAL(10,2),
		image VARCHAR(255)
	);
    
    CREATE TABLE users (
		id INT AUTO_INCREMENT PRIMARY KEY,
		username VARCHAR(50) NOT NULL,
		email VARCHAR(100) NOT NULL,
		password VARCHAR(255) NOT NULL
	);

INSERT INTO product (name, link, price, image) VALUES('Claw 8',  'productDescriptionClaw8.php' ,1099.00, 'Claw8.jpeg');
INSERT INTO product (name, link, price, image) VALUES('Vigor GK71 Sonic Keyboard',  'gk71.php' ,119.99, 'VigorGK71.jpeg');
INSERT INTO product (name, link, price, image) VALUES('DP 2.1 QD-OLED Monitor', 'msiDP.php' ,359.99, 'DP21QD.jpeg');
INSERT INTO product (name, link, price, image) VALUES('Clutch GM51 Lightweight Mouse', 'GM51.php' ,79.99, 'ClutchGM51.jpeg');
INSERT INTO product (name, link, price, image) VALUES('Titan 18HX Laptop', '18HX.php' , 999.99,'Titan18HX.jpeg');


	


SELECT * FROM product;







