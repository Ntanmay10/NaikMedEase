# NaikMedease: Online Medical Store

Welcome to NaikMedease, an online medical store project built using PHP and MySQL. This platform simplifies the process of purchasing medicines, consulting doctors, and managing medical records for both users and administrators.

## Table of Contents

1. [Overview](#overview)
2. [Features](#features)
3. [Technologies Used](#technologies-used)
4. [Setup Instructions](#setup-instructions)
5. [Usage](#usage)
6. [Contributing](#contributing)
7. [License](#license)

## Overview

NaikMedease is designed to streamline the healthcare experience by providing an intuitive platform for users to buy medicines, consult doctors, and manage prescriptions online. Administrators can efficiently manage the store, view sales data, and handle user activities.

## Features

### Admin Functions
- Add, update, and delete medicines.
- Add and delete doctor profiles.
- View total sales records and filter them.
- Access user online payment receipts.
- View uploaded prescriptions.

### User Functions
- Add medicines to the cart.
- Pay online for purchases.
- Upload prescriptions for verification.
- Contact doctors for consultations.

## Technologies Used

- *Backend*: PHP
- *Database*: MySQL
- *Frontend*: HTML, CSS, JavaScript
- *Others*: Bootstrap, jQuery

## Setup Instructions

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/naikmedease.git
   ```

2. Navigate to the project directory:

   ```bash
   cd naikmedease
   ```

3. Set up the database:
   - Import the provided SQL file (sql/naikmedease.sql) into your MySQL server.

4. Configure environment variables:
   - Update config.php with your database credentials.
  
5. Create the following directories:
   - medimg.
   - presimg
   - images/<your-GooglePay_QR.png>

### Admin Panel
Access the admin panel by navigating to /admin. Log in with your admin credentials to manage the platform.

### User Interface
Users can register, log in, browse medicines, add them to the cart, pay online, upload prescriptions, and contact doctors.

## Contributing

We welcome contributions! To contribute:

1. Fork the repository.
2. Create a new branch:

   ```bash
   git checkout -b feature/YourFeatureName
   ```

3. Commit your changes:

   ```bash
   git commit -m 'Add YourFeatureName'
   ```

4. Push to the branch:

   ```bash
   git push origin feature/YourFeatureName
   ```

5. Open a pull request.

---

Feel free to explore, use, and contribute to NaikMedease to make online medical services more accessible!
