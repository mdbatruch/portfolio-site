# portfolio-site v1.3

These are the files for my Portfolio Site.

## Changelog

## v1
* Initial build with Static Pages and Mail Function for Contact Page

## v1.1
* Make site Database driven

## v1.2
* Update Contact Form with AJAX Validation and PHPMailer

## v1.3
* Update Site with Admin Backend to become a Content Management System, being able to update Projects and Contact Page without touching source files

## Usage

To install site, clone the files and keep site and SMTP credentials in seperate .ini files outside of Site Root in the following format, replacing the placeholder values with your server settings:

db.ini
server=SERVER_NAME
username=USERNAME
password=PASSWORD
db=DATABASE_NAME

smtp.ini
username=USERNAME
password=PASSWORD
host=SMTP_HOST
port=PORT
secure=PROTOCOL
from=FROM_EMAIL
recipient=EMAIL_RECIPIENT
recaptchaprivate=CAPTCHA_PRIVATE_KEY
recaptchapublic=CAPTCHA_PUBLIC_KEY

You will need to register a Captcha Account with Google for the Contact Form to work.

* Create A Database and Run all Migrations, including the Seed file (you can replace values as needed and make sure password is hashed with MD5 encryption)

* To run Sass and BrowserSync preprocessor, cd into resources directory and run npm install command to install node modules. After installation run gulp watch to watch any changes to sass files. You may need to refresh browser to begin seeing changes.
