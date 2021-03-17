## About The Project
A web blogging platform.

### Built With
- Laravel 8.12
- Vue 2.6.12
- Bulma 0.9.2
- Tailwind 1.9.6

## Getting Started
This project uses the latest version of Laravel. The prerequisites are PHP 7.4+, Node/NPM , Composer, and the required PHP extensions for a Laravel project.

### Installation
1.- Clone the repo
```bash
git clone https://github.com/eleazarbr/blog-sample.git
```

2.- Install PHP dependencies
```bash
composer install
```

3.- Run the following scripts to install packages and compile the assets
```bash
npm install
npm run dev/production
```

4.- Create a MySQL database named `blog`  and set your `.env` credentials

5.- Run `php artisan migrate` and `php artisan db:seed`

## Usage
Run `php artisan import:posts` to import posts from the provided endpoint.

## Comments
> “One goal is to minimize the strain put on our system during traffic peaks, while also minimizing the strain we put on the feed server”

Due the performance of a web app depends on many things, such as: infrastructure, databases, cache, etc. I made sure of:

- Avoid N+1 query problems
- Cache the configuration `php artisan optimize`
- Do Assets bundling and Assets minifying
- Use Pagination function assuming that there may be thousands of Posts
- It was not necessary to Cache data
- It was not necessary to use Queues
- Feed data is processed in chunks to improve performance

## License
Distributed under the MIT [License][1]. See LICENSE for more information.

## Contact
- Eleazar Resendez - [@eleazarbr][2] - [eleazar@eresendez.com][3]
- Project Link: [https://github.com/eleazarbr/blog-sample][4] 

[1]:	/LICENCE
[2]:	https://twitter.com/eleazarbr
[3]:	mailto:eleazar@eresendez.com
[4]:	https://github.com/eleazarbr/blog-sample