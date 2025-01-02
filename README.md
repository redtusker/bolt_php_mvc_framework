When you deploy to your production server, don’t forget to run the following command:

```composer install --no-dev```

The above command will remove the Composer packages only for development that are not needed in the production environment. This will greatly reduce the vendor folder size.