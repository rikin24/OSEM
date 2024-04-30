# Online Smart Employee Manager (OSEM)

## Project Outline:

Online Smart Employee Manager (OSEM) is an online website that managers of an organisation can use to invite new employees to, where they can manage employees’ skills and teams, along with planning and organising various events and deadlines. Employees have separate logins that allow them to manage their own tasks and keep a track of events, team updates and their verified skills. The system relies on a backend database, which stores login details as well as any skills, teams and employee/manager data that may have relationships.

Student Name: Rikin Bhudia\
Student Number: 209013380

## System requirements

- Operating System: Windows 7 or greater, MacOS, or any other similar level OS
- Git (Any recent version)
- XAMPP (Any recent version, with the MySQL server, Apache server, PHP and phpMyAdmin installed)

## Setup (Windows)

**External Software Installation:**

1. Download the latest stable version of XAMPP here: https://www.apachefriends.org/download.html 
2. Install XAMPP with default settings, ensuring the MySQL and Apache servers as well as PHP and phpMyAdmin are being installed
3. Locate the “xampp” folder and enter the “php” folder within it, then copy this file path
4. Search “environment variables” on the windows search bar and select “Edit the system environment variables”
5. Select “Environment Variables…”
6. Select “Path” under “User variables” and click the “Edit…” button
7. Press “New” and paste the file path of the “php” folder within XAMPP from earlier, then press “Ok” on all windows
8. *Optional - open a new command line terminal and type “php -v” to ensure PHP has installed successfully and to see the current version installed*

**Setup & Execution:**
1. Locate the “xampp” folder (usually C:\xampp) and enter the “htdocs” folder within this
2. Clone the git repository into this “htdocs” folder
3. Open the XAMPP Control Panel and press “Start” beside “Apache” and “MySQL” to run both servers - they should turn green if running correctly

4. *Optional - The initial password for the root user is left empty by default. To change your MySQL password, press the “Shell” button to open the XAMPP terminal and type the following command, replacing “newpassword” with a password of choice:*
    
    ```bash
    mysqladmin --user=root password "newpassword"
    ```
    
    *If the password has been changed, open the “config.inc.php” file located in xampp/phpmyadmin, and change the password value on the following line:*
    
    ```php
    $cfg['Servers'][$i]['password'] = '';
    ```
    
5. Locate the “db-config.php” file in the “php” folder of the repository and update the following values with your MySQL details accordingly:
    
    ```php
    $db_user = "root";
    $db_pass = "";
    ```
    
6. Go to a browser of choice and enter the following URL: localhost/phpmyadmin 
7. Select “Import” in the nav menu and import the “osem.sql” file in the repository with the given default settings - you should now be able to view the “osem” database, and here you can track any changes being made in the back-end database as the application is being used
8. Go to a browser of choice and enter the following URL (change accordingly if you made a sub folder): localhost/rb549/index.php 
9. Login as an admin with the following details (A new admin can be created in the database with an MD5 hashed password):

    ```
    Email: admin@example.com
    
    Password: adm123
    
    Position: Admin
    ```
    
9. Manager and employee accounts can be created here for initial setup, and all other main system features are found in the manager and employee portals - enjoy!
