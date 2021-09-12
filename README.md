# Pokemon GO Pokedex API

This project shows the latest Pokemon GO Pokemon Data as a JSON API.
As source the GameMaster Files from PokeMiners are used.

For the current Raidbosses multiple sources are available.
The current Source can be found in the bottom of the Raid Info Graphics. 

## Examples

### Current Raidlist

**German version**

![Current Raidlist - German](https://titanicboyke.github.io/pokemon-go-api/api/graphics/German/default.png)

**English version**

![Current Raidlist - German](https://titanicboyke.github.io/pokemon-go-api/api/graphics/English/default.png)
*Alternative Version*  
![Current Raidlist - German](https://titanicboyke.github.io/pokemon-go-api/api/graphics/English/reverse.png)

## How to use
The latest resources are available on the Github page as an JSON API with an OpenAPI Documentation.

Visit https://titanicboyke.github.io/pokemon-go-api/ for the public available API hosted as Github Page.

### Use as local version
If you want to host the API by your own you can download this Project and run the following commands to Update the files.
```bash
composer install
composer run-script api-build
# create a PNG file from the SVG Images (See bin/convert-images.sh)
composer run-script convert-svg
```

### Add custom templates
If you want to use your custom Raid temaplate the following steps are possible:  
Solution 1  
- Create a template file
- Append the RaidConfiguration with template filepath here: `config/raid-grahpics.default.php`

Solution 2  
- Create a template file
- Create a new Configuration file with the name `config/raid-graphics.{AppConfigEnvName}.php`
- Set or change the `APP_CONFIG` enviornment variable in your build step

#### Notes about the Template files
For the best Image results, the Template should set the `$svgWidth` and `$svgHeight` variables. The script will
automatically add the Size into the svg Image as an comment and parse it in the convert-images. 

## Disclaimer
This repo is for educational use only. All available information found within this repo is the property of The Pokemon Company and Niantic. All copyright belongs to the respective companies. Please respect the original source material.

## Source
This repository uses the latest Game Master files for Pokemon GO from https://github.com/PokeMiners/
Any resources linked from the API are linked directly to the assets repository from the PokeMiners https://github.com/PokeMiners/pogo_assets
