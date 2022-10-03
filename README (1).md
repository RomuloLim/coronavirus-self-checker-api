# README

## Coronavirus Self Checker

❗This project was developed for learning only and is NOT a substitute for clinical examinations and medical appointments <mark style="color:orange;"></mark> ❗

### Pre-requisites

Before you begin, you will need to have [Docker](https://www.docker.com/) installed on your machine. In addition, it's good to have an editor to work with the code like [Visual Studio Code](https://code.visualstudio.com/).

#### Instalation step by step

1- Clone the repository

```
git clone https://github.com/RomuloLim/coronavirus-self-checker-api
```

2- Go to the file

```
cd coronavirus-self-checker-api
```

3- Create a .env file

```
cp .env.example .env
```

4- Up Docker containers

```
docker-compose up -d
```

5- Access app container

```
docker-compose exec app bash
```

6- Install project dependencies

```
composer install
```

7- Create a project key

```
php artisan key:generate
```

Access project on [http://localhost:8](http://localhost:8180)989
