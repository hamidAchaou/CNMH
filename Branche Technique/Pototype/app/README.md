# Laravel Authentication with Bootstrap UI

This repository demonstrates how to set up authentication using Laravel UI with Bootstrap for a Laravel application.

## Prerequisites

- PHP installed on your machine
- Composer globally installed
- Node.js and npm installed

## Getting Started

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    ```

2. **Install Dependencies**

    ```bash
    composer install
    npm install
    ```

3. **Set Up Environment Variables**

    - Rename `.env.example` to `.env`
    - Configure your database credentials in the `.env` file

4. **Generate Application Key**

    ```bash
    php artisan key:generate
    ```

5. **Run Migrations**

    ```bash
    php artisan migrate
    ```

6. **Install Laravel UI and Bootstrap**

    ```bash
    composer require laravel/ui
    php artisan ui bootstrap --auth
    ```

7. **Compile Assets**

    ```bash
    npm run dev
    ```

8. **Start the Development Server**

    ```bash
    php artisan serve
    ```

9. **Access the Application**

    Open your browser and go to `http://localhost:8000`

## Additional Information

- For production deployment, make sure to configure your web server (e.g., Apache, Nginx) to serve the application properly.
- Customize the UI and styles by modifying the Bootstrap views located in the `resources/views` directory.

## Contributing

Contributions are welcome! Please fork the repository and create a pull request for any enhancements or fixes.

## License

This project is licensed under the [MIT License](LICENSE).
