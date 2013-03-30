# Laracon 2013 Demo API

**See the presentation slides on [Speaker Deck](https://speakerdeck.com/akuzemchak/simple-api-development-with-laravel) or the video on [YouTube](http://www.youtube.com/watch?v=xa-FRWDxJrI).**

## Setup Instructions

_**Please note:** by default this API requires that you have [APC](http://www.php.net/manual/en/book.apc.php) installed for rate limiting. You can change the driver if desired in `app/config/cache.php`._

1. Make sure you have [Composer](http://getcomposer.org/) installed. I recommend [installing it globally](http://getcomposer.org/doc/00-intro.md#globally).
2. Clone or download this repository.
3. In a terminal, `cd` into this project's directory and run `composer install`.
4. Create a new MySQL database.
5. Update the `mysql` connection options in `app/config/database.php`.
6. Run `php artisan migrate` in the terminal.
7. Run `php artisan db:seed` in the terminal.
8. Start hitting the API in whatever tool you choose. [Postman](https://chrome.google.com/webstore/detail/postman-rest-client/fdmmgilgnpjigdojojpjoooidkmcomcm?utm_source=chrome-ntp-launcher) is a nice Chrome extension, and [HTTPie](https://github.com/jkbr/httpie) is a good command line option.

## API Documentation

### Authentication

The API uses Basic HTTP authentication for all requests. You must pass a valid API key as a username, and the password can literally be anything.

If you were going to connect via cURL, you would do this:

`curl -u "youruserapikeygoeshere:whatever" http://localapidomain.dev/v1/lists`

Note that we sent **whatever** as the password. This can be anything… it doesn't matter. However, since authentication is based on the API key only, you shouldn't share it with anyone.

### Response Formats

All responses are in JSON format.

### Response Codes

* **200:** The request was successful.
* **201:** The resource was successfully created.
* **204:** The request was successful, but we did not send any content back.
* **400:** The request failed due to an application error, such as a validation error.
* **401:** An API key was either not sent or invalid.
* **403:** The resource does not belong to the authenticated user and is forbidden.
* **404:** The resource was not found.
* **500:** A server error occurred.

## API Endpoints

### GET /v1/lists

Retrieve an array of the authenticated user's tasklists.

### POST /v1/lists

Create a new tasklist. Returns status code **201** on success. Accepts the following parameters:

* **name** &ndash; The name of the tasklist.

### GET /v1/lists/{id}

Retrieve the tasklist with the given ID.

### PUT /v1/lists/{id}

Update the tasklist with the given ID. Accepts the same parameters as **POST /v1/lists**.

### DELETE /v1/lists/{id}

Delete the tasklist (and all associated tasks) with the given ID. Returns status code **204** on success.

### GET /v1/lists/{id}/tasks

Retrieve tasks for the tasklist with the given ID.

### POST /v1/lists/{id}/tasks

Create a new task for the tasklist with the given ID. Returns status code **201** on success. Accepts the following parameters:

* **description** &ndash; The description of the task.
* **completed** &ndash; Whether or not the task is completed. A value of **yes**, **y**, **1**, **true**, or **t** will set the task as completed. Anything else will set the task as not completed.

### GET /v1/lists/{id}/tasks/{taskid}

Retrieve the task with the given ID.

### PUT /v1/lists/{id}/tasks/{taskid}

Update the task with the given ID. Accepts the same parameters as **POST /v1/lists/{id}/tasks**.

### DELETE /v1/lists/{id}/tasks/{taskid}

Delete the task with the given ID. Returns status code **204** on success.