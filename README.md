Currently using Bootstrap v4.0.0-beta

### What is JBST4?
JBST4 is a blank WordPress theme built with Bootstrap 4.

JBST4 is intended to be used as a starter theme, not as a parent or theme framework. In almost all instances we would recommend you just hack away and customise JBST4 itself.

## JBST4 Requirements
JBST4 requires [Node.js](https://nodejs.org) v6.9.x or newer. This doesn't mean you need to understand Node (or even Gulp) - it's just the steps we need to take to make sure all of our development tools are installed. 

## Getting Started 
### Download JBST4 and install dependencies with npm 
```bash
$ cd my-wordpress-folder/wp-content/themes/
$ git clone https://github.com/JeremyEnglert/JBST4.git
$ cd JBST4
$ npm install
```
At this point, JBST4 should be installed and fully running on your local machine. If you prefer to install the theme manually, that will work as well - just be sure to run `npm install` after manually moving the files into the `/themes/` directory.

## Working with JBST4
### Watching for Changes
```bash
$ npm run watch
```
* Watches for changes in the `assets/styles/scss` directory. When a change is made the SCSS files are compiled, concatenated with Foundation files and saved to the `/styles` directory. Sourcemaps will be created.
* Watches for changes in the `assets/scripts/js` directory. When a change is made the JS files are compiled, concatenated with Foundation JS files and saved to the `/scripts` directory. Sourcemaps will be created.
* Watches for changes in the `assets/images` directory. When a change is made the image files are optimized and saved over the original image.

### Watching for Changes with Browsersync
```bash
$ npm run browsersync
```
This will watch the same files as `npm run watch`, but utilizes browsersync for live reloading and style injection. Be sure to update the `URL` variable in the `gulpfile.js` to your local install URL. 

## Compile and Minify All Theme Assets
```bash
$ npm run build
```
Compiles and minifies all scripts and styles.

### Compile Specific Assets
* `$ npm run styles` - to compile all SCSS files in the `assets/styles/scss` directory.
* `$ npm run scripts` - to compile all JS files in the `assets/scripts/js` directory.
* `$ npm run images` - to optimize all image files in the `assets/images` directory.

## File Structure - "Where to Put Stuff"

### Custom Styles
* `style.css` - this file is never actually loaded, however, this is where you set your theme name and is required by WordPress
* `assets/styles/scss/style.scss` - import all of your styles here. If you create an additional SCSS file, be sure to import it here.
* `assets/styles/scss/_main.scss` - place all of your custom styles here.
* `assets/styles/scss/_variables.scss` - overwrite Bootstrap's variables here.
* `assets/styles/scss/login.scss` - place custom login styles here. This will generate it's own stylesheet.
### Custom Scripts
* `assets/scripts/js/` - place your custom scripts here. Each .JS file will be compiled and concatenated when the build process is ran.

### Images
* `assets/images/` - place your theme images here. Each image will be optimized when the build process is ran.

## Masonry template
The Masonry template organizes your post into [Masonry](http://masonry.desandro.com/)-like columns with just CSS by wrapping them. 

## Offcanvas menu template
The Offcanvas menu temlate contains a toggleable off-canvas navigation menu for small viewports.


### <strike>CSS Only
- You can find the CSS only version at [https://github.com/bassjobsen/jbst-4](https://github.com/bassjobsen/jbst-4)

### Flexbox
- You can find CSS only version with flexbox support at [https://github.com/bassjobsen/jbst-4-css-flexbox](https://github.com/bassjobsen/jbst-4-css-flexbox)
</strike>

### Credits
- Forked from and thanks to [JointsWP](http://jointswp.com/)
- [Bootstrap](http://getbootstrap.com/)
