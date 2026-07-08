## Contributing
When contributing to this repository, please first discuss the change you wish to make via issue, email, or any other method with the owner of this repository before making a change.

Please note we have a code of conduct, please follow it in all your interactions with the project.

## Pull Request Process
- Ensure that your changes comply with the project's coding guidelines and that it's sufficiently documented.
- After sending the pull request to the dev branch, create a new ticket with the commit number and URL, adding a description of the new change in the web application.er sending the pull request to the dev branch.

- Update the README.md with details of changes to the interface, this includes new environment variables, exposed ports, useful file locations and container parameters.
- Target the develop branch for your Pull Requests as this is were new changes are introduced.
- After being successfully reviewed pull requests will be merged to develop branch and will finally be included in an upcoming release.

## Steps Laravel Project:
- Install Video Tutorial

https://www.youtube.com/watch?v=nveyLV804Qw

The following steps are meant to be used on a development server.

- Option 1: Install with Composer

```bash
$ composer create-project sistemaspymesjc/gisem
``` 

- Option 2: Clone Project

```bash
$ git clone https://github.com/sistemaspymesjc/gisem.git
``` 

- Pull Project Dev Branch

```bash
$ git pull dev
``` 
- Navigate to the root of the Laravel project

```bash
$ cd gisem
``` 
- Setup vendor libraries 

```bash
$ composer install
```

- Setup .env file and create database

- Copy .env.example config and generate Key project 

```bash
$ cp .env.example .env
``` 
```bash
$ php artisan key:generate
``` 

Second step Create New Database Example: gisem

APP_ENDPOINT_FACTORY=https://earthquake-usgs-gov.translate.goog

```bash
$ php artisan migrate
```

- Run server

```bash
$ php artisan serve
```