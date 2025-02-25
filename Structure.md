# Project Structure

## Overview
This document provides an overview of the directory and file structure of the Home Warehouse Inventory Management System (IMS) project, explaining the purpose of each directory and file.

## Directory and File Structure

hw-ims/
├── app/                        # Application core and MVC components
│   ├── controllers/            # Controllers handle the request logic
│   │   ├── BoxController.php   # Controller for managing boxes
│   │   └── ItemController.php  # Controller for managing items
│   ├── core/                   # Core classes and utilities
│   │   ├── Controller.php      # Base controller class
│   │   └── Database.php        # Database connection and query handling
│   ├── models/                 # Models represent the data and business logic
│   │   ├── Box.php             # Model for box data
│   │   └── Item.php            # Model for item data
├── composer.json               # Composer configuration file for dependencies
├── config/                     # Configuration files
│   ├── .env                    # Environment variables for configuration
│   └── config.php              # Configuration settings and environment loading
├── CreateDocuments.ps1         # PowerShell script for creating documents (if applicable)
├── public/                     # Publicly accessible files (entry point)
│   ├── .htaccess               # Apache configuration for URL rewriting and security
│   ├── assets/                 # Static assets (CSS, JS, images)
│   │   ├── css/
│   │   │   └── styles.css      # Stylesheet for the application
│   │   ├── images/             # Image files
│   │   └── js/
│   │       └── script.js       # JavaScript for handling client-side interactions
│   ├── box.php                 # Entry point for box-related requests
│   ├── index.php               # Main entry point for the application
│   ├── item.php                # Entry point for item-related requests
│   └── uploads/                # Directory for uploaded files
│       ├── items/              # Uploaded item files
│       └── qrcodes/            # Generated QR codes
├── README.md                   # Project documentation and instructions
├── storage/                    # Storage for backups and other data
│   └── backups/                # Backup files
├── vendor/                     # Composer dependencies
└── views/                      # View templates for rendering HTML
    ├── boxes/                  # Views related to boxes
    │   ├── details.php         # View for displaying box details
    │   └── list.php            # View for displaying a list of boxes
    ├── items/                  # Views related to items
    │   ├── details.php         # View for displaying item details
    │   └── list.php            # View for displaying a list of items
    └── layout/                 # Layout views for consistent structure
        ├── footer.php          # Footer template
        └── header.php          # Header template

### Explanation:
- **app/**: Contains the core application files, including controllers, models, and core classes.
  - **controllers/**: Contains the controllers that handle the request logic for boxes and items.
    - **BoxController.php**: Handles requests related to boxes, such as listing, creating, updating, and deleting boxes.
    - **ItemController.php**: Handles requests related to items, such as listing, creating, updating, and deleting items.
  - **core/**: Contains core classes such as the base controller and database connection.
    - **Controller.php**: Base controller class that other controllers extend. It can include common methods and properties shared across different controllers.
    - **Database.php**: Manages the database connection and provides methods for querying and interacting with the database.
  - **models/**: Contains the models that represent the data and business logic for boxes and items.
    - **Box.php**: Model for box data, including methods for retrieving, creating, updating, and deleting boxes.
    - **Item.php**: Model for item data, including methods for retrieving, creating, updating, and deleting items.
- **composer.json**: Configuration file for Composer, which manages PHP dependencies. It lists the project's dependencies and other metadata.
- **config/**: Contains configuration files, including environment variables and settings.
  - **.env**: Stores environment variables for configuration, such as database credentials. This file should be kept secure and not committed to version control.
  - **config.php**: Loads environment variables and defines constants for configuration settings.
- **CreateDocuments.ps1**: A PowerShell script for creating documents (if applicable). This script can automate tasks related to document creation.
- **public/**: Contains publicly accessible files, including the main entry points and static assets.
  - **.htaccess**: Apache configuration file for URL rewriting and security settings. It redirects requests to the appropriate entry points and denies access to sensitive files.
  - **assets/**: Contains static assets such as CSS, JavaScript, and images.
    - **css/**: Directory for CSS files.
      - **styles.css**: Stylesheet for the application, defining the visual appearance of the web pages.
    - **images/**: Directory for image files used in the application.
    - **js/**: Directory for JavaScript files.
      - **script.js**: JavaScript for handling client-side interactions, such as form submissions and delete actions.
  - **box.php**: Entry point for handling box-related requests, routing them to the appropriate controller methods.
  - **index.php**: Main entry point for the application, routing requests to the appropriate controllers based on the URL.
  - **item.php**: Entry point for handling item-related requests, routing them to the appropriate controller methods.
  - **uploads/**: Directory for storing uploaded files, including items and QR codes.
    - **items/**: Directory for uploaded item files.
    - **qrcodes/**: Directory for generated QR codes used for item and box identification.
- **README.md**: Project documentation and instructions, providing an overview of the project, installation steps, and usage guidelines.
- **storage/**: Contains storage for backups and other data.
  - **backups/**: Directory for storing backup files.
- **vendor/**: Contains Composer dependencies, which are third-party libraries required by the project.
- **views/**: Contains view templates for rendering HTML, defining the structure and content of web pages.
  - **boxes/**: Views related to boxes, including templates for displaying box details and lists.
    - **details.php**: View for displaying the details of a specific box.
    - **list.php**: View for displaying a list of boxes.
  - **items/**: Views related to items, including templates for displaying item details and lists.
    - **details.php**: View for displaying the details of a specific item.
    - **list.php**: View for displaying a list of items.
  - **layout/**: Layout views for consistent structure across the application, including header and footer templates.
    - **footer.php**: Footer template, included at the bottom of web pages.
    - **header.php**: Header template, included at the top of web pages, containing the navigation menu and page title.