-- ====================================================================
-- MILESTONE 5: ADVANCED DATABASE MANIPULATION & REPORTING (DML)
-- Project: Gemstone Inventory System
-- Group Members: [Syed Sudais Sohail] & [Muhammad Mustafa Iqbal]
-- ====================================================================
USE Gemstone_Inventory_System;

-- --------------------------------------------------------------------
-- REPORT 1: MASTER INVENTORY VALUE REPORT (Multi-Table Join & Aggregation)
-- Target: Joins Gemstones, Categories, and Inventory to show overall stock value.
-- --------------------------------------------------------------------
SELECT 
    c.category_name AS 'Category',
    g.gem_name AS 'Gemstone Name',
    g.gem_type AS 'Type',
    i.quantity_in_stock AS 'Stock Level',
    g.price_per_carat AS 'Price Per Carat',
    (i.quantity_in_stock * g.weight_carat * g.price_per_carat) AS 'Estimated Asset Value',
    i.status AS 'Availability Status'
FROM INVENTORY i
INNER JOIN GEMSTONES g ON i.gem_id = g.gem_id
INNER JOIN CATEGORIES c ON g.category_id = c.category_id
ORDER BY i.quantity_in_stock DESC;


-- --------------------------------------------------------------------
-- REPORT 2: TOP-PERFORMING SALES REVENUE AUDIT (Group By & Having)
-- Target: Finds gemstones generating high-volume revenue (over $5,000).
-- --------------------------------------------------------------------
SELECT 
    g.gem_name AS 'Gemstone',
    g.color AS 'Color Variant',
    COUNT(s.sale_id) AS 'Total Transactions',
    SUM(s.quantity_sold) AS 'Total Units Sold',
    SUM(s.derived_total_amount) AS 'Gross_Revenue_Generated'
FROM SALES s
INNER JOIN GEMSTONES g ON s.gem_id = g.gem_id
GROUP BY g.gem_name, g.color
HAVING SUM(s.derived_total_amount) > 5000.00
ORDER BY Gross_Revenue_Generated DESC;


-- --------------------------------------------------------------------
-- REPORT 3: SUPPLIER PROCUREMENT METRICS (Data Analysis Summary)
-- Target: Evaluates which vendors we spend the most capital with.
-- --------------------------------------------------------------------
SELECT 
    sup.supplier_name AS 'Vendor Name',
    sup.contact_person AS 'Contact',
    COUNT(p.purchase_id) AS 'Total Restock Orders Placed',
    SUM(p.quantity) AS 'Total Items Purchased',
    ROUND(AVG(p.unit_cost), 2) AS 'Average Unit Cost',
    SUM(p.derived_total_cost) AS 'Total_Capital_Invested'
FROM PURCHASES p
INNER JOIN SUPPLIERS sup ON p.supplier_id = sup.supplier_id
GROUP BY sup.supplier_name, sup.contact_person
ORDER BY Total_Capital_Invested DESC;


-- --------------------------------------------------------------------
-- REPORT 4: STOCK REORDER ALERTS (Conditional Filtering & Subqueries)
-- Target: Identifies low stock items beneath critical reorder boundaries.
-- --------------------------------------------------------------------
SELECT 
    g.gem_id,
    g.gem_name,
    i.quantity_in_stock,
    i.reorder_level,
    i.warehouse_location
FROM INVENTORY i
INNER JOIN GEMSTONES g ON i.gem_id = g.gem_id
WHERE i.quantity_in_stock <= i.reorder_level
   OR i.status = 'Out of Stock'
ORDER BY i.quantity_in_stock ASC;


-- --------------------------------------------------------------------
-- TRANSACTION 5: SYSTEM MAINTENANCE (Demonstrating Required UPDATE/DELETE)
-- Target: Fulfills explicit DML structural modification requirements.
-- --------------------------------------------------------------------
SET SQL_SAFE_UPDATES = 0;

-- A. Update operation: Flags low inventory tracking statuses
UPDATE INVENTORY 
SET status = 'Low Stock' 
WHERE quantity_in_stock > 0 AND quantity_in_stock <= reorder_level;

-- B. Delete operation: Safely flushes cancelled, empty or blank order notes
DELETE FROM SALES 
WHERE quantity_sold = 0 OR notes = 'CANCELLED';

SET SQL_SAFE_UPDATES = 1;