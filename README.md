<p align="center">
  <img src="screenshots/logo.png" width="250" alt="KStarter Laravel" />
</p>


<p align="center">
  A modern, production-ready Laravel 11 admin starter kit with custom authentication,<br>
  role-based access control, user management, and a polished Sneat Bootstrap 5 admin panel.
</p>

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-11-red?logo=laravel&logoColor=white" alt="Laravel 11" />
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?logo=php&logoColor=white" alt="PHP 8.2+" />
  <img src="https://img.shields.io/badge/Bootstrap-5-7952B3?logo=bootstrap&logoColor=white" alt="Bootstrap 5" />
  <img src="https://img.shields.io/badge/License-MIT-green" alt="MIT License" />
</p>

<p align="center">
  <a href="https://kashifali.kitsoftsol.com" target="_blank">
    <img src="https://img.shields.io/badge/🚀%20Live%20Demo-View%20Now-6366f1?style=for-the-badge" alt="Live Demo" />
  </a>
</p>

---

## Preview

<p align="center">
  <img src="screenshots/kstarter_laravel.png" alt="KStarter Laravel Banner" width="100%" />
</p>

---

## Screenshots

### Login Page
<p align="center">
  <img src="screenshots/login_page.png" alt="Login Page" width="100%" />
</p>

### Dashboard
<p align="center">
  <img src="screenshots/dashboard_page.png" alt="Dashboard" width="100%" />
</p>

### Users Management
<p align="center">
  <img src="screenshots/users.png" alt="Users Management" width="100%" />
</p>

### Roles Management
<p align="center">
  <img src="screenshots/roles_page.png" alt="Roles Management" width="100%" />
</p>

### Permissions Management
<p align="center">
  <img src="screenshots/permissions_page.png" alt="Permissions Management" width="100%" />
</p>

### Permission Categories
<p align="center">
  <img src="screenshots/permission_categories_page.png" alt="Permission Categories" width="100%" />
</p>

### Profile Page
<p align="center">
  <img src="screenshots/profile.png" alt="Profile Page" width="100%" />
</p>

---

## Features

| Feature | Description |
|---|---|
| **Custom Authentication** | Guard-based admin login with remember me, session management, and middleware protection - no Breeze or Jetstream |
| **Role & Permission (RBAC)** | Fully custom-built role-based access control with route-level permission checks, permission categories, and multiple roles per user |
| **User Management** | Complete CRUD with multiple role assignments, status toggling, profile management - all via AJAX offcanvas drawers |
| **Admin Panel** | Sneat Bootstrap 5 theme with DataTables, Excel export, Select2, SweetAlert2, and a responsive sidebar |
| **Clean Architecture** | Structured `Controller → Service → Library` pattern for separation of concerns and scalability |
| **Modern Stack** | Laravel 11, PHP 8.2+, Bootstrap 5, jQuery, Vite, and modern PHP best practices |

---

## Tech Stack

- **Backend:** Laravel 11, PHP 8.2+
- **Frontend:** Bootstrap 5 (Sneat theme), jQuery, Vite
- **Database:** MySQL / MariaDB
- **Libraries:** DataTables, Select2, SweetAlert2, Maatwebsite Excel
- **Auth:** Custom admin guard (no Breeze / Jetstream / Spatie)

---

## Requirements

- PHP >= 8.2
- Composer
- Node.js >= 18 & npm
- MySQL / MariaDB

---

## Installation

```bash
# 1. Clone the repository
git clone <repo-url> kstarter-laravel
cd kstarter-laravel

# 2. Install PHP dependencies
composer install

# 3. Install Node dependencies and build assets
npm install && npm run build

# 4. Copy environment file and generate app key
cp .env.example .env
php artisan key:generate

# 5. Configure your database in .env
DB_DATABASE=kstarter
DB_USERNAME=root
DB_PASSWORD=

# 6. Run migrations and seeders
php artisan migrate --seed

# 7. Serve the application
php artisan serve
```

Then visit `http://localhost:8000` for the landing page or `http://localhost:8000/admin/login` for the admin panel.

---

## Default Admin Credentials

| Field | Value |
|---|---|
| Username | `admin` |
| Password | `admin` |

> Change these immediately after first login via the Profile page.

---

## Project Structure

```
app/
├── Http/
│   └── Controllers/Admin/    # Thin controllers - delegate to services
├── Services/Admin/           # Business logic layer
├── Libraries/Admin/          # View data preparation and form handling
├── Models/                   # Eloquent models
├── Validations/              # Form request validation classes
├── Helpers/                  # Global helper functions (encodeId, decodeId, etc.)
└── Http/Middleware/          # Admin auth, XSS sanitization, permission check

resources/views/
├── admin/                    # Admin panel views (Sneat theme)
└── front/                    # Public landing page
```

---

## Architecture

KStarter follows a layered architecture designed to keep controllers thin and logic testable:

```
Request → Controller → Service → Library → View
                     ↓
                 Validation
                     ↓
                  Model / DB
```

- **Controller** - receives HTTP request, calls service, returns response
- **Service** - orchestrates business logic, calls libraries and models
- **Library** - prepares view data, handles form logic
- **Validation** - dedicated classes per action (Store, Update)

---

## Seeding

```bash
# Seed all data (users, roles, permissions, permission categories)
php artisan db:seed

# Re-seed permissions (safe to run multiple times - uses updateOrCreate)
php artisan db:seed --class=PermissionsSeeder
```

---

## Key Conventions

- IDs are obfuscated in URLs via `encodeId()` / `decodeId()` helpers
- All AJAX responses follow `{ success: bool, message: string, html?: string }`
- Admin guards are separate from web guards (`config/auth.php`)
- XSS middleware sanitizes all incoming input automatically
- Permission middleware checks routes against the `permissions` table on every request

---

## Security

KStarter implements a custom **XSS (Cross-Site Scripting) middleware** that automatically protects every incoming request from malicious input - no manual sanitization needed in controllers or services.

### What is XSS?

XSS is a common web attack where a hacker injects malicious scripts (like `<script>alert('hacked')</script>`) into input fields. If the application saves and renders this input unsanitized, it can steal user sessions, redirect users, or deface the UI.

### How KStarter Blocks It

The `App\Http\Middleware\XSS` middleware runs on every admin request and cleans all input automatically:

```
Incoming Request
       │
       ▼
 Skip sensitive keys (_token, password fields)
       │
       ▼
 Sanitize remaining input recursively
       │
  ┌────┴────────────────────────────────────────┐
  │  Remove <script> blocks & their content     │
  │  Strip inline event handlers (onclick, etc) │
  │  Neutralise javascript: / vbscript: URIs    │
  │  Strip all remaining HTML/XML tags          │
  └────┬────────────────────────────────────────┘
       │
       ▼
 Pass clean input to Controller
       │
       ▼
 Attach Security Headers to Response
```

### What Gets Sanitized

| Threat | Example Attack | How It's Blocked |
|---|---|---|
| Script injection | `<script>stealCookies()</script>` | `<script>` blocks removed entirely |
| Inline event handlers | `<img onmouseover="hack()">` | `on*=` attributes stripped |
| JavaScript URI | `<a href="javascript:void(0)">` | `javascript:` scheme neutralised |
| HTML tag injection | `<b onclick="...">text</b>` | All HTML/XML tags stripped |

### Smart Key Skipping

Sensitive fields are **never** sanitized to avoid breaking authentication:

```php
private const SKIP_KEYS = [
    '_token',           // CSRF token - altering breaks form submission
    'password',         // Hashing must work on raw input
    'current_password',
    'new_password',
    'new_password_confirmation',
];
```

### Security Headers

In addition to input sanitization, the middleware attaches hardened HTTP headers to **every admin response**:

| Header | Value | Purpose |
|---|---|---|
| `X-XSS-Protection` | `1; mode=block` | Tells older browsers to block XSS attacks |
| `X-Content-Type-Options` | `nosniff` | Prevents MIME-type sniffing attacks |
| `X-Frame-Options` | `SAMEORIGIN` | Blocks clickjacking via iframes |
| `Referrer-Policy` | `strict-origin-when-cross-origin` | Controls referrer info leakage |

---

## Support the Project

If KStarter saved you time, consider a small donation to help keep it free and actively maintained.

**Meezan Bank - Pakistan**
`PK31MEZN0002760105244525`

---

## Creator

**Kashif Ali**
- Portfolio: [kashifali.kitsoftsol.com](https://kashifali.kitsoftsol.com)
- Email: [alikashi54321@gmail.com](mailto:alikashi54321@gmail.com)

---

## License

KStarter Laravel is open-source software released under the [MIT License](https://opensource.org/licenses/MIT).
