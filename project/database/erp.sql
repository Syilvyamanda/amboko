CREATE DATABASE IF NOT EXISTS erp CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE erp;

DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS products;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category VARCHAR(50) NOT NULL,
    material VARCHAR(50) DEFAULT 'Combed Cotton',
    price DECIMAL(12,2) NOT NULL,
    discount INT DEFAULT 0,
    stock INT DEFAULT 0,
    availability ENUM('In Stock','Pre-Order','Limited Edition') DEFAULT 'In Stock',
    image VARCHAR(255) NOT NULL,
    catalog_image VARCHAR(255) DEFAULT NULL,
    detail_image VARCHAR(255) DEFAULT NULL,
    description TEXT,
    is_active TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    rating TINYINT NOT NULL,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_reviews_product FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(100) NOT NULL,
    phone VARCHAR(30),
    address TEXT,
    total DECIMAL(12,2) DEFAULT 0,
    status ENUM('Pending','Paid','Packed','Shipped','Completed','Cancelled') DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    price DECIMAL(12,2) NOT NULL,
    CONSTRAINT fk_items_order FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    CONSTRAINT fk_items_product FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products
(name,category,material,price,discount,stock,availability,image,catalog_image,detail_image,description)
VALUES
('Loose Fit Jacket','Jackets','Heavy Terry',120000,15,20,'In Stock','assets/jacket.jpg','assets/catalog-jacket.jpg','assets/detail-jacket.jpg',
'Loose fit sweatshirt jacket in medium weight cotton-blend fabric with a generous, but not oversized silhouette, jersey lined, drawstring hood, dropped shoulders, and long sleeves. Wide ribbing at cuffs and soft, brushed inside.'),
('T-Shirt','T-Shirt','Combed Cotton',50000,10,30,'In Stock','assets/tshirt.jpg','assets/catalog-tshirt.jpg','assets/tshirt.jpg',
'Classic everyday T-Shirt with a comfortable regular fit and soft cotton fabric.'),
('Short Pants','Trousers/pants','Ripstop',35000,10,25,'In Stock','assets/short.jpg','assets/catalog-short.jpg','assets/short.jpg',
'Lightweight short pants with relaxed fit and practical side details.'),
('Long Pants','Long Pants','Micro-Twill',80000,10,18,'In Stock','assets/longpants.jpg','assets/catalog-longpants.jpg','assets/longpants.jpg',
'Long pants with a clean silhouette, comfortable waist and versatile everyday styling.'),
('Long Pants Premium','Long Pants','Heavy Terry',200000,0,8,'Limited Edition','assets/longpants.jpg','assets/catalog-hoodie.jpg','assets/longpants.jpg',
'Premium long pants from the latest Amboko collection.'),
('New Edition','New Edition','Combed Cotton',150000,0,0,'Pre-Order','assets/hero.jpg','assets/hero.jpg','assets/hero.jpg',
'New edition coming soon. Pre-order is available for selected customers.');

INSERT INTO reviews (product_id,name,rating,comment) VALUES
(1,'April',5,'Bahannya nyaman dan modelnya sesuai foto.'),
(1,'Raka',5,'Jaket bagus dan cutting-nya relaxed.'),
(1,'Nina',4,'Ukuran cukup pas dan pengiriman cepat.');
