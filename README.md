# CakePHP 3 as a powerful back-end API

## Notes
1. I highly recommend you to use this repository as a template only.
2. Consider the folder `backend` and `frontend` as its own separate repositories. It is merged into one for ease.
3. `frontend` contains the Frontend AngularJS code, a basic site.
4. `backend` contains the Backend CakePHP code.
5. `presentation.pdf` are slides I presented at CakeFest 2016.

## Recommended setup
You are welcome to get createive in your setup. This is how i have my repositories setup:
- `blob.dev` points to `frontend`
- `api.blob.dev` points to `backend`

If you prefer to use a different `frontend` domain, be sure to add that to the `$origin` in `backend/src/Routing/Filter/CorsFilter.php`.

The main logic / core lies in Dispatch Filters. Read more about it here: [http://book.cakephp.org/3.0/en/development/dispatch-filters.html](http://book.cakephp.org/3.0/en/development/dispatch-filters.html)

## Frontend
Run the following command inside `frontend` folder:
```
$ bower install
```

## Backend
Set it up like you would setup any CakePHP 3 app. That is run the `composer` command inside `backend` folder:
```
$ composer install
```

Run migrations:
```
$ bin/cake migrations migrate
```