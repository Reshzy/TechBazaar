Activity - Imagine you are working on a web application for a fictional e-commerce platform called "TechBazaar." Your task is to implement the main layout using @extends and create individual views for different sections of the site. The sections are product, account, home, cart.

Here's a summary of your project and a `roadmap.md` file tailored for your fictional e-commerce platform **TechBazaar** using **Laravel**, **Blade**, and **Tailwind CSS**.

---

### ✅ **Project Summary: TechBazaar**

**TechBazaar** is a fictional e-commerce platform built with Laravel and styled using Tailwind CSS. The focus of this project is to create:

- A **main layout** using Blade and Tailwind.
- Four key **views/pages**:
  - Home
  - Product
  - Account
  - Cart

This is an academic activity designed to help you understand the structure of a Laravel Blade app and use Tailwind CSS for styling responsive layouts.

---

### 🗺️ `roadmap.md`

```markdown
# TechBazaar - Development Roadmap

This roadmap guides you through building the TechBazaar e-commerce layout using Laravel Blade and Tailwind CSS.

---

## ✅ 1. Project Setup

### 1.1 Install Laravel (if not already)
```bash
composer create-project laravel/laravel techbazaar
cd techbazaar
```

### 1.2 Install Node.js dependencies
```bash
npm install
```

### 1.3 Install and configure Tailwind CSS
```bash
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```

### 1.4 Configure Tailwind (`tailwind.config.js`)
```js
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
```

### 1.5 Create `resources/css/app.css` and add:
```css
@tailwind base;
@tailwind components;
@tailwind utilities;
```

### 1.6 Update `vite.config.js` and `resources/js/app.js` if needed

### 1.7 Compile Tailwind assets
```bash
npm run dev
```

---

## ✅ 2. Blade Layout Setup

### 2.1 Create Main Layout

**File:** `resources/views/layouts/app.blade.php`

```blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TechBazaar</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">
    <header class="bg-white shadow p-4 flex justify-between">
        <h1 class="text-xl font-bold">TechBazaar</h1>
        <nav class="space-x-4">
            <a href="/" class="text-blue-600 hover:underline">Home</a>
            <a href="/product" class="text-blue-600 hover:underline">Products</a>
            <a href="/account" class="text-blue-600 hover:underline">Account</a>
            <a href="/cart" class="text-blue-600 hover:underline">Cart</a>
        </nav>
    </header>

    <main class="p-6">
        @yield('content')
    </main>

    <footer class="bg-white shadow mt-10 p-4 text-center text-sm">
        &copy; {{ date('Y') }} TechBazaar. All rights reserved.
    </footer>
</body>
</html>
```

---

## ✅ 3. Create Individual Views

Each view should extend the layout and use `@section('content')`.

### 3.1 Home

**File:** `resources/views/home.blade.php`

```blade
@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Welcome to TechBazaar</h2>
<p class="mb-4">Your one-stop shop for the latest tech gadgets.</p>
<a href="/product" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Shop Now</a>
@endsection
```

---

### 3.2 Product

**File:** `resources/views/product.blade.php`

```blade
@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Products</h2>
<div class="grid grid-cols-1 md:grid-cols-3 gap-4">
    <!-- Example Product Card -->
    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-lg font-bold">Wireless Headphones</h3>
        <p class="text-gray-600">$99.99</p>
        <button class="mt-2 bg-blue-500 text-white px-3 py-1 rounded">Add to Cart</button>
    </div>
</div>
@endsection
```

---

### 3.3 Account

**File:** `resources/views/account.blade.php`

```blade
@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Your Account</h2>
<p class="mb-2">Name: John Doe</p>
<p>Email: john@example.com</p>
<a href="/logout" class="text-red-500 hover:underline mt-4 block">Logout</a>
@endsection
```

---

### 3.4 Cart

**File:** `resources/views/cart.blade.php`

```blade
@extends('layouts.app')

@section('content')
<h2 class="text-2xl font-semibold mb-4">Your Cart</h2>
<ul class="space-y-4">
    <li class="bg-white p-4 rounded shadow flex justify-between">
        <span>Wireless Headphones</span>
        <span>$99.99</span>
    </li>
</ul>
<p class="mt-4 font-bold">Total: $99.99</p>
<button class="mt-4 bg-green-500 text-white px-4 py-2 rounded">Checkout</button>
@endsection
```

---

## ✅ 4. Routes (web.php)

**File:** `routes/web.php`

```php
Route::view('/', 'home');
Route::view('/product', 'product');
Route::view('/account', 'account');
Route::view('/cart', 'cart');
```

---

## ✅ 5. Styling & Layout Tips

- Use **Tailwind utility classes** to maintain consistency.
- Keep spacing (`p-4`, `mb-4`) consistent across components.
- Use responsive grids (`grid-cols-1`, `md:grid-cols-3`) for product listings.
- Stick with a **light/dark neutral background** and bold accents (e.g., blue for buttons).
- Test on **mobile and desktop** to ensure responsiveness.

---

## 🎓 Learning Goals

- Understand Blade templating with `@extends`, `@section`, and `@yield`.
- Practice Tailwind for layout and responsive design.
- Build reusable, consistent UI components in Laravel.

---

Happy coding! 🚀
```