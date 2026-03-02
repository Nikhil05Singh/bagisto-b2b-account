# 🏢 Bagisto Users & Roles Module

![Bagisto Version](https://img.shields.io/badge/Bagisto-v2.3.x-blue?style=flat-square&logo=laravel)
![PHP Version](https://img.shields.io/badge/PHP-%5E8.2-777BB4?style=flat-square&logo=php)

## 📖 Introduction
The **Bagisto Users & Roles Module** transforms a standard Bagisto storefront into a powerful platform. It allows registered business customers to create sub-users (employees/staff) within their account and assign them highly specific roles and permissions using a dynamic, nested access-control tree.

This module is built entirely decoupled from the Bagisto core, ensuring safe upgrades and maintaining the modern Tailwind CSS aesthetic of Bagisto 2.x.

---

## ✨ Features
* **Company Users Management:** Customers can add, edit, and manage multiple sub-users under their main company account.
* **Roles & Permissions:** Create custom roles with granular access controls using an interactive, nested permission tree.
* **Seamless UI Integration:** Injects native-looking menu items directly into the Bagisto Customer Profile sidebar.
* **Tailwind & Blade Components:** Fully styled using Bagisto's native UI components for a flawless, responsive frontend experience.
* **Isolated Architecture:** Uses Konekt Concord contracts and proxies to ensure zero core file modifications.

---

## ⚙️ Requirements
To use this module, ensure your environment meets the following specifications:
* **Bagisto:** `v2.3.x` or higher
* **PHP:** `^8.2` or higher
* **Composer:** `v2.0` or higher

---

## 🚀 Installation Guide

Follow these simple steps to install the module on your core Bagisto installation.

### Step 1: Link the Repository
Open your main Bagisto root directory's `composer.json` file. Scroll to the bottom and add this repository link to the `"repositories"` array:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "[https://github.com/YOUR-USERNAME/bagisto-b2b-account](https://github.com/YOUR-USERNAME/bagisto-b2b-account)"
    }
]
```
*(Replace `YOUR-USERNAME` with your actual GitHub username).*

### Step 2: Require the Package
Run the following command in your terminal to pull the module into your Bagisto store:

```bash
composer require acme/b2b-account:dev-main
```

### Step 3: Register the Service Provider
Tell Bagisto to load your new module. Open `bootstrap/providers.php` and add the Service Provider to the end of the returned array:

```php
return [
    // ... other providers
    Acme\B2BAccount\Providers\B2BAccountServiceProvider::class,
];
```

### Step 4: Run the Installation Command
Finally, run the custom Artisan command included with this package. This will automatically execute the database migrations and clear your application cache:

```bash
php artisan b2b-account:install
```

🎉 **That's it!** Log in to your Bagisto storefront as a customer, navigate to your profile, and you will see the new "Company Users" and "Roles & Permissions" tabs in your sidebar.

---

## 🛠️ Usage
1. **Create a Role:** Navigate to `Roles & Permissions` -> `Add Role`. Choose either "All Access" or select specific capabilities from the custom permissions tree.
2. **Create a User:** Navigate to `Company Users` -> `Add User`. Fill in the employee's details, assign them the role you just created, and save. The system will auto-generate a secure password for them.
