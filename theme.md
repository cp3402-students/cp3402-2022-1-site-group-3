**Files of Interest**

This project makes use of the underscores starting theme. The theme offers a strong framework around which to construct, modify, and style in accordance with the desired preferences. There are several different files in Underscores, but only one should normally be required for our project.

**These files include:**

`footer.php` - Added widget to display some navigation, managed as a menu within WordPress under the name _"Custom Menu"_

`header.php` - Added widget to display social media accounts, managed as a menu within WordPress under the name _"Socials"_

`functions.php` - Added code to create widgets in the header and footer

The site uses Sass to style our theme. Incorporating Sass introduced another file structure into the themes project folder. Within Sass, separate components and concepts are moved to different files which should be intuitive. All Sass code is contained within the `sass/` folder and is compiled into the `style.css`. This can be done by installing the Sass compiler and running `sass -w sass:.` from within the `underscores/` directory.

**Theme Features**

We added a custom menu to the footer. We also included widgets to header to allow for social media integration.

**Design decisions**

The design of the site is based on an early mock-up design. The base underscores theme contains little in the way of design structure, so some important mixins have been created.

`white-space()` - Can be used to add white space on the sides of the lowest level elements, implemented as padding

**Colours**

All colour schemes can be edited in customisation on WordPress or edited further in CSS. Additional tags would need to be created/edited.

Current background-colour: #ffffff Gradient button-colours: #377EF9, #E8B11C