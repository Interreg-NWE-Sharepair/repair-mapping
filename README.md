# REPAIR MAP

## Setup
- Clone this repository
- Copy `.env.example` to `.env`, configure `.env` to your needs
- Configure you local environment, e.g. ddev
- Run `composer install` to install php dependencies

### Frontend
- Run nvm use to set node version (you might have to install it if you haven't already)
- Run `yarn install` to download frontend dependencies
- Build css & js with `yarn dev` or `yarn watch`

- Done!

## TODO
- The image gallery in show.blade.php doesn't scale properly. This is likely a css problem.
- Filament's tooltips and validation messages are yet to be translated. There doesn't seem to be a direct way to do so.
- After submitting a new suggestion and then confirming it, the nl translations (name, description & warranty description)
  appear empty. They still appear in the suggestion.
