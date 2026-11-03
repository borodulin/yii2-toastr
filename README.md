# Toastr widget for Yii2 framework

[![Latest Version](https://img.shields.io/packagist/v/conquer/toastr.svg)](https://packagist.org/packages/conquer/toastr)
[![Total Downloads](https://img.shields.io/packagist/dt/conquer/toastr.svg)](https://packagist.org/packages/conquer/toastr)
[![License](https://img.shields.io/packagist/l/conquer/toastr.svg)](LICENSE.md)

## Description

toastr is a Javascript library for Gnome / Growl type non-blocking notifications. jQuery is required. The goal is to create a simple core library that can be customized and extended.
For more information please visit [Toastr](http://codeseven.github.io/toastr/) 

## Requirements

- PHP 7.4 or 8.x
- Yii 2.0
- [asset-packagist](https://asset-packagist.org) repository configured in your application's `composer.json` (standard for Yii2 app templates)

## Installation

Install the extension via [Composer](https://getcomposer.org):

```bash
composer require conquer/toastr:^1.1
```

## Usage

```php
use conquer\toastr\ToastrWidget;

ToastrWidget::widget(['title'=>'Hello!', 'message'=>'World!']);

```

## License

**conquer/toastr** is released under the MIT License. See the bundled [`LICENSE.md`](LICENSE.md) for details.
