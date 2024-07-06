### Important things learned

`sail artisan vendor:publish --tag=laravel-pagination`

Publish the pagination view files into resources folder and be able to customize them

`sail artisan storage:link`

Laravel saves the images in the storage folder, we need to create a symbolic link to the public folder so the images can be accessed using asset() util

`date->format('d/m/Y')`

Thanks to Carbon we can format the date in the way we want

`nullable|image|max:1024`

New nullable validation rule learned, it allows the field to be null, in the case we have an image, the next rules will be applied

`image->store('public/images')`

Thanks to Laravel we can store the image in the storage folder, in this case in the storage/public/images folder

`sail artisan make:policy VacantePolicy --model=Vacante`

Create a policy for the Vacante model. It was useful for restrict the access to the edit methods`

`sail artisan notifications:table`

Create the notifications table migration then we need to run the migration

`sail artisan make:notification NewNotification`

Create a new notification class

