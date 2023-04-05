
# Salesforce Mini App

Technical assignment to demonstrate the integration with Salesforce Platform via APIs


## 🔗 Demo
You can try the demo application with the link below
[![portfolio](https://cdn-icons-png.flaticon.com/128/6051/6051251.png)](https://next-gen.phucnguyen68.com/)

[Demo Application](https://next-gen.phucnguyen68.com/)
## System Requirements

Webserver Apache or Nginx or simply use built-in PHP server (artisan serve)
- PHP 8.1+
- MySQL 5.7+

## API Document

You can use the provided Postman Collection to import into your `Postman` app
```
./docs/postman/next-generation-salesforce-api.json
```


## Architecture

This project will be decorated in the `\src`. I tend to leave the `\app` as default.

### Entities
The `Entities` is the protagonist in Hexagonal architecture, or somewhere they reference it as the `Application`. We use the pluralized term `Entities` or `Entity` in this project to build all business logic around the `Entity`.This section present for all business logic implemented across the application.

The `Application` code will interact with the `Infrastructures` through `Interactors`, `Contracts` and `Repositories`. We can safely assume that `Contracts` and `Repositories` are `Ports` and `Adapters` in Hexagonal architecture.

### Infrastructures

The `Infrastructure` section present for technologies that implemented across the application, which is the `Laravel` framework in this case. The section contains anything that coupled to the infrastructure and separated from the application code.

### Integrations
The `Integrations` section present for third parties that integrated across the application, which is the `Salesforce` platform in this case. The section contains all required classes to create the integration between the application and Salesforce like: API Clients, Request Objects, Response Objects, Services, Exceptions



## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`DB_DATABASE` = `{your database name}`

`DB_USERNAME` = `{your database user}`

`DB_PASSWORD` = `{your database password}`

`QUEUE_CONNECTION` = `database`

`SALESFORCE_CLIENT_ID` = `{your client id}`

`SALESFORCE_CLIENT_SECRET` = `{your client secret}`

`SALESFORCE_ACCESS_TOKEN` = `{your access token}`

`SALESFORCE_REFRESH_TOKEN` = `{your refresh token}`

`SALESFORCE_INSTANCE_URL` = `{your Salesforce instance url}`

`SALESFORCE_AUTH_URL` = `https://login.salesforce.com`

## Installation

Clone the project

```bash
  git clone https://github.com/snowsolutions/next-generation.git
```

Go to the project directory

```bash
  cd next-generation
```

Install composer dependencies

```bash
  composer install
```

Run the migration

```bash
  php artisan migrate
```

Install node dependencies

```bash
  npm install
```
Build assets with Vite

```bash
  npm run build
```
Run the application with virtual host setup or built-in php server via `artisan` command

```bash
  php artisan serve
```
## Tests

The tests have to wait a bit...

```bash
```

## 🚀 About Me
Phuc Nguyen - A fullstack software engineer who sometime make simple things complicated in a beautiful approach

## Acknowledgements
- [Hexagonal Architecture by Alistair Cockburn](https://alistair.cockburn.us/hexagonal-architecture/)
