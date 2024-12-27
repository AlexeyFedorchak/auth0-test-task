# Auth0 Test Task

This is a simple Laravel app that uses the Auth0 PHP SDK to authenticate users and authorize them to access protected routes.

## Getting Started

To get started, you'll need auth0 account and a client id and secret. You can create a new client in the [Auth0 dashboard](https://manage.auth0.com/#/applications).

Once you have your client id and secret, you can run the following command to install the dependencies:

```bash
composer install
```

and for front-end assets:

```bash
npm install
```

set up your `.env` file:

```bash
cp .env.example .env
```


and fill in the values for your Auth0 client id and secret:

```dotenv
AUTH0_DOMAIN=
AUTH0_CLIENT_ID=
AUTH0_CLIENT_SECRET=
AUTH0_AUDIENCE=
AUTH0_REDIRECT_URI=
```

also define all storage things in your `.env` file to use redis:

```dotenv
QUEUE_CONNECTION=redis
CACHE_STORE=redis
SESSION_DRIVER=redis
```

for starting the app:

```bash
sail up -d
```
and

```bash
sail npm run dev
```

to access the app in your browser.
```
http://localhost
```
