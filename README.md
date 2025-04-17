# TechBazaar - Modern E-commerce Platform

<div align="center">
  <img src="public/images/logo.svg" alt="TechBazaar Logo" width="120" height="120" style="border-radius: 50%">
  <h3>A premium tech e-commerce experience</h3>
</div>

## 🚀 Overview

TechBazaar is a modern, feature-rich e-commerce platform specializing in tech gadgets and accessories. Built with Laravel and enhanced with Alpine.js and Tailwind CSS, it delivers a sleek, responsive shopping experience with award-winning design elements inspired by Awwwards-featured websites.

## ✨ Features

- **Modern UI/UX Design**: Dark mode interface with premium aesthetics inspired by award-winning websites
- **Responsive Layout**: Fully responsive design that works beautifully across all devices
- **Interactive Elements**: Smooth animations, transitions, and interactive components
- **Product Catalog**: Browse through various categories of tech products
- **Product Detail Pages**: Comprehensive product information with image galleries
- **Shopping Cart**: Full-featured cart with quantity adjustments and real-time calculations
- **User Accounts**: Personalized user accounts with order history and settings
- **Custom Cursor**: Awwwards-style interactive cursor for enhanced desktop experience
- **Page Transitions**: Smooth transitions between pages for a refined user experience
- **Accessibility**: Designed with accessibility in mind for all users

## 🛠️ Technology Stack

- **Backend**: Laravel 10
- **Frontend JS**: Alpine.js
- **CSS Framework**: Tailwind CSS
- **Animations**: AOS (Animate on Scroll) library
- **Build Tool**: Vite
- **Database**: MySQL

## 🔧 Installation & Setup

### Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js and NPM
- MySQL

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/techbazaar.git
   cd techbazaar
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install NPM dependencies**
   ```bash
   npm install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Configure database**
   
   Update the `.env` file with your database credentials:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=techbazaar
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Run migrations and seed the database**
   ```bash
   php artisan migrate --seed
   ```

8. **Build frontend assets**
   ```bash
   npm run dev
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

10. **Access the application**
    
    Visit [http://localhost:8000](http://localhost:8000) in your browser.

## 🎨 Design Elements

### Inspired by Awwwards Sites

The design of TechBazaar incorporates several elements commonly found in Awwwards-winning websites:

- **Dark Mode Interface**: Premium dark theme with gradient accents
- **Micro-interactions**: Subtle animations and transitions for interactive elements
- **Custom Cursor**: Enhanced cursor experience on desktop devices
- **Page Transitions**: Smooth transitions between pages using animated overlays
- **Glassmorphism**: Subtle backdrop blur effects for depth
- **Typography**: Careful attention to typography with clear hierarchy
- **Animated Content**: AOS (Animate on Scroll) for revealing content as users scroll
- **Gradient Accents**: Strategic use of gradients for visual interest

## 📁 Project Structure

```
techbazaar/
├── app/              # Application logic
├── config/           # Configuration files
├── database/         # Database migrations and seeders
├── public/           # Publicly accessible files
├── resources/        # Frontend resources
│   ├── css/          # CSS files
│   ├── js/           # JavaScript files
│   └── views/        # Blade templates
│       ├── layouts/  # Layout templates
│       └── ...       # Page templates
├── routes/           # Route definitions
├── storage/          # Application storage
├── tests/            # Test files
└── ...
```

## 📋 Page Templates

- **Home (`home.blade.php`)**: Landing page with featured products and categories
- **Products (`product.blade.php`)**: Product listing with filters
- **Product Detail (`product-detail.blade.php`)**: Detailed product information
- **Cart (`cart.blade.php`)**: Shopping cart with item management
- **Account (`account.blade.php`)**: User account dashboard

## 🧩 Components

TechBazaar uses several reusable components throughout the application:

- **Layout (`app.blade.php`)**: Main layout template with navigation and footer
- **Breadcrumbs**: Navigation aids for user orientation
- **Product Cards**: Consistent product display across the site
- **Custom Buttons**: Styled buttons with hover effects
- **Form Elements**: Styled input fields, dropdowns, and checkboxes

## 🔄 Page Transition System

TechBazaar features a sophisticated page transition system:

1. **How it works**:
   - When a link is clicked, a gradient overlay animates across the screen
   - The current page content fades out
   - After animation completes, navigation occurs
   - The new page loads with the overlay animating out

2. **Implementation**:
   - CSS transforms for smooth animations
   - JavaScript event listeners on internal navigation links
   - Controlled timing for smooth transitions

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📜 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 👏 Acknowledgements

- [Laravel](https://laravel.com/) - The PHP framework used
- [Alpine.js](https://alpinejs.dev/) - Lightweight JS framework
- [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework
- [AOS](https://michalsnik.github.io/aos/) - Animate On Scroll library
- [Unsplash](https://unsplash.com/) - For product images
- [Awwwards](https://www.awwwards.com/) - Design inspiration

---

<div align="center">
  <p>Created with ❤️ by Rodge Andru P.Viloria</p>
</div>
