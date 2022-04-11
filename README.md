![FortifyTablerAdmin](https://bitbucket.org/akukoder/fortify-tabler-admin/raw/43ab4d3cb0ee8849349ae4995fb1b7c253db70c9/fortify-tabler-admin.png)

# Introduction

[![Latest Version on Packagist](https://img.shields.io/packagist/v/akukoder/fortify-tabler-admin.svg?style=flat-square)](https://packagist.org/packages/akukoder/fortify-tabler-admin)
[![Last Commit](https://img.shields.io/bitbucket/last-commit/akukoder/fortify-tabler-admin?style=flat-square)](https://packagist.org/packages/akukoder/fortify-tabler-admin)
[![Total Downloads](https://img.shields.io/packagist/dt/akukoder/fortify-tabler-admin.svg?style=flat-square)](https://packagist.org/packages/akukoder/fortify-tabler-admin)
[![License](https://img.shields.io/packagist/l/akukoder/fortify-tabler-admin?style=flat-square)](https://packagist.org/packages/akukoder/fortify-tabler-admin)

**FortifyTablerAdmin** is a Laravel Fortify UI preset, built with an open source [Tabler Admin Theme](https://tabler.io).

# Features

All Fortify features enabled by default, and some other basic features to get you started.

1. Login
2. Registration
3. Reset password
4. Email verification
5. Profile Information
6. Update password
7. Two-factor authentication
8. Browser session
9. User management
10. Multiple dashboard layouts to choose
11. Light or dark theme (per user setting)

## Layout Type

There are 3 layouts you can choose:

1. Horizontal
2. Overlap
3. Vertical

## Sidebar Position

For vertical layout, your have option to set the sidebar position:

1. Left
2. Right

## Styling

For both horizontal and vertical, you can choose the styling:

1. Light
2. Dark
3. Transparent (vertical layout only)

## Sticky Navbar

And if you choose horizontal, you have an option to set it to sticky.

# Requirement

Install the package on the new **Laravel 8 and above** only, without additional packages like Jetstream or Laravel Ui. Laravel Fortify and FortifyUI will be installed automatically.

# Installation

To get started, you'll need to install **FortifyTablerAdmin** using composer.

```shell
composer require akukoder/fortify-tabler-admin --dev
```

Next, you'll need to run the install command:

```shell
php artisan fortify:tabler
```

## Changing Layout

If you want to change the layout, just run this command:

```shell
php artisan fortify:layout
```

## Create Exmaple Pages

You can generate example page using the command below:

```shell
php artisan fortify:view
```

Currently, there are 10 pages included:

- activity
- faq
- gallery
- invoice
- license
- music
- pricing-cards
- search-result
- tasks
- users


*You can view the demo for each layout from Tabler official demo.*

# Documentation

For the documentations, please refer to the official websites.

- [Tabler](https://tabler.io)
- [Bootstrap 5](https://getbootstrap.com/)
- [Fortify UI](https://github.com/zacksmash/fortify-ui)
- [Intervention Image](https://github.com/intervention/image)
- [Arcanedev Laravel Settings](https://github.com/ARCANEDEV/LaravelSettings/)

# Screenshot

![FortifyTablerAdmin Screenshot](https://bitbucket.org/akukoder/fortify-tabler-admin/raw/8d605c5f8b26ca4b4690fd6e60434390a0f2a9f0/screenshot.png)

![Horizontal Layout](https://bitbucket.org/akukoder/fortify-tabler-admin/raw/8d605c5f8b26ca4b4690fd6e60434390a0f2a9f0/screenshot-horizontal.png)

![Overlap Layout](https://bitbucket.org/akukoder/fortify-tabler-admin/raw/8d605c5f8b26ca4b4690fd6e60434390a0f2a9f0/screenshot-overlap.png)

![Vertical Layout](https://bitbucket.org/akukoder/fortify-tabler-admin/raw/8d605c5f8b26ca4b4690fd6e60434390a0f2a9f0/screenshot-vertical.png)

![Vertical Transparent Layout](https://bitbucket.org/akukoder/fortify-tabler-admin/raw/8d605c5f8b26ca4b4690fd6e60434390a0f2a9f0/screenshot-vertical-transparent.png)

# Credits
- [Fortify UI](https://github.com/zacksmash/fortify-ui)
- [Tabler](https://tabler.io)
- [Proxeuse](https://github.com/Proxeuse/fortify-tabler)

# License

**FortifyTablerAdmin** is open-sourced software licensed under the [MIT license](LICENSE.md).
