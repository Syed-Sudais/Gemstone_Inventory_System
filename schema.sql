-- ============================
-- MILESTONE 4: SCHEMA SCRIPT 
-- ============================


CREATE DATABASE IF NOT EXISTS Gemstone_Inventory_System;
USE Gemstone_Inventory_System;


SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS SALES;
DROP TABLE IF EXISTS PURCHASES;
DROP TABLE IF EXISTS INVENTORY;
DROP TABLE IF EXISTS GEMSTONES;
DROP TABLE IF EXISTS USERS;
DROP TABLE IF EXISTS CUSTOMERS;
DROP TABLE IF EXISTS SUPPLIERS;
DROP TABLE IF EXISTS CATEGORIES;
SET FOREIGN_KEY_CHECKS = 1;

-- 1. CATEGORIES TABLE
CREATE TABLE CATEGORIES (
    category_id INT NOT NULL PRIMARY KEY,
    category_name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- 2. SUPPLIERS TABLE
CREATE TABLE SUPPLIERS (
    supplier_id INT NOT NULL PRIMARY KEY,
    supplier_name VARCHAR(150) NOT NULL,
    contact_person VARCHAR(100),
    phone VARCHAR(50),
    email VARCHAR(100),
    address TEXT,
    city VARCHAR(100)
);

-- 3. CUSTOMERS TABLE
CREATE TABLE CUSTOMERS (
    customer_id INT NOT NULL PRIMARY KEY,
    customer_name VARCHAR(150) NOT NULL,
    phone VARCHAR(50),
    email VARCHAR(100),
    address TEXT,
    city VARCHAR(100),
    registered_date DATE NOT NULL,
    total_purchases DECIMAL(15, 2) DEFAULT 0.00
);

-- 4. USERS TABLE
CREATE TABLE USERS (
    user_id INT NOT NULL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    role VARCHAR(50) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_active TINYINT DEFAULT 1
);

-- 5. GEMSTONES TABLE
CREATE TABLE GEMSTONES (
    gem_id INT NOT NULL PRIMARY KEY,
    category_id INT NOT NULL,
    gem_name VARCHAR(150) NOT NULL,
    gem_type VARCHAR(100),
    weight_carat DECIMAL(8, 2) NOT NULL,
    color VARCHAR(50),
    clarity VARCHAR(50),
    origin VARCHAR(100),
    price_per_carat DECIMAL(12, 2) NOT NULL,
    added_date DATE NOT NULL,
    FOREIGN KEY (category_id) REFERENCES CATEGORIES(category_id) ON DELETE RESTRICT ON UPDATE CASCADE
);

-- 6. INVENTORY TABLE 
CREATE TABLE INVENTORY (
    inventory_id INT NOT NULL PRIMARY KEY,
    gem_id INT NOT NULL UNIQUE,
    quantity_in_stock INT NOT NULL DEFAULT 0,
    reorder_level INT NOT NULL DEFAULT 5,
    last_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    warehouse_location VARCHAR(100),
    status VARCHAR(50) NOT NULL DEFAULT 'In Stock',
    FOREIGN KEY (gem_id) REFERENCES GEMSTONES(gem_id) ON DELETE CASCADE ON UPDATE CASCADE
);

-- 7. PURCHASES TABLE 
CREATE TABLE PURCHASES (
    purchase_id INT NOT NULL PRIMARY KEY,
    gem_id INT NOT NULL,
    supplier_id INT NOT NULL,
    user_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_cost DECIMAL(12, 2) NOT NULL,
    derived_total_cost DECIMAL(15, 2), 
    purchase_date DATE NOT NULL,
    notes TEXT,
    FOREIGN KEY (gem_id) REFERENCES GEMSTONES(gem_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (supplier_id) REFERENCES SUPPLIERS(supplier_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (user_id) REFERENCES USERS(user_id) ON DELETE RESTRICT ON UPDATE CASCADE
);

-- 8. SALES TABLE
CREATE TABLE SALES (
    sale_id INT NOT NULL PRIMARY KEY,
    gem_id INT NOT NULL,
    customer_id INT NOT NULL,
    user_id INT NOT NULL,
    quantity_sold INT NOT NULL,
    unit_price DECIMAL(12, 2) NOT NULL,
    derived_total_amount DECIMAL(15, 2), 
    sale_date DATE NOT NULL,
    notes TEXT,
    FOREIGN KEY (gem_id) REFERENCES GEMSTONES(gem_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (customer_id) REFERENCES CUSTOMERS(customer_id) ON DELETE RESTRICT ON UPDATE CASCADE,
    FOREIGN KEY (user_id) REFERENCES USERS(user_id) ON DELETE RESTRICT ON UPDATE CASCADE
);

-- ==================================
-- PERFORMANCE OPTIMIZATION INDEXES 
-- ==================================
CREATE INDEX idx_gemstones_category ON GEMSTONES(category_id);
CREATE INDEX idx_inventory_gem ON INVENTORY(gem_id);
CREATE INDEX idx_purchases_search ON PURCHASES(gem_id, supplier_id);
CREATE INDEX idx_sales_search ON SALES(gem_id, customer_id);