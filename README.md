Nidavellir
===========

[![Build Status](https://travis-ci.com/dgroddick/nidavellir.svg?branch=master)](https://travis-ci.com/dgroddick/nidavellir)

Nidavellir is a WordPress theme that departs from 'normal' Web Design trends, with flashy, smooth and slick elements.
Utilising Brutalist web design and CSS Grid. Nidavellir returns the Web to a simpler time.

![Nidavellir Theme](https://github.com/dgroddick/nidavellir/blob/master/screenshot.png)

Building
---------

If you intend on downloading this development version of Nidavellir, you should probably think of preparing the theme before uploading it to your WordPress site. The Makefile prepares all the files of the theme without all the development assets, like composer packages and git files, into a zip archive suitable for uploading to a WordPress installation.

This assumes you're building this on either Linux or MacOSX with bash and posix tools.

Simply run:

$ make build

To build the final package, or

$ make clean

To clean up after yourself.


Installation
-------------

1. In your admin panel, go to Appearance > Themes and click the Add New button.
2. Click Upload Theme and Choose File, then select the theme's .zip file. Click Install Now.
3. Click Activate to use your new theme right away.
