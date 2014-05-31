# FantasyDataAPI PHP Client wrapper
[![Build Status](https://api.travis-ci.org/gridiron-guru/FantasyDataAPI.png)](http://travis-ci.org/gridiron-guru/FantasyDataAPI)

PHP Client Wrapper for FantasyData, a Real time fantasy football data API providing feeds for your website
or mobile app. Since our organization needed to build a client wrapper for the service so that we could use
it for ourselves, we decided to work with the folks at FantasyData to create an Open Source version of our
client library so that anyone using their service can benefit from it. If you're a customer of FantasyData
and are interested in contributing back to this project, feel free to read the
[Contributing Documentation]((doc/CONTRIBUTING.md), we'd love to have you.

In the future, we'll also be adding related libraries as well. As we do, they'll be referenced here.

If you're interested in seeing what we do with the service, or you're just interested in Fantasy Football
in general, please check out our site, [Gridiron Guru](http://www.gridiron-guru.com).

## Requirements
This module requires the use of Composer, you will find additional software requirements in the packaged composer.json file.

In addition, you will need to obtain an api key from the [FantasyData Portal](http://fantasydata.com/). The service offers
a Free Trial as well as a Developer subscription for those getting started.

## Usage
Using the library requires only an API key

```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Timeframes(['Type' => Timeframes\Type::KEY_CURRENT]);
```

### Installing the library with Composer
To easily include the FantasyDataAPI into your project, you should be using [Composer](http://getcomposer.org).
To do so, add lines similar to the following to your project's composer.json file.

```json
"require": {
    "php": ">=5.4",
    "gridiron-guru/FantasyDataAPI" : "1.*",
},

"repositories": [ {
    "type": "vcs",
    "url": "https://github.com/gridiron-guru/FantasyDataAPI"
}],

```

## Travis CI
This project uses [Travis CI](https://travis-ci.org/gridiron-guru/FantasyDataAPI) for build and CI.

The same environment variables above are already encrypted in the travis.yml file for the project. The values in source
control are for accessing the project owner's FantasyDataAPI api key. This allows the Travis CI system to run
integration tests. If you wish to fork this repo and run your own TravisCI builds, then you will need to regenerate
the encrypted values.

## Open Source
This project is built on top of a number of open source projects, but I wanted to specifically call out
and thank the [Guzzle](https://github.com/guzzle/guzzle) project. Guzzle is a PHP HTTP client and
webservice framework for building RESTful web service clients. I first discovered Guzzle at
[php[tek]](http://tek.phparch.com), a PHP conference run by the folks at [php[architect]](http://www.phparch.com).

## Documentation
All documentation can be found in the [doc](doc) folder.

## Contributing
* [Getting Started](doc/CONTRIBUTING.md)
* [Bug Reports](doc/CONTRIBUTING.md#bug-reports)
* [Feature Requests](doc/CONTRIBUTING.md#feature-requests)
* [Pull Requests](doc/CONTRIBUTING.md#pull-requests)

# LICENSE
This module is licensed using the BSD 2-Clause License:

```
Copyright (c) 2014 Robert Gunnar Johnson Jr.
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

- Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.
- Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
  and/or other materials provided with the distribution.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
```