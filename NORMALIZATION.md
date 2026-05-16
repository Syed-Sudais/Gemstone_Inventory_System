# Database Normalization Report: Gemstone Sales & Inventory Management System

This document provides a comprehensive analysis of the database schema design,
verifying that all tables comply with the rules of Third Normal Form (3NF) to eliminate data redundancy and
ensure transactional integrity.



### 1. CATEGORIES Table
 **First Normal Form (1NF):** Every attribute contains atomic values. The `category_name` and `description` store simple, single-valued strings with no repeating groups or multi-valued fields.
 **Second Normal Form (2NF):** The table utilizes a single-column primary key (`category_id`). Because the primary key is not composite, partial dependencies are structurally impossible; all non-key attributes are fully functionally dependent on `category_id`.
 **Third Normal Form (3NF):** There are no transitive dependencies. Descriptive elements like `category_name` depend strictly on the `category_id`, and no non-key attribute is determined by another non-key attribute.

### 2. GEMSTONES Table
 **First Normal Form (1NF):** Physical and market characteristics of individual stones (such as `weight_carat`, `color`, `clarity`, `origin`, and `price_per_carat`) are isolated into distinct, single-valued columns.
 **Second Normal Form (2NF):** The table relies on a singular primary key (`gem_id`). Every descriptive attribute of a gemstone maps directly back to this unique identifier.
 **Third Normal Form (3NF):** Instead of embedding repeating category descriptions within this table, a foreign key (`category_id`) is used to reference the `CATEGORIES` table. This removes the transitive dependency where a category description would otherwise depend on a gemstone ID.

### 3. INVENTORY Table
 **First Normal Form (1NF):** Stock volumes (`quantity_in_stock`, `reorder_level`), physical storage tracking (`warehouse_location`), and stock evaluations (`status`) are stored as atomic values.
 **Second Normal Form (2NF):** The primary key is a singular `inventory_id`. All non-key attributes describing warehouse state are fully dependent on this primary identifier.
 **Third Normal Form (3NF):** The `gem_id` field is marked as a Foreign Key with a strict Unique constraint, creating an exact One-to-One (1:1) operational mapping with the `GEMSTONES` catalog. The `status` enum updates dynamically based entirely on `quantity_in_stock` breaking past the `reorder_level`, ensuring no independent non-key anomalies.

### 4. SUPPLIERS Table
 **First Normal Form (1NF):** Corporate identifiers, contact parameters, and physical distribution addresses are decoupled into separate, atomic data blocks (`supplier_name`, `contact_person`, `phone`, `email`, `address`, `city`).
 **Second Normal Form (2NF):** The primary key is a single-column identifier (`supplier_id`). All vendor contact data is fully dependent on this single key.
 **Third Normal Form (3NF):** Every non-key attribute belongs exclusively to the corporate supplier record. No non-key attribute relies on another non-key attribute to establish its meaning (e.g., `city` depends directly on the `supplier_id` record, not on another descriptive attribute).

### 5. CUSTOMERS Table
 **First Normal Form (1NF):** Client profile criteria, structural tracking elements, and onboarding timestamps (`registered_date`) are stored cleanly as atomic metrics.
 **Second Normal Form (2NF):** The primary key is a single column (`customer_id`). All descriptive client fields depend entirely on this primary key.
 **Third Normal Form (3NF):** Historical profile metrics like `total_purchases` depend directly on the `customer_id`. There are no intermediate attributes determining customer properties, ensuring no transitive dependencies exist.

### 6. USERS Table
 **First Normal Form (1NF):** Administrative credentials, access roles, and systemic auditing metrics (`username`, `password_hash`, `email`, `role`, `created_at`, `is_active`) are split into individual, single-valued cells.
 **Second Normal Form (2NF):** The primary key is a singular `user_id`. Every credential and system access role is fully functionally dependent on this identifier.
 **Third Normal Form (3NF):** A staff member's permissions or operational role belongs exclusively to their `user_id`. Modifying user metadata has no transitive side-effects on independent tables.

### 7. PURCHASES Table
 **First Normal Form (1NF):** Incoming B2B supply chain events are securely isolated. Quantitative line items like `quantity` and single `unit_cost` values reside in separate, non-repeating columns.
 **Second Normal Form (2NF):** The primary key is a singular `purchase_id`. All transaction attributes describe that specific supply event exclusively.
 **Third Normal Form (3NF):** Instead of storing duplicate entity profiles, the table utilizes foreign keys (`gem_id`, `supplier_id`, `user_id`) to map connections cleanly back to their primary source tables. Furthermore, `total_cost_Derived` is explicitly treated as a programmatic calculated property ($\text{quantity} \times \text{unit\_cost}$), preventing data redundancy and avoiding a 3NF violation.

### 8. SALES Table
 **First Normal Form (1NF):** Customer outbound retail transactions are separated completely. Transaction metrics like `quantity_sold` and `unit_price` are decoupled into independent data spaces.
 **Second Normal Form (2NF):** The architecture relies on a singular `sale_id` primary key, guaranteeing complete functional dependency for all transactional data fields.
 **Third Normal Form (3NF):** Operational links are managed exclusively through foreign keys (`gem_id`, `customer_id`, `user_id`), ensuring no redundant profile details repeat across multiple sales logs. The transaction total (`total_amount_Derived`) is correctly established as a derived element, ensuring no static, redundant calculations are hardcoded into the relational database layer.
