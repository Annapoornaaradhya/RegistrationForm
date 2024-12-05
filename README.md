# RegistrationForm

The purpose of this project is to create an advanced, visually appealing online registration form that allows users to input and submit their details. The form integrates front-end and back-end technologies, ensuring a responsive design and robust functionality. Upon submission, the data is stored in a MySQL database, and the user receives confirmation of successful registration.
## Objectives:
•	To develop a user-friendly online registration form.
•	To create a responsive and aesthetically pleasing interface using a black theme with a contrasting pink color palette.
•	To securely store user information in a database.
•	To validate and sanitize user input to prevent errors and malicious attacks.
•	To display a styled confirmation page after successful registration.
## Technologies Used:
Front-End:
•	HTML5: Structure of the form.
•	CSS3: Styling and responsiveness using a black and pink theme.
•	JavaScript: Input validation and interactivity.
•	jQuery: Simplified DOM manipulation and form enhancement.
Back-End: PHP: Processing form data and communicating with the database.
Database: MySQL: Storing user data securely.
Hosting Platforms: Compatible with free hosting platforms like InfinityFree, 000WebHost, or AwardSpace.
## Features:
1.	User-Friendly Form Design: Responsive layout for various screen sizes (mobile, tablet, desktop).Black theme with contrasting pink highlights for a modern look.
2.	Input Fields: Full Name, Email, Phone, Date of Birth, Gender, Password.
3.	Client-Side Validation: Input fields validated for required formats (e.g., valid email, password rules).
4.	Backend Validation and Security: Data sanitized to prevent SQL injection and XSS attacks.Passwords hashed before storing in the database for security.
5.	Database Storage: User data stored in a MySQL database with proper schema design.
6.	Success Page: Displays a confirmation message with the same styling as the form.
## Implementation Details:
Step 1: Front-End Development
•	Designed the registration form layout using HTML5 and CSS3.
•	Applied the black theme with a pink color palette for styling.
•	Ensured responsiveness using CSS media queries.
Step 2: Back-End Development
•	PHP script (submit.php) was created to process form data.
•	Data validation, sanitization, and error handling were implemented.
Step 3: Database Design
•	MySQL database created with the following schema:
o	Database Name: registration_form
o	Table Name: users
o	Columns:
     id (Primary Key, Auto Increment)
     name (VARCHAR)
     email (VARCHAR)
     phone (VARCHAR)
     dob (DATE)
     gender (VARCHAR)
     password (VARCHAR)
Step 4: Hosting
•	The application was deployed on InfinityFree, with all necessary files (HTML, CSS, PHP) uploaded via FTP.
•	MySQL database connected using the hosting provider’s credentials.

## Results:
The registration form was successfully implemented with the following outcomes:
•	Users can fill out and submit the form effortlessly.
•	Data is securely stored in the MySQL database.
•	The confirmation page provides a cohesive and styled user experience.

## Conclusion:
This project demonstrates the successful integration of front-end and back-end technologies to create an advanced online registration form. The project showcases best practices in web design, data security, and user interactivity, providing a foundation for more complex web applications.
