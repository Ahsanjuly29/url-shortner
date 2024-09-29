# 🌐 Laravel URL Shortener

A simple and efficient URL shortener application built with Laravel, designed to help users generate short, shareable links from long URLs. The application features a sleek UI that mimics the familiar Google Search interface, offering an intuitive and user-friendly experience.

## 🚀 Features

- 🔗 **URL Shortening:** Convert long URLs into short, easily shareable links.
- 🚦 **Redirection:** Automatically redirect users to the original URL when they access the shortened link.
- 📊 **Click Statistics:** Track the number of clicks for each shortened URL.
- 🔒 **User Authentication:** Secure login system for users to manage their shortened URLs and view statistics.
- 🛡️ **Security:** Input validation and protection against common web vulnerabilities.
- 🖥️ **Optional API:** Shorten URLs programmatically via API.

## 🖥️ Screenshots

### Main Page - URL Shortener (Google-like UI)
![Laravel URL Shortener Interface](https://ahsanjuly29.github.io/url-shortner/public/assets/images/1.png)

### Shortened URL Result
![Shortened URL Result](https://ahsanjuly29.github.io/url-shortner/public/assets/images/2.png)

## 🛠️ Installation

### Prerequisites

- ✔️ PHP >= 7.3
- ✔️ Composer
- ✔️ Laravel >= 8.0
- ✔️ MySQL or any supported database

### Step-by-Step Setup

1. **Clone the repository:**
    ```bash
    git clone https://github.com/Ahsanjuly29/url-shortner.git
    ```

2. **Navigate to the project directory:**
    ```bash
    cd url-shortner
    ```

3. **Install dependencies:**
    ```bash
    composer install
    ```

4. **Set up environment variables:**
    ```bash
    cp .env.example .env
    ```
    Update the database connection settings in `.env`.

5. **Generate an application key:**
    ```bash
    php artisan key:generate
    ```

6. **Run migrations:**
    ```bash
    php artisan migrate
    ```

7. **Serve the application:**
    ```bash
    php artisan serve
    ```

## ⚙️ Usage

1. **Shorten a URL:** Enter a long URL in the input field and click "Shorten URL". The shortened link will be displayed below the form.
2. **Redirect to Original URL:** Use the shortened URL in your browser to be redirected to the original long URL.
3. **User Authentication:** Register or log in to manage your own URLs and view click statistics.
4. **Track Clicks:** Monitor how many times a shortened link has been clicked from your dashboard.

## 🔑 Authentication

Users can sign up and log in to view their personalized dashboard of shortened URLs and access click statistics. User data is secured using Laravel's built-in authentication features.

## 🛡️ Security

- 🛡️ **Input Validation:** User input is validated to prevent malicious submissions.
- 🔒 **HTTPS:** Ensure that your application uses HTTPS for secure communication.

## 🛠️ Built With

- ⚡ **Laravel:** The powerful PHP framework for building robust web applications.
- 🔑 **Jetstream:** For user authentication and management.
- 🎨 **Blade:** Laravel’s templating engine to create dynamic views.
- 💽 **MySQL:** For database management.

## 📄 License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for more details.

 