# Home Warehouse Inventory Management System (IMS)

## Overview
The Home Warehouse Inventory Management System (IMS) is designed to help users manage and track their inventory items and storage boxes efficiently. The system allows users to add, update, delete, and view items and boxes, as well as generate QR codes for easy identification and tracking.

## Features
- **Item Management**: Add, update, delete, and view items.
- **Box Management**: Add, update, delete, and view storage boxes.
- **QR Code Generation**: Generate QR codes for items and boxes for easy identification.
- **Search Functionality**: Search for items and boxes using various criteria.
- **User Authentication**: Secure login and registration system.

## Installation
1. Clone the repository:
    ```bash
    git clone https://github.com/yourusername/hw-ims.git
    ```
2. Navigate to the project directory:
    ```bash
    cd hw-ims
    ```
3. Install dependencies using Composer:
    ```bash
    composer install
    ```
4. Set up the environment variables:
    ```bash
    cp config/.env.example config/.env
    ```
5. Update the `.env` file with your database credentials and other configuration settings.
6. Run the database migrations:
    ```bash
    php artisan migrate
    ```
7. Start the development server:
    ```bash
    php artisan serve
    ```

## Usage
- Access the application in your web browser at `http://localhost:8000`.
- Use the navigation menu to manage items and boxes.
- Generate QR codes for easy identification and tracking of items and boxes.

## Contributing
1. Fork the repository.
2. Create a new branch (`git checkout -b feature-branch`).
3. Make your changes and commit them (`git commit -am 'Add new feature'`).
4. Push to the branch (`git push origin feature-branch`).
5. Create a new Pull Request.

## License
This project is licensed under the MIT License. See the LICENSE file for details.