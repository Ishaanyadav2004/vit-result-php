rerequisites:

XAMPP, WAMP, or MAMP: You need a local web server environment installed on your computer that includes:

Apache: The web server to serve your PHP files.
PHP: The PHP interpreter to execute your PHP code.
MySQL: The database server to store and retrieve student results.
Download and install one of these if you haven't already.

MySQL Database Setup:

Start your XAMPP/WAMP/MAMP control panel and ensure the Apache and MySQL services are running.
Open your web browser and go to http://localhost/phpmyadmin/.
Create a new database named vit_results.
Create a table named results within the vit_results database with the following columns (as defined in your database.php and result.php code):
id INT PRIMARY KEY AUTO_INCREMENT
student_name VARCHAR(255)
prn_no VARCHAR(20)
computer_networks_mse INT
computer_networks_ese INT
theory_of_computation_mse INT
theory_of_computation_ese INT
advanced_data_structures_mse INT
advanced_data_structures_ese INT
operating_systems_mse INT
operating_systems_ese INT
Populate the results table with some sample student data.
Steps to Run the Website:

Place Files in the Web Server Directory:

Locate the web server's document root directory. This is usually:
XAMPP: C:\xampp\htdocs\ (on Windows) or /Applications/XAMPP/htdocs/ (on macOS)
WAMP: C:\wamp64\www\ (on Windows)
MAMP: /Applications/MAMP/htdocs/ (on macOS)
Create a new folder inside the document root directory (e.g., vit_result_website).
Copy all your PHP files (index.php, get_result.php, database.php, result.php), the style.css file, and the script.js file into this vit_result_website folder.
Start Apache and MySQL Servers:

Open your XAMPP/WAMP/MAMP control panel.
Make sure the Apache and MySQL services are started (their status indicators should be green).
Access the Website in Your Browser:

Open your web browser.

Enter the following URL in the address bar:
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
http://localhost/vit_result_website/
This should open the index.php file, displaying the VIT Semester Result form.
---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Enter PRN and Get Result:

Enter a PRN number of a student whose data you have added to the results table in the MySQL database.
Click the "Get Result" button.
The result.php script will be executed (or get_result.php if you implemented the AJAX version), it will fetch the result from the database based on the PRN, and display it on the page.
