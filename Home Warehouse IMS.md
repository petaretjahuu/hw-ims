HomeWarehouseInventoryManagement System

Business Requirements

1\. Purpose

The application aims to digitize and streamline inventory management for
a personal warehouse/storage space. It replaces manual tracking (e.g.,
spreadsheets, paper lists) with a centralized system to:

> • Track the exact location of items within numbered boxes • Reduce
> time spent searching formisplaced items
>
> • Maintain a visual record of items via photos
>
> • Enable quick access to box details via QR codes

2\. Key Objectives

• Efficiency:

> o Minimize time spent oninventory updates (e.g., bulk moving items
> between boxes)

o Eliminate manual dataentry errors • Accessibility:

> o Access inventory data from any device on the local network
> (desktop/mobile) o Retrieve box details instantly via QR code scanning

• Reliability:

> o Ensure data integrity with automated backups (SQL + photos)
>
> o Prevent accidental deletions (e.g., boxes can only be deleted when
> empty)

3\. Core Functionality (Non-Technical Summary)

> • For Boxes:
>
> o Create, edit, or delete boxes with unique IDs
>
> o Attach notes to boxes (e.g., "Fragile items" or "Seasonal
> decorations") o Generate scannable QR codes for physical boxes to open
> their digital
>
> details on a phone • For Items:
>
> o Add items with photos, descriptions, and box assignments o Move
> multiple items between boxes in one action
>
> o Search items by keyword (e.g., "Christmas lights") and sort results
> o Export item lists to CSVfor external analysis
>
> • For Reporting:
>
> o View recently added items (last 30 days) on the dashboard o Track
> total boxes/itemsat a glance

4\. User Needs

> • Primary User: o Admin:
>
> ▪ Requires a simple, intuitive interface for daily use
>
> ▪ Needs to quickly locate items using search/QRCodes
>
> ▪ Must handle bulk operations (e.g., moving20+ items after
> reorganizing the warehouse)
>
> • Technical Constraints:
>
> o Hosted locally (no cloud dependency)
>
> o No user authentication(single-user system)
>
> o Mobile-friendly for on-the-go access within the warehouse

5\. Success Metrics

> • Short-Term:
>
> o Reduce item search time by 50% compared tomanual methods o Achieve
> 100% accuracy in item-box assignments
>
> • Long-Term:
>
> o Maintain a searchable archive of all items for5+ years o Enable
> seamless scaling to 50+ boxes and 1000+ items

6\. Risks & Mitigations

||
||
||
||
||
||

Technical Specification

7\. Project Overview

**Purpose**: Local PHP/MySQL web app fortracking boxes and items in a
warehouse

**Target** **Users**: Single admin (no authenticationrequired)

**Hosting**: Local server (XAMPP)

**Stack**:

> • Backend: PHP 8+ (OOP with PDO) • Frontend: Bootstrap 5 + Vanilla JS
> • Database: MySQL (InnoDB)

8\. Core Features

8.1 Box Management

> ▪ Create Box:
>
> o Form fields: Box Number (unique, required), Notes (optional
> textarea) o Auto-generate created_at timestamp
>
> ▪ Edit Box:
>
> o Allow updating Box Number (with uniqueness check) and Notes ▪ Delete
> Box:
>
> o Only permitted if the box contains0 items
>
> o Show confirmation modal: "Delete Box \#123? This action cannot be
> undone."
>
> ▪ Box Details Page:
>
> o Display: Box number, creation date, notes o List all items in the
> box (with thumbnails)
>
> ▪ QR Code Section:
>
> o Generate/display QR code linking
> to[<u>http://localhost/box-details.php?id=123</u>](http://localhost/box-details.php?id=123)
>
> o Download button for QR code (PNG format)

8.2 Item Management

> ▪ Create Item:
>
> o Form fields:
>
> ▪ Name (required, max 100chars) ▪ Description (optional, textarea)
>
> ▪ Photo (required, JPG/PNG, max10MB) ▪ Box (dropdown of existing
> boxes)
>
> o Upload photo to uploads/items/ with randomized filename (e.g.,
> item_5f3d2a.jpg)
>
> ▪ Photo Resizing & Size Limit:
>
> o Upon photo upload, automatically resize the image to maintain a
> consistent aspect ratio(e.g., 4:3 or 16:9) and ensure the resulting
> file is under 1500 KB
>
> o If the initial upload exceeds this limit, reduce dimensions and/or
> compressthe imageuntil the final size is ≤1500 KB
>
> o Use a server-side library such as GD or Imagick in PHP to handle the
> resizing and compression
>
> o Continue to store the final (resized/compressed) version in
> uploads/items/ with thesame randomized filename logic
>
> ▪ Edit Item:
>
> o Same fields as creation, with pre-filled data o Option to
> remove/replace photo
>
> ▪ Delete Item:
>
> o Confirmation modal before deletion o Delete associated photo from
> server

8.3 AdvancedFeatures

> ▪ Bulk Move Items:
>
> o Checkbox grid on item list page
>
> o "Move Selected" button → dropdown tochoose target box o Confirmation
> summary: "Move 3 items to Box \#456?"
>
> ▪ Search & Sorting:
>
> o Search: Free-text search across item name, description, and box
> number o Sort By:
>
> ▪ Name (A-Z, Z-A)
>
> ▪ Date Added (Newest First, Oldest First) ▪ Box Number
>
> ▪ Recently Added Items:
>
> o Dashboard widget showinglast 10 added items
>
> o Display: Name, box number, thumbnail, and "View Item" link ▪ CSV
> Export:
>
> o Button on item list page exports filtered/sorted results
>
> o Columns: Item ID, Name, Description, Box Number, Date Added

9\. Technical Requirements

9.1 Database Schema

> 1\. -- Boxes Table
>
> 2\. CREATE TABLE \`boxes\` (
>
> 3\. \`id\` INT PRIMARY KEY AUTO_INCREMENT, 4. \`number\` VARCHAR(50)
> UNIQUE NOT NULL, 5. \`notes\` TEXT,
>
> 6\. \`created_at\` DATETIME DEFAULT CURRENT_TIMESTAMP 7. );
>
> 8\.
>
> 9\. -- Items Table

10\. CREATE TABLE \`items\` (

11\. \`id\` INT PRIMARY KEY AUTO_INCREMENT, 12. \`name\` VARCHAR(100)
NOT NULL,

13\. \`description\` TEXT,

14\. \`photo_path\` VARCHAR(255) NOT NULL, 15. \`box_id\` INT NOT NULL,

16\. \`created_at\` DATETIME DEFAULT CURRENT_TIMESTAMP,

17\. FOREIGN KEY (\`box_id\`) REFERENCES \`boxes\`(\`id\`) ON DELETE
RESTRICT 18. );

9.2 QR Code Implementation

> ▪ Use endroid/qr-code PHP library (install via Composer) ▪ Generate QR
> on box creation/update
>
> ▪ Save to public/qrcodes/box_123.png
>
> ▪ .htaccess rule to block direct directory access:
>
> 1\. Deny from all

9.3 Clean URLs

To present user-friendly and extensionless URLs (e.g.,
http://server_ip/box/2 instead of
http://server_ip/box-details.php?id=2), enable URL rewriting on the
server:

> • Example .htaccess snippet:
>
> 1\. RewriteEngine On
>
> 2\. RewriteRule ^box/(\[0-9\]+)/?\$ box-details.php?id=\$1 \[L\]
>
> • Adjust any references (including QR code generation) so the
> displayed URL uses
>
> 1\. http://server_ip/box/\<BOX_ID\> rather than the file-based
> endpoint

When a user scans a QR code, they will be taken to
http://server_ip/box/2, and the internalrewrite will load
box-details.php?id=2seamlessly.

9.4 Security

> ▪ InputSanitization:
>
> o Use htmlspecialchars()for all user-generated content displays o PDO
> prepared statements for database queries
>
> ▪ File Uploads:
>
> o Restrict MIME types to image/jpeg, image/png
>
> o Rename files to item\_\[RANDOM_STRING\].jpg/png(avoid original
> filenames)

10\. UI/UX Requirements

> ▪ Bootstrap 5Components:
>
> o Navbar with collapsible menu (for mobile) o Cards for box/item
> displays
>
> o Modals for all forms (no separate form pages) o Toast notifications
> for success/error messages
>
> ▪ Responsive Layout:
>
> o Grid system for item/box lists (3columns on desktop → 1column on
> mobile)
>
> o Mobile-friendly file uploads (\<input type="file" accept="image/\*"
> capture="environment"\>)
>
> ▪ Wireframe Examples:
>
> o Homepage: Summary cards (total boxes/items) + "Recently Added" list
> o Box List: Table withcolumns \[Box Number, Notes, Item Count, QR
> Code\] o Item List: Search bar +sort dropdown +grid of items with
> thumbnails

11\. Technical Stack

**PHP**: Namespaced classes (e.g., App\Database, App\BoxManager)

**MySQL**: Strict mode enabled

**Bootstrap** **5**: CDN link+ custom CSS file for overrides

**Libraries**:

> ▪ endroid/qr-code (QR generation)
>
> ▪ PHP Dotenv (optional for environment variables).

12\. Workflow Examples

12.1 Bulk Moving Items

> 1\. User selects items via checkboxes
>
> 2\. Clicks "Move Selected" → modal opens 3. Chooses target box from
> dropdown
>
> 4\. Sees confirmation: "Move 5 items to Box \#789?" 5. On confirm:
>
> ➢Update box_id for all selected items ➢Show toast: "5 items moved
> successfully!"

12.2 QR Code Scanning

> 1\. User scans QR code with phone
>
> 2\. Opens URL http://LOCAL-IP/box-details.php?id=123 (local network)
> 3. Displays box details + items

13\. Database information Database name: hwims

Databaseuser: hwims

Database password: hwims
