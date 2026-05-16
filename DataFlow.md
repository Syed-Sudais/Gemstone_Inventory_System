# Milestone 3: Dataflow Documentation

This document describes the flow of data within the Gemstone Inventory System, tracing its lifecycle from initial ingestion through relational database layers to final system outputs.

## 1. Data Ingestion Points (Inputs)
Data enters the database environment through four distinct administrative and operations-driven pipelines:

* **Infrastructure Configuration:** High-level insertion of system user data into the `USERS` table and management-defined taxonomy metrics (such as Diamonds, Rubies, and Sapphires) into the `CATEGORIES` table.
  
* **Stakeholder Registration:** Directory management tracking external entities, including gemstone vendors within the `SUPPLIERS` table and transactional clients within the `CUSTOMERS` table.
  
* **Supply Chain Acquisition:** Operational data compiled when wholesale gem parcels are sourced from global distributors or mines, generating unique transaction rows within the `PURCHASES` table.
  
* **Point of Sale (POS) Retail:** Real-time transaction metrics captured when retail consumers purchase individual gemstone inventory units, generating records within the `SALES` table.

## 2. Relational Processing & Table Dependencies
Data transitions downwards through a rigidly controlled, four-tier relational hierarchy. Upstream master data configurations must exist prior to the execution of downstream operational intersections:

* **Level 1 (Base Primitives):** The tables `USERS`, `CATEGORIES`, `SUPPLIERS`, and `CUSTOMERS` function as independent data matrices that contain no baseline foreign key dependencies on other tables.
  
* **Level 2 (The Product Registry):** The `GEMSTONES` table serves as the primary asset catalog. It maintains a strict operational dependency on `CATEGORIES` via the `category_id` foreign key attribute.
  
* **Level 3 (The Stock Tracking Layer):** The `INVENTORY` table monitors active warehouse counts, vault identification metrics, and stock states. It depends directly on structural row validation from the `GEMSTONES` table.
  
* **Level 4 (The Operational Intersections):** The transaction ledgers `PURCHASES` and `SALES` handle transactional intersections:
  * A `PURCHASES` record cannot execute without active row references from `GEMSTONES` (`gem_id`), `SUPPLIERS` (`supplier_id`), and `USERS` (`user_id`).
  * A `SALES` record cannot execute without active row references from `GEMSTONES` (`gem_id`), `CUSTOMERS` (`customer_id`), and `USERS` (`user_id`).

## 3. System Outputs
The information processed by the relational database layer yields three distinct outputs used for auditing and management reporting:

* **Real-Time Stock Ledgers:** Live reporting on physical gemstone quantities remaining across specific vault locations to optimize resource distribution.

* **Calculated Financial Performance Matrix:** Real-time calculation of revenue statistics derived via transactional multi-table query logic (multiplying `quantity_sold` by `unit_price`).
  
* **Relational Audit Reports:** Standardized SQL reports utilizing JOIN parameters to evaluate complete historical lifecycles, matching supplier expenses, item parameters, and retail client trends.
