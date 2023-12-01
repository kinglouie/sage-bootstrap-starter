# Dev setup with lando for local development

## 1. Create empty wordpress installation

from lando[wordpress recipe docs](https://docs.lando.dev/wordpress/getting-started.html)

```
# Create folder and enter it
mkdir wordpress && cd wordpress

# Initialize a wordpress recipe using the latest WordPress version
lando init \
  --source remote \
  --remote-url https://wordpress.org/latest.tar.gz \
  --recipe wordpress \
  --webroot wordpress \
  --name my-first-wordpress-app

# Start it up
lando start

# List information about this app
lando info

# Create a WordPress config file
lando wp config create \
  --dbname=wordpress \
  --dbuser=wordpress \
  --dbpass=wordpress \
  --dbhost=database \
  --path=wordpress

# Install WordPress
lando wp core install \
  --url=https://my-first-wordpress-app.lndo.site/ \
  --title="My First Wordpress App" \
  --admin_user=admin \
  --admin_password=password \
  --admin_email=admin@my-first-wordpress-app.lndo.site \
  --path=wordpress
```

## 2. Clone this repo into theme folder

```
cd wordpress/wp-content/themes
git clone http://github.com/kinglouie/sage-bootstrap-starter
```

## 3. Install Plugin All Bootstrap Blocks by AREOI

- Install the Plugin
- Update the Plugin Settings
  - Remove checkbox `Include Bootstrap CSS`
  - Remove checkbox `Include Bootstrap JS`

## 4. Update lando config

To use the sage dev server and live reloading features, the lando config needs to be updated. Here is an example config:

```
name: sage-bootstrap-starter
recipe: wordpress

config:
  php: '8.1'
  webroot: wordpress

services:
  theme:
    type: node:18
    command: cd wordpress/wp-content/themes/sage-bootstrap-starter && yarn dev

tooling:
  composer:
    dir: /app/wordpress/wp-content/themes/sage-bootstrap-starter
    service: appserver
  yarn:
    dir: /app/wordpress/wp-content/themes/sage-bootstrap-starter
    service: theme

proxy:
  theme:
    - theme.sage-bootstrap-starter.lndo.site:3000

```

## 5. run first build

`cd` into theme directory
run `lando composer install` to install php theme dependencies
run `lando yarn` to install node theme dependencies
run `lando yarn build` to create a basic theme build

## 6. bud config

The public and proxy urls in `bud.config.js` need to be in sync with the wordpress site url and the proxyurl configured in `.lando.yml`.

---

# Theme Development

- Whenever bootstrap variables are changed in `_variables.scss` you need to enable the checkbox `Include Bootstrap CSS` in the plugin settings of All Bootstrap Blocks to recompile the gutenberg css, after recompilation, disable the checkbox again
