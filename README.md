Starter Template - Wordpress - Tailwind - AlpineJS
==================================================

https://underscoretw.com/docs/A custom theme based on \_twQuickstart

### Installation

1. Please use "Local" (https://localwp.com/)
2. Create a site using that tool
3. Clone this repo inside `wp-content/themes` in your local development environment
4. Run `npm install && npm run dev` in this folder
5. Activate this theme in WordPress
6. In case of needed, import live site backup using All-In-One Migrator plugin

##### In case of a project from scratch

1. Install base ACF and All-in-one plugin
2. Go to `./init` folder, and use the zip files to upgrade them to the PRO version
3. After installing both plugins go to AFC tools and import the .json file that is inside the folder we mentioned before
4. Delete this folder and its content and push the changes, due we do not need it anymore
5. Its important to set `Site Menus` for the Header and Footer, do that under `Appearance > Menus`

### Development

1. Install recommended extensions for VSCode
2. Run `npm run watch`
3. Add [Tailwind utility classes](https://tailwindcss.com/docs/utility-first) with abandon

### Deployment

1. Run `npm run bundle`
2. Upload the resulting zip file to your site using the “Upload Theme” button on the “Add Themes” administration page

Or [deploy with the tool of your choice](https://underscoretw.com/docs/deployment/#h-other-deployment-options)!

### Full Documentation

### Fundamentals

* [Installation](https://underscoretw.com/docs/installation/)
  Generate your custom theme, install it in WordPress and run your first Tailwind builds
* [Development](https://underscoretw.com/docs/development/)
  Watch for changes, build for production and learn more about how _tw, WordPress and Tailwind work together
* [Deployment](https://underscoretw.com/docs/deployment/)
  Share your new WordPress theme with the world
* [Troubleshooting](https://underscoretw.com/docs/troubleshooting/)
  Find solutions to potential issues and answers to frequently asked questions

### In Depth

* [Using Tailwind Typography](https://underscoretw.com/docs/tailwind-typography/)
  Customize front-end and back-end typographic styles
* [JavaScript Bundling with esbuild](https://underscoretw.com/docs/esbuild/)
  Install and bundle JavaScript libraries (very quickly)
* [Linting and Code Formatting](https://underscoretw.com/docs/linting-code-formatting/)
  Catch bugs and stop thinking about formatting

### Extras

* [On Tailwind and WordPress](https://underscoretw.com/docs/wordpress-tailwind/)
  Understand how WordPress and Tailwind work together
* [Managing Styles for Custom Blocks](https://underscoretw.com/docs/custom-blocks/)
  Learn strategies for using Tailwind in theme-specific custom blocks
* [Setting Up Browsersync](https://underscoretw.com/docs/browsersync/)
  Add live reloads and synchronized cross-device testing to your workflow
