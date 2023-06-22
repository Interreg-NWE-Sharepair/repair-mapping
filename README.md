# REPAIR MAP

## Setup
- Clone this repository
- Check your .env variables, especially the API urls
- Configure ddev in config.yaml, then start with 'ddev start'
- Run nvm use to set node version (you might have to install it if you haven't already)
- Run 'yarn install' & 'composer install' to download dependencies
- Build css & js with 'yarn dev' or 'yarn watch'
- Done!

## TODO
- The edit form doesn't load the logo or images of the chosen location. This is because Filament's FileUpload field doesn't
  accept a default image. Either figure out how to pass an image to the fields, or find an alternative to the fields.
- The image gallery in show.blade.php doesn't scale properly. This is likely a css problem.
- Filament's tooltips and validation messages are yet to be translated. There doesn't seem to be a direct way to do so.
- While the original site used slugs for its show page url, the ordp component doesn't provide them. As such, the id is 
  used instead. This isn't necessarily a problem, but does present an inconsistency, and might provide too much info to
  the end user. 
- The location filter on the index page throws errors despite working correctly (handler for submit event undefined)
- After submitting a new suggestion and then confirming it, the nl translations (name, description & warranty description)
  appear empty. They still appear in the suggestion.
