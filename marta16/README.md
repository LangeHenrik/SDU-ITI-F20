# ITI project

A project description will go here, once it is up.

## Configuration (Windows)

### PHP

The latests PHP version binaries can be downloaded from the [PHP site][1], where it should be extracted into `C:\php\`. THe PHP directory should then [be added][2] to the `PATH` environment variable.

A PHP server can then be started from a project directory (where the `index.php` resides) using the command `php -S localhost:8080` and then accessed in the browser via the specified uri (`localhost:8080`).

### MangoDB

Text.

### Directory structure

The directory structure is [inspired by][3] a web-application framework:

```
project
├── components      : component files
|   ├── comp.php
|   └── ...
├── css             : styles
├── img             : graphic assets
├── js              : scripts
├── index.php       : entry site
└── file.php        : ...
```

<!-- links -->

[1]: https://windows.php.net/download
[2]: https://www.forevolve.com/en/articles/2016/10/27/how-to-add-your-php-runtime-directory-to-your-windows-10-path-environment-variable/
[3]: https://medium.com/@nmayurashok/file-and-folder-structure-for-web-development-8c5c83810a5



