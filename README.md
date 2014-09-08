Plugin that outputs a WPMU (WordPress Multi User) site list as a CSV.
=====================================================================

There's no easy way to pull a list of WPMU sites from within the admin interface, but that list is often needed for reporting, often after some additional analysis in Excel.

Provides the following fields:
* BLOG_ID
* SITE
* REGISTERED
* LAST_UPDATED
* ARCHIVED
* DELETED

To Use:
Upload to wp-content/plugins and enable just like any plugin.

**Caveat**
DO NOT enable this plugin from the Network Admin Dashboard. It immediately says you don't have permissions to view the page anymore. This is because the button it creates in the Dashboard is only visible to Super Admins. Instead, install and enable it from the root site of your WPMU install.
