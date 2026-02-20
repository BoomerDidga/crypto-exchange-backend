# Crypto Exchange Backend

Backend system for peer-to-peer cryptocurrency exchange (similar to Binance C2C).

---

## Tech Stack
- Laravel 12
- SQLite
- RESTful API
- Eloquent ORM
- Database Seeder

---

## Features

- User account management
- Multi-currency wallet (BTC, ETH, XRP, DOGE, THB, USD)
- Create buy/sell orders
- Internal crypto transfer between users
- Transaction logging
- Database transaction safety (DB::transaction + lockForUpdate)
- Seeder for test data

---

## Database Design

Entities:
- Users
- Wallets
- Currencies
- Orders
- Trades
- Transactions
- Internal Transfers
- External Transfers

(Relationship implemented using Eloquent ORM)

---

## How to Run

1. Clone repository
2. Run:
   composer install
3. Copy environment file:
   cp .env.example .env
4. Generate app key:
   php artisan key:generate
5. Create SQLite database file:
   touch database/database.sqlite
6. Run migration and seed:
   php artisan migrate:fresh --seed
7. Start server:
   php artisan serve

## Example API

POST /api/transfer/internal

{
  "from_wallet_id": 1,
  "to_wallet_id": 2,
  "amount": 10
}

Base API URL:
http://127.0.0.1:8000/api