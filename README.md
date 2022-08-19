<h1 align="center">
    <img height="80" src="https://img.icons8.com/material-rounded/96/000000/api-settings.png" />
    <p>Tools Controller API</p>
</h1>

## 🚨 About

**Tools Controller API** 
It is an API built with the LARAVEL 8 framework for a company's tool controller, this API is created as a study environment. 


## 🔨 Tools

- [PHP](https://www.php.net/)
- [MYSQL](https://www.mongodb.com/try/download/community)
- [SQLite](https://www.sqlite.org/index.html)
- [DOCKER](https://docs.docker.com/desktop/windows/install/)

## Libraries/Frameworks

- [LARAVEL 8](https://laravel.com/docs/8.x/installation)

### Requisitos

You must have [Docker](https://docs.docker.com/desktop/windows/install/) installed to run the commands

## 👨‍💻 How to Setup

```bash
    # Clone the project
    $ git clone https://github.com/gabrielteixeira-0814/api-laravel-tool-control.git
```

```bash
    # Enter directory
    $ cd api-laravel-tool-control
```

```bash
    # Run command to use Sail or use default command 
    $ alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail' or ./vendor/bin/sail up
```

```bash
    # Run command to use Sail
    $ sail up or sail up -d
```

```bash
    # Run the code to create fake profiles to populate the database
    $ sail artisan migrate:fresh --seed
```
```bash
    # To start the server at address: 
    http://localhost:80
```


## 📝 License

This project is under the MIT license. See the file <a href="https://github.com/gabrielteixeira-0814/api-laravel-tool-control/blob/main/LICENCE">LICENCE</a> for more details.

---

<p align="center">Created by Gabriel Teixeira</p>
