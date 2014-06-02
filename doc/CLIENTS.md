# Clients
This library has a single client for accessing the service, referred to as the "release"
client. In addition, for the purposes of testing it has a Debug client as well as a
number of "Mock" clients. Each client is explained in detail below.

## <a name="release-client"></a>Release Client
The release client is the only client that a library user should ever have to worry
about. The client itself is referenced inside the FantasyDataAPI namespace.

Using the release client is as simple as the following two lines of code. If you have
not retrieved your API key, please see the [API Key](FANTASYDATA.md#api-key) documentation.

A full list of available methods to call upon the client as well as the appropriate
parameters is listed below in the [Resources & Magic Methods](CLIENTS.md#methods)
section.

This is an example of using the release client to access the Timeframes resource.
Note that the creation of a client requires the API key. In addition, you will
notice that the parameter is using a class constant as the Type value. When
feasible all of the resources have Enums / Class constants defining acceptable
values.

```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Timeframes(['Type' => Timeframes\Type::KEY_CURRENT]);
```

### <a name="debug-client"></a>Debug Client
The Debug client is used for all testing inside the library. While a consumer
will likely never have to worry about using the Debug client, it is worth noting
that using the Debug client while developing can be quite helpful for debugging.

Visit the [Testing Documentation](TESTING.md#debug-client) for more details
on the Debug Client.

### <a name="mock-client"></a>Mock Client
The Mock Client can be used to effectively returns a mock response containing
content that mimicks what could be expected to be returned from the Service. This is
entirely for unit testing, however, some application developers also like to take
advantage of dependency injection within their applications for functional testing
as well.

Visit the [Testing Documentation](TESTING.md#mock-clients) for more details
on the Mock Client.

## <a name="service-description"></a>Service Description
The service description that we use to build our client library contains a
complete list of Methods and their parameters for every resource that we have
implemented with this library.

The service description is located inside module/FantasyDataAPI/Resources/fantasy_data_api.php

This file is the core array that drives the functionality of the entire library.
If you are encountering an issue calling a method on the service, it is highly
likely that the bug will be within this file.

## <a name="methods"></a>Resources & Magic Methods
If you were to open any of the various clients, you would notice there is no
Timeframes method. This is because all of the actual service calls are called via
the php __call magic method. As mentioned above the service description file
is the core component that drives the library. If you look through that file
you will notice a $resources variable with the "operations" key. Inside that
is an array containing every call that the library supports.

For example the array located inside $resources['operations']['Timeframes']
holds the service description for the Timeframes resource.

To save you the effort of having to read through that file to discover every
resource we've implemented, a complete list is contained below.

### Check if Games In Progress
**Description:** Returns true if there is at least one game being played at
the time of the request or false if there are none.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1112).

#### Action
> Check if Games In Progress

#### Resource Name
> AreAnyGamesInProgress

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->AreAnyGamesInProgress([]);
```

### Get Teams for Season
**Description:** List of teams playing in a specified season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1119).

#### Action
> Get Teams for Season

#### Resource Name
> Teams

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Teams(['Season' => '2014REG']);
```

### Get Schedules for Season
**Description:** Game schedule for a specified season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1120).

#### Action
> Get Schedules for Season

#### Resource Name
> Teams

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Schedules(['Season' => '2014REG']);
```

### Get Bye Week for Season
**Description:** Get bye weeks for the teams during a specified NFL season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1121).

#### Action
> Get Bye Week for Season

#### Resource Name
> Byes

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Byes(['Season' => '2014REG']);
```
### Get Game Scores for Season
**Description:** Get game scores for a specified season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1123).

#### Action
> Get Game Scores for Season

#### Resource Name
> Scores

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Scores(['Season' => '2014REG']);
```

### Get Scores for Season and Week
**Description:** Get game scores for a specified week of a season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1124).

#### Action
> Get Scores for Season and Week

#### Resource Name
> ScoresByWeek

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->ScoresByWeek(['Season' => '2014REG', 'Week' => '10']);
```

### Get Team Stats for Season
**Description:** Retrieves Season stats for all NFL teams for the requested Season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1126).

#### Action
> Get Team Stats for Season

#### Resource Name
> TeamSeasonStats

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->TeamSeasonStats(['Season' => '2013REG']);
```

### <a name="timeframes"></a>Get Timeframes
**Description:** Retrieve detailed information about past, present, and future
timeframes. A timeframe is a representation of the state of the NFL for the
timeframe requested.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#2117).

#### Action
> Get Timeframes

#### Resource Name
> Timeframes

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Timeframes(['Type' => Timeframes\Type::KEY_CURRENT]);
```

