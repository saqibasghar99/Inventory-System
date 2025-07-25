
## Laravel Inventory Management System

### Description

This is a focused Laravel module for managing products, inventory, and sales transactions with pricing and stock rules. It supports:

* Real-time inventory updates
* Time-based and quantity-based pricing
* Transaction safety and rollback on failure
* Concurrency handling

---

## 🚀 Features

* 📦 Product management with SKU, name, and description
* 📊 Inventory tracking (stock, cost, location, lot number)
* 🧮 Smart pricing engine:

  * **Time-based discounts** (e.g., weekend discounts)
  * **Quantity-based discounts** (e.g., buy 10+ get 5% off)
* 💰 Sale transaction module with:

  * Multiple items support
  * Inventory consistency on failure
  * Concurrency safety with `lockForUpdate()`

---

## 🛠️ Setup Instructions

### 1. Clone the repository

```bash
git clone https://github.com/your-username/inventory-system.git
cd inventory-system
```

### 2. Install dependencies

```bash
composer install

```

### 3. Create environment file

```bash
cp .env.example .env
```

### 4. Generate app key

```bash
php artisan key:generate
```

### 5. Run migrations and seeders

```bash
php artisan db:seed
```

### 6. Start the development server

```bash
php artisan serve
```

---

## 🧪 Example API Usage

| Method | Endpoint            | Description                                     |
| ------ | ------------------- | ---------------------------                     |
| GET    | /api/inventory      | List inventory with filters                     |
| GET    | /api/inventory/{id} | Get details of a product                        |
| PUT    | /api/inventory/update/{id}    | Update stock quantity                 |
| POST   | /api/transaction    | Process a transaction                           |

| GET    | /api/pricing/{id}   | Get price of a product                          |
| GET    | /api/audit-logs     | See all transactions logs                       |
| GET    | /api/audit-logs/transaction/{id}  | See detail of single transactions |


### POST `/api/transaction`

```json
{
  "items": [
    { "product_id": 1, "quantity": 5 },
    { "product_id": 2, "quantity": 8 }
  ]
}
    > Applies all discounts and processes transaction with inventory checks.
```

### PUT `/api/inventory/update/{id}`

```json
{
    "stock": 150
}
```

---

## 🕒 Time Tracking

| Task                          | Time Spent   |
| ----------------------------- | ------------ |
| Environment Setup             | 1 hour       |
| Migrations & Models           | 1.5 hours    |
| Pricing Engine Implementation | 2 hours      |
| Transaction Handling          | 2 hours      |
| Concurrency & Locking         | 1.5 hours    |
| Testing & Seeders             | 1 hour       |
| Final Review & Documentation  | 1 hour       |
| **Total**                     | **10 hours** |

---

## ⚠️ Challenges & How I Solved Them

### 1. **Partial Transaction Rollback**

* Solved by using `DB::transaction()` to wrap all operations. On any failure, nothing is persisted.

### 2. **Race Conditions**

* Used `lockForUpdate()` to lock rows and prevent multiple users from buying the last units at the same time.

### 3. **Flexible Pricing Rules**

* Modularized pricing logic into a service class for reusability and maintainability.

---

## 📂 Tech Stack

* Laravel 10+
* MySQL
* ThunderClient / Postman (for API testing)

---

## ✍️ Author

**Muhammad Saqib**
\[https://www.linkedin.com/in/muhammad-saqib-18b191284/]
