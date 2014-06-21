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

#### Resource Name
> Schedules

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Schedules(['Season' => '2014REG']);
```

### Get Bye Week for Season
**Description:** Get bye weeks for the teams during a specified NFL season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1121).

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

#### Resource Name
> ScoresByWeek

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->ScoresByWeek(['Season' => '2014REG', 'Week' => '10']);
```

### Get Team Stats per Game for Season for Week
**Description:** Retrieves Game stats for each team for a given Season and Week.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1125).

#### Resource Name
> TeamGameStats

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->TeamGameStats(['Season' => '2013REG', 'Week' => '10']);
```

### Get Team Stats for Season
**Description:** Retrieves Season stats for all NFL teams for the requested Season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1126).

#### Resource Name
> TeamSeasonStats

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->TeamSeasonStats(['Season' => '2013REG']);
```

### Get Team Standings for Season
**Description:** Retrieves overall team standings for the requested Season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1127).

#### Resource Name
> Standings

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Standings(['Season' => '2013REG']);
```

### Get Team Roster and Depth Charts
**Description:** Retrieves Players resources for the requested team.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1128).

#### Resource Name
> Players

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Players(['Team' => 'NE']);
```

### Get Player Stats and News
**Description:** Retrieves the Player resource for the requested player id.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1129).

#### Resource Name
> Player

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Player(['PlayerID' => '10974']);
```

### Get Free Agents
**Description:** Retrieves a list of Player objects for the current Free Agents.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1130).

#### Resource Name
> FreeAgents

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->FreeAgents([]);
```

### Get Players Game Stats by Team for Season for Week
**Description:** Retrieves PlayerGame resources for the reuqested season, team and week.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1131).

#### Resource Name
> PlayerGameStatsByTeam

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->PlayerGameStatsByTeam(['Season' => '2013REG', 'Week' => '17', 'Team' => 'NE']);
```

### Get Players Season Stats by Team
**Description:** Retrieves PlayerSeason resources for the requested season and team.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1132).

#### Resource Name
> PlayerSeasonStatsByTeam

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->PlayerSeasonStatsByTeam(['Season' => '2013REG', 'Team' => 'NE']);
```

### Get Players Game Stats for Season for Week
**Description:** Retrieves PlayerGame resource for the requested season, team and player id

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1133).

#### Resource Name
> PlayerGameStatsByPlayerID

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->PlayerGameStatsByPlayerID(['Season' => '2013REG', 'Team' => 'NE', 'PlayerID' => '10974']);
```

### Get Players Season Stats
**Description:** Retrieves the PlayerSeason resource for the requested player.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1134).

#### Resource Name
> PlayerGameStatsByPlayerID

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->PlayerGameStatsByPlayerID(['Season' => '2013REG', 'PlayerID' => '10974']);
```

### Get Season League Leaders
**Description:** Retrieves PlayerSeason objects for the league leaders based on position and sort type.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1135).

#### Resource Name
> SeasonLeagueLeaders

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->SeasonLeagueLeaders(['Season' => '2013REG', 'Position' => 'WR', 'Column' => 'FantasyPoints']);
```

### Get Game League Leaders
**Description:** Retrieves PlayerGame objects for the league leaders based on position and sort type.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1136).

#### Resource Name
> GameLeagueLeaders

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->GameLeagueLeaders(['Season' => '2013REG', 'Week' => '17', 'Position' => 'WR', 'Column' => 'FantasyPoints']);
```

### Get Fantasy Defense By Game
**Description:** Retrieves FantasyDefenseGame resources based on season and week.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1137).

#### Resource Name
> FantasyDefenseByGame

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->FantasyDefenseByGame(['Season' => '2013REG', 'Week' => '17']);
```

### Get Fantasy Defense By Season
**Description:** Retrieves FantasyDefenseSeason resoruces based on season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1138).

#### Resource Name
> FantasyDefenseBySeason

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->FantasyDefenseBySeason(['Season' => '2013REG']);
```

### Get Injuries for Season for Week
**Description:** Retrieves Injuries resources for season, and week, or season, week, and team.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1139).

#### Resource Name
> Injuries

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->Injuries(['Season' => '2013REG', 'Week' => '17']);
```

```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->Injuries(['Season' => '2013REG', 'Week' => '17', 'Team' => 'NE']);
```

### Get News
**Description:** Retrieves the current/active News resources.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1141).

#### Resource Name
> News

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->News([]);
```

### Get News for Player
**Description:** Retrieves the current/active News resoruces for the requested player.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1142).

#### Resource Name
> NewsByPlayerID

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->NewsByPlayerID(['PlayerID' => '10974']);
```

### Get News for Team
**Description:** Retrieves the current/active News resoruces for the requested team.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1143).

#### Resource Name
> NewsByTeam

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->NewsByTeam(['Team' => 'NE']);
```

### Get Box Score
**Description:** Retrieves the BoxScore resource for the requested Season, Week, and Team

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1144).

#### Resource Name
> BoxScore

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->BoxScore(['Season' => '2013REG', 'Week' => '17', 'Team' => 'NE']);
```

### Get Live Box Scores
**Description:** DESCRIPTION

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1145).

#### Resource Name
> LiveBoxScores

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->LiveBoxScores([]);
```

### Get Players Game Stats for Season for Week
**Description:** Retrieve PlayerGame resources for Season and Week.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1146).

#### Resource Name
> PlayerGameStatsByWeek

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->PlayerGameStatsByWeek(['Season' => '2013REG', 'Week' => '17']);
```

### Get Game Stats for Season
**Description:** Retrieve Game resources for requested season.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1978).

#### Resource Name
> GameStats

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->GameStats(['Season' => '2013REG']);
```

### Get Game Stats for Season for Week
**Description:** Retrieve Game resources for requested season and week.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#1979).

#### Resource Name
> GameStatsByWeek

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->GameStatsByWeek(['Season' => '2013REG', 'Week' => '17']);
```

### Get Timeframes
**Description:** Retrieve detailed information about past, present, and future
timeframes. A timeframe is a representation of the state of the NFL for the
timeframe requested.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#2117).

#### Resource Name
> Timeframes

###### Example usage
```php
  $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
  $result = $client->Timeframes(['Type' => Timeframes\Type::KEY_CURRENT]);
```

### Get Final Box Scores
**Description:** DESCRIPTION

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#2180).

#### Resource Name
> FinalBoxScores

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->FinalBoxScores([]);
```

### Get Active Box Scores
**Description:** DESCRIPTION

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#2223).

#### Resource Name
> ActiveBoxScores

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->ActiveBoxScores([]);
```

### Get Box Scores for Season for Week
**Description:** Retrieves BoxScore resources for season and week.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#2224).

#### Resource Name
> BoxScores

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->BoxScores(['Season' => '2013REG', 'Week' => '17']);
```

### Get Stadiums
**Description:** Retrieves Stadium resources for the NFL.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#2225).

#### Resource Name
> Stadiums

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->Stadiums([]);
```

### Get Projected Players Game Stats by Season, Week, and Team
**Description:** Retrieves projected PlayerGame resources for season, week, and team.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#3300).

#### Resource Name
> PlayerGameProjectionStatsByTeam

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->PlayerGameProjectionStatsByTeam(['Season' => '2013REG', 'Week' => '17', 'Team' => 'NE']);
```

### Gets Fantasy Players with ADP
**Description:** Retrieves active/current FantasyPlayers resources.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#3303).

#### Resource Name
> FantasyPlayers

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->FantasyPlayers([]);
```

### Get Projected Fantasy Defense Stats By Season and Week
**Description:** Retrieves projected FantasyDefenseGame resources for season and week.

For more information, see the [Developer Documentation](https://developer.fantasydata.com/docs/services/299#3304).

#### Resource Name
> FantasyDefenseProjectionsByGame

###### Example usage
```php
   $client = new FantasyDataAPI\Client( "Your FantasyData API key" );
   $result = $client->FantasyDefenseProjectionsByGame(['Season' => '2013REG', 'Week' => '17']);
```
