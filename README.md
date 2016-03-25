<<<<<<< HEAD
# MTK Tavern WordPress Theme
###### version 1.0.0

Custom WP Theme for the MTK Tavern website built with some custom backend templates and some custom plugins.  Secret tokens used for connecting to the facebook API have been removed so the calendar might not work out of the box.

## Installation

The MTK Tavern theme requires the following programs to run correctly.  Please goto their documentation for 
information about installing them before continuing.  This theme will also need to be included inside of a 
WordPress installation that you will need to setup first.

1. npm
2. ruby
3. grunt
4. bower

Once you are ready, open a new shell in the MTK Tavern theme directory and run the following commands in this order.

```bash
npm install
``` 

```bash
bower install
```

## Grunt

This theme was built using the grunt taskrunner so you will need to run this command before making any changes.

```bash
grunt watch
```

#### Grunt Processes

1. **gitadd:** Automatically adds changes to git but does not commit them.
2. **compass:** Compiles all .scss files to a single .css file.
3. **combine_mq:** Combines all matching sized media queries together.
4. **autoprefixer:** Uses the caniuse.com database to automatically compile browser prefixes into css.
5. **cssmin:** Minfies the css
6. **jshint:** Tests for valid javascript
7. **requirejs:** Asynchronously loads libraries and custom modules into the WordPress footer.

### Theme Files

**1. functions.php:** Sets up the theme's defaults and loads CSS and JavaScript into the theme.
**2. classes/FacebookAPIConnect.php:** Connects to the Facebook graph API which is used by the event calendar.  This file's secret tokens were removed to keep them safe so it does not work out of the box.
**3. admin_templates/Templates.php:** Sets up custom admin forms used in WordPress's backend.  Changing what template a page uses will load different input forms for that page if that page requires custom data from the admin.
**4. admin_templates/templates/*.php:** Organizes forms into their own files which are included by the admin_template/Templates.php class.
**5. page_templates/*.php:** Custom html page templates that determine how pages are displayed on the front end.

## SASS

Used to keep css organized into seperate files and gives the developer amazing control over the css.

**SASS Directory:** 'css/sass/'

### SCSS Files

This theme uses the .scss file extension (see SASS documentation for more information)

**1. style.scss:** Compiles all .scss files into a single style.css file when grunt watch detects a change inside any .scss file.
**2. _variables.scss:** Global SASS variables are declared here and used throughout the other .scss files.
**3. _mixins.scss:** Global SASS mixins are declared here and are also used in other .scss files.
**4. _foundation.scss:** Core styles used by all browsers.
**5. _enhanced.scss:** Styles used for browsers that support the border-style: border-box; property natively.
**6. _grid.scss:** Custom CSS flexbox grid used throughout the website.
**7. _header.scss & _footer.scss:** Styles used for the site's header and footer.
**8. _content.scss:** Styles used for the #main content section of the website.
**9. templates/*.scss:** Styles for individual pages.

## requirejs and javascript

Used to keep javascript files and their dependencies organized.  All front end javascript is organized into modules to make finding 
things easier on the developer.

**JS Directory: ** 'js/'

### Requirejs Files

**1. config.js:** Loads requirejs and sets its baseUrl option to where WordPress is installed automatically.  Then loads all dependencies and runs the app.js module.
**2. optimize.min.js:** This is what the browser actually loads along with requirejs.  Grunt will automatically compile changes to this file if there are no errors.
**3. modules/main.js:** The main section of our app used to load all custom modules.
**4. modules/gallery.js:** lightbox library options.
**5. modules/hamburger.js:** Adds the hamburger annimation used by main.js to create an annimating hamburger for mobile views.
**6. modules/lazyload.js:** Lazyload library options.
**7. modules/slider.js:** bxslider library options.

### Other JavaScript Files

**1. facebook.js:** Adds a facebook share button to the calander pages.
**2. googleAnalytics.js:** Sends google analytics account information each time page loads.
**3. wordpress_admin/*.js:** Displays that are used for custom input templates that are loaded in the theme's backend section.



=======
# mtk-tavern-wp-theme
A custom WordPress theme that utilizes various custom admin page templates.  I often am in need of custom forms for the WordPress backend and decided to roll my own method of building templates that I think is less confusing to non WordPress users.  The idea that makes this different is instead of digging through options and copy/pasting shortcodes, this theme comes with a way for a PHP/WordPress developer to easily code their own html forms for a page on the back end.  The theme detects which form to load by comparing the currently loaded page template and then loading one of the admin templates

Now any clever developer can further add customizations to their WordPress backend that can be easliy explained to clients who are often less tech savy.  This theme's strongest feature is its simple to add page templates that will effect how data is entered on the backend.  It's currently still a work in progress so feel free to comment or send me suggestions.  
>>>>>>> 7b8fa3dc106727de504c15bb5eaac298df4f42bc
