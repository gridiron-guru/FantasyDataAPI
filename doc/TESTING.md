# Testing
As mentioned in the [contributing guidelines](CONTRIBUTING.md) document, all
pull requests related to new features or bug fixes should contain relevant
tests, that pass.

In order to write tests for this project, you'll need to know how it's built
and how it expects unit tests to be written and executed.

First and foremost, you will always want to make sure that when you run
phpunit for this library that you bootstrap it so that it is able to
autoload classes.

For example, if you were to run all of the unit and integration tests at once,
your command would look like this:

```bash
  ./vendor/bin/phpunit --bootstrap test/phpunit/bootstrap.php test/phpunit/
```

## Debug Client
Most tests written for this library will require the Debug Client. The
primary difference between the release client and the debug client is
that the debug client attaches Guzzle's Subscriber History listener on the
Guzzle Http client event emitter.

This listener allows us to get additional information back from the client
by accessing the DebugClient's mHistory property.

For example, if we wanted to get the last response from a DebugClient we
would execute the following code in our scripts:

```php
  $response = $client->mHistory->getLastResponse();
```

The response object return has the ability to provide the Headers returned
by the request as well as the status code, effective url that was called
and th body of the response in its original format.

All of these methods are invaluable when writing unit tests. To see these
types of methods in action, review the /test/phpunit/Integration/TimeframesTest.php
file and the tests contained in it.

## Mock Client
The Mock Client takes some effort to build, but is what allows us to test
a great number of details about a resource without having to make dozens of
calls to the live service.

The important part is that each service needs its own ability to generate
the Mock Response file paths. See the Timeframes resource as an example.

### Mock Response Files
Each service resource has a collection of Mock Response files. Using
the Timeframes resource as an example, you will notice that each parameter
in the URI (except the API key) is used to build up multiple file names.
Each response type that you want to mock requires a <file params>.body.json
file and a <file params>.header.php file. You can use the existing Timeframes
files as an example when you need to build your own.

### Building Mock Responses
I have found the best way to build out the Mock objects is to use the debug
client to get the LastResponse and then use it to retrieve the Headers
array which I then build the (...).header.php file.

I then use the getEffectiveUrl call from the response object to retrieve
the exact URL used to call the service. I open a browser and load that URL
directly. I then copy the resulting JSON and past it into the (...).body.json
file.

## Integration Tests
For this project "Integration Tests" are small tests that call out to the
live service and perform a handful of tests. Usually you only want to try
from 1 to 5 tests, generally around successful or known failure stats from
the API itself, just so that you can test basic connectivity and that
nothing drastic has changed with the responses.

You do not want to build a large suite of integration tests as you don't
want to hammer the service every time you're testing, or every time a build
runs. Since you're going to be building your Mock tests off of the live
service calls, it somewhat reduces the need for integration tests, though
certainly not completely.

Whenever you want to run the existing integration tests, you can execute the
following command in your bash shell.

```bash
  ./vendor/bin/phpunit --bootstrap test/phpunit/bootstrap.php --group Integration test/phpunit/
```

## Unit Tests
The unit tests are for testing individual units of source code. For this
project we are effectively testing the service description file since we
are built on Guzzle, and it already has its own unit tests. This basically
means all we really need to test are our integration points.

You'll notice in the Timeframes Mock tests, they are generally making
sure that the parameters provided are ending up in the correct parts of
the URL and that the expected arrays are being returned. There are tests
for each variant of the required parameter.

We're not looking to completely lock down every option, only the most
common efforts, which are usually defined by Test Driven Development.
Since we know we'll add tests for any bugs we find as we go, it's less
important to cover *every* test case we can think of, and just important
to catch the common mistakes.

Whenever you want to run the existing unit tests, you can execute the
following command in your bash shell.

```bash
  ./vendor/bin/phpunit --bootstrap test/phpunit/bootstrap.php --group Mock test/phpunit/
```
