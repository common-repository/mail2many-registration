=== mail2many Registration ===
Contributors: mail2many, christophgraf
Tags: email, marketing, mail2many, newsletter, sign-up
Requires at least: 5.2
Tested up to: 6.6.2
Requires PHP: 8.1
Stable tag: 1.1.2
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

A registration form for mail2many

== Description ==
With this plug-in, you can create a registration form on your WordPress site that will allow you to add recipients to your mail2many mailing list.

This plugin uses a third-party API of mail2many from ATRIVIO. The plugin accesses the API, which is available at the [endpoint 1](https://127-api.mail2many.de) or [endpoint 2](https://145-api.mail2many.de), when a user registration form is submitted.

Details and documentation of the API can be found [here](https://127-api.mail2many.de/api/v1/documentation).

Please find the service terms and privacy policy [here](https://www.mail2many.de/datenschutz).

= WHAT IS MAIL2MANY? =
[mail2many](https://www.mail2many.de/) is a powerful and professional email marketing software. Create and send beautiful emails and newsletter in a simple and intuitive way. With our industry leading mail2many HQ we offer email marketing for communication between manufacturers, their distributors and customers.

= FEATURES =
* Easy to use
* Media management
* Personalized content
* Marketing automations
* Language versions
* Multiple mailing lists
* System integration
* Tracking and evaluation
* Subscriber management
* Legal security

= SUPPORT =
If you need support you can:
- create a topic in the WordPress.org plugin support forum
- ask your contact person at mail2many

= TRANSLATIONS =
You can help translate this plugin into your language using your WordPress.org account.

= SUBMITTED DATA =
The following data is transferred to the ATRIVIO API when the API is called:

* Gender, first name, last name, email address entered by the user in the registration form
* URL of the Wordpress page

Please find the privacy policy [here](https://www.mail2many.de/datenschutz).

== Installation ==
= How to install the plugin: =
- In your WordPress admin panel, go to Plugins > New Plugin, search for mail2many and click „Install now“
- Alternatively, download the plugin and upload the contents of mail2many-registration.zip to your plugins directory, which usually is /wp-content/plugins/
- Activate the plugin
- Create a new API key in your mail2many account
- In WordPress under settings > mail2many: Save your API key
- In your page, add a „Shortcode“-Template and insert [mail2many-registration] as shortcode
- Refresh your page and test the registration

== Changelog ==

= 1.0.0 =
*Release Date - 27 March 2024*

* Initial release

= 1.0.1 =
*Release Date - 11 April 2024*

* Updated version compatibility

= 1.0.2 =
*Release Date - 19 Jun 2024*

* Updated version compatibility

= 1.1.0 =
*Release Date - 20 Jun 2024*

* Added settings for server and privacy text

= 1.1.1 =
*Release Date - 26 August 2024*

* Updated version compatibility

= 1.1.2 =
*Release Date - 10 October 2024*

* Updated version compatibility and readme text