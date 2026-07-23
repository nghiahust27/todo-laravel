# Ứng dụng Todo

Ứng dụng quản lý công việc Todo được xây dựng bằng Laravel, PostgreSQL, Laravel Sanctum, Laravel Breeze, Blade, Tailwind CSS và Docker.

Ứng dụng bao gồm:

- Giao diện web sử dụng Blade
- RESTful API quản lý Todo
- Xác thực API bằng Laravel Sanctum
- Đăng ký, đăng nhập và đăng xuất
- Quản lý Todo theo từng người dùng
- Tìm kiếm Todo theo tiêu đề
- Lọc Todo theo trạng thái
- Phân quyền bằng Laravel Policy
- Cơ sở dữ liệu PostgreSQL 16
- Chạy ứng dụng bằng Docker và Docker Compose

---

### 1.1 Công nghệ sử dụng

- PHP 8.3
- Laravel
- Laravel Breeze
- Laravel Sanctum
- Blade
- Tailwind CSS
- Vite
- PostgreSQL 16
- Docker
- Docker Compose

---
### 1.2. Kiến trúc đã chọn

## Kiến trúc B: Controller → Service → Model

Project sử dụng kiến trúc **Controller → Service → Model** để phân chia rõ trách nhiệm giữa các thành phần trong ứng dụng. Controller chịu trách nhiệm tiếp nhận HTTP Request, validate dữ liệu và trả về HTTP Response hoặc View. Service chịu trách nhiệm xử lý logic nghiệp vụ của Todo, giúp Controller không phải chứa quá nhiều business logic. Model chịu trách nhiệm tương tác với cơ sở dữ liệu thông qua Eloquent ORM. Kiến trúc này giúp code dễ bảo trì, dễ mở rộng và thuận tiện cho việc kiểm thử.

### Sơ đồ kiến trúc

```text
                    Client
                       │
                       │ HTTP Request
                       ▼
              ┌─────────────────┐
              │    Controller    │
              │                 │
              │ - Nhận Request  │
              │ - Validate      │
              │ - Authorization │
              └────────┬────────┘
                       │
                       │ Gọi Service
                       ▼
              ┌─────────────────┐
              │     Service     │
              │                 │
              │ - Business Logic│
              │ - Xử lý Todo    │
              └────────┬────────┘
                       │
                       │ Gọi Model
                       ▼
              ┌─────────────────┐
              │      Model      │
              │                 │
              │ - Eloquent ORM  │
              │ - Database Query│
              └────────┬────────┘
                       │
                       │ SQL Query
                       ▼
              ┌─────────────────┐
              │   PostgreSQL 16 │
              └────────┬────────┘
                       │
                       │ Data
                       ▼
              ┌─────────────────┐
              │      Model      │
              └────────┬────────┘
                       │
                       ▼
              ┌─────────────────┐
              │     Service     │
              └────────┬────────┘
                       │
                       ▼
              ┌─────────────────┐
              │    Controller   │
              └────────┬────────┘
                       │
                       │ HTTP Response
                       ▼
                    Client
```

### 2.1. Xác thực người dùng

Người dùng có thể:

- Đăng ký tài khoản
- Đăng nhập
- Đăng xuất
- Lấy thông tin người dùng đang đăng nhập

API sử dụng Laravel Sanctum để xác thực bằng Bearer Token.

---

### 2.2. Quản lý Todo

Người dùng đã đăng nhập có thể:

- Tạo Todo
- Xem danh sách Todo của mình
- Cập nhật Todo
- Xóa Todo
- Tìm kiếm Todo theo tiêu đề
- Lọc Todo theo trạng thái

Mỗi Todo thuộc về một người dùng cụ thể.

Người dùng chỉ có thể xem và quản lý các Todo của chính mình.

---

### 2.3. Giao diện Web

Ứng dụng cung cấp giao diện Blade cho:

- Đăng ký
- Đăng nhập
- Danh sách Todo
- Tạo Todo
- Chỉnh sửa Todo
- Xóa Todo
- Tìm kiếm Todo
- Lọc Todo theo trạng thái

---

# 3. Cấu trúc project

```text
todo/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   ├── Requests/
│   │   └── Resources/
│   ├── Models/
│   ├── Policies/
│   └── Services/
│
├── bootstrap/
├── config/
├── database/
│   ├── factories/
│   ├── migrations/
│   └── seeders/
│
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
│
├── routes/
│   ├── api.php
│   └── web.php
│
├── storage/
├── tests/
│
├── .env.example
├── .gitignore
├── Dockerfile
├── docker-compose.yml
├── composer.json
├── composer.lock
├── package.json
├── package-lock.json
├── tailwind.config.js
├── vite.config.js
├── Todo API.postman_collection.json
└── README.md

```

---

# 4. Yêu cầu môi trường

Ứng dụng yêu cầu:

- Ubuntu 24
- Docker Engine
- Docker Compose Plugin

Ứng dụng chạy bằng Docker với tối thiểu 2 service:

- `app`: Laravel/PHP
- `db`: PostgreSQL 16

---

# 5. Clone project

Clone repository:

```bash
git clone <REPOSITORY_URL>
```

Di chuyển vào thư mục project:

```bash
cd todo
```

Thay `<REPOSITORY_URL>` bằng URL repository Git thực tế.

---

# 6. Cấu hình môi trường

Tạo file `.env` từ file `.env.example`:

```bash
cp .env.example .env
```

Cấu hình database trong `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=db
DB_PORT=5432
DB_DATABASE=todo_app
DB_USERNAME=todo
DB_PASSWORD=secret
```

---

# 7. Khởi động Docker

Build và khởi động các container:

```bash
docker compose up -d --build
```

Kiểm tra trạng thái container:

```bash
docker compose ps
```

Các service cần chạy:

```text
todo_app
todo_db
```

---

# 8. Tạo Application Key

Chạy:

```bash
docker compose exec app php artisan key:generate
```

---

# 9. Chạy Migration

Chạy migration để tạo các bảng trong PostgreSQL:

```bash
docker compose exec app php artisan migrate
```

Database sử dụng PostgreSQL 16.

Dữ liệu PostgreSQL được lưu bằng Docker volume:

```text
pgdata
```

Docker volume giúp dữ liệu database không bị mất khi container được restart hoặc stop.

---

# 10. Truy cập ứng dụng

Trang web:

```text
http://localhost:8000
```

Trang đăng nhập:

```text
http://localhost:8000/login
```

Trang đăng ký:

```text
http://localhost:8000/register
```

Trang quản lý Todo:

```text
http://localhost:8000/todos
```

---

# 11. API

Base URL của API:

```text
http://localhost:8000/api
```

API có thể được kiểm tra bằng Postman.

---

## 11.1. Đăng ký

```http
POST /api/auth/register
```

URL đầy đủ:

```text
http://localhost:8000/api/auth/register
```

Body JSON:

```json
{
    "name": "Test User",
    "email": "test@example.com",
    "password": "password123",
    "password_confirmation": "password123"
}
```

---

## 11.2. Đăng nhập

```http
POST /api/auth/login
```

URL đầy đủ:

```text
http://localhost:8000/api/auth/login
```

Body JSON:

```json
{
    "email": "test@example.com",
    "password": "password123"
}
```

Sau khi đăng nhập thành công, API trả về authentication token.

Sử dụng token này cho các API yêu cầu đăng nhập.

Trong Postman, thêm:

```text
Authorization: Bearer <TOKEN>
```

---

## 11.3. Lấy thông tin người dùng đang đăng nhập

```http
GET /api/auth/me
```

URL đầy đủ:

```text
http://localhost:8000/api/auth/me
```

Yêu cầu:

```text
Authorization: Bearer <TOKEN>
```

API trả về thông tin của người dùng đang đăng nhập.

---

## 11.4. Đăng xuất

```http
POST /api/auth/logout
```

URL đầy đủ:

```text
http://localhost:8000/api/auth/logout
```

Yêu cầu:

```text
Authorization: Bearer <TOKEN>
```

---

# 12. Todo API

Các API Todo yêu cầu người dùng phải đăng nhập.

Thêm Bearer Token vào request:

```text
Authorization: Bearer <TOKEN>
```

---

## 12.1. Lấy danh sách Todo

```http
GET /api/todos
```

URL:

```text
http://localhost:8000/api/todos
```

API chỉ trả về các Todo thuộc về người dùng đang đăng nhập.

---

## 12.2. Tạo Todo

```http
POST /api/todos
```

URL:

```text
http://localhost:8000/api/todos
```

Body JSON mẫu:

```json
{
    "title": "Học Laravel",
    "description": "Học phát triển API bằng Laravel",
    "status": "todo",
    "due_date": "2026-07-30"
}
```

---

## 12.3. Xem chi tiết Todo

```http
GET /api/todos/{id}
```

Ví dụ:

```text
http://localhost:8000/api/todos/1
```

Người dùng chỉ có thể xem Todo thuộc về tài khoản của mình.

---

## 12.4. Cập nhật Todo

```http
PUT /api/todos/{id}
```

Ví dụ:

```text
http://localhost:8000/api/todos/1
```

Body JSON mẫu:

```json
{
    "title": "Học Laravel API",
    "description": "Hoàn thành Todo API",
    "status": "doing",
    "due_date": "2026-08-01"
}
```

---

## 12.5. Xóa Todo

```http
DELETE /api/todos/{id}
```

Ví dụ:

```text
http://localhost:8000/api/todos/1
```

Người dùng chỉ có thể xóa Todo của chính mình.

---

# 13. Tìm kiếm Todo

Có thể tìm kiếm Todo theo tiêu đề bằng query parameter `search`.

Ví dụ:

```http
GET /api/todos?search=Laravel
```

URL:

```text
http://localhost:8000/api/todos?search=Laravel
```

Kết quả trả về các Todo có tiêu đề chứa từ khóa tìm kiếm.

---

# 14. Lọc Todo theo trạng thái

Có thể lọc Todo bằng query parameter `status`.

Các trạng thái:

```text
todo
doing
done
```

Ví dụ:

```http
GET /api/todos?status=doing
```

URL:

```text
http://localhost:8000/api/todos?status=doing
```

---

# 15. Kết hợp tìm kiếm và lọc

Có thể sử dụng tìm kiếm và lọc cùng lúc.

Ví dụ:

```http
GET /api/todos?search=Laravel&status=doing
```

URL:

```text
http://localhost:8000/api/todos?search=Laravel&status=doing
```

---

# 16. Xác thực và phân quyền

Ứng dụng sử dụng Laravel Sanctum để xác thực API.

Mỗi Todo thuộc về một User thông qua:

```text
Todo.user_id
```

Ứng dụng sử dụng Laravel Policy để kiểm tra quyền truy cập Todo.

Người dùng không thể:

- Xem Todo của người dùng khác
- Cập nhật Todo của người dùng khác
- Xóa Todo của người dùng khác

Nếu người dùng cố gắng thực hiện thao tác không được phép, hệ thống sẽ trả về lỗi `403 Unauthorized`.

---

# 17. Docker Services

Ứng dụng sử dụng 2 Docker service chính.

## App

Service `app` chạy:

- PHP
- Laravel
- Composer
- Node.js
- npm
- Vite
- Tailwind CSS

Ứng dụng được chạy tại:

```text
http://localhost:8000
```

## Database

Service `db` sử dụng:

```text
PostgreSQL 16
```

Database sử dụng Docker volume:

```text
pgdata
```

Laravel kết nối tới PostgreSQL bằng:

```text
Host: db
Port: 5432
```

PostgreSQL không cần expose port `5432` ra host vì Laravel và PostgreSQL giao tiếp với nhau thông qua mạng nội bộ của Docker Compose.

---


# 18. Lưu trữ dữ liệu Database

PostgreSQL sử dụng Docker named volume:

```text
pgdata
```

Database data được lưu độc lập với PostgreSQL container.

Khi restart hoặc stop container, dữ liệu database vẫn được giữ lại.

Dừng container mà không xóa database:

```bash
docker compose down
```

Khởi động lại:

```bash
docker compose up -d
```

Không sử dụng lệnh dưới đây nếu không muốn xóa dữ liệu database:

```bash
docker compose down -v
```

Lệnh `docker compose down -v` sẽ xóa Docker volume và dữ liệu PostgreSQL.

---

# 19. Các bước chạy project từ đầu

Trong một môi trường mới, thực hiện lần lượt:

```bash
git clone <REPOSITORY_URL>

cd todo

cp .env.example .env

docker compose up -d --build

docker compose exec app php artisan key:generate

docker compose exec app php artisan migrate
```

Sau đó truy cập:

```text
Web:
http://localhost:8000

Todo:
http://localhost:8000/todos

API:
http://localhost:8000/api
```

Ứng dụng đã sẵn sàng để sử dụng.