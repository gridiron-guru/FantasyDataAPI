# FantasyData API
This document focusses on all of the required information surrounding how to use
this libary, including how to get an API key, the resources provided by the service,
and specific ENUMs required to access array elements. If you are looking for
specific examples of how to use the library itself, please see the
[Client Documentation](CLIENTS.md).

## About FantasyData.com
While this document primarily focusses on documentation and details related to how to use
this libary and the corresponding service, I wanted to add a brief description about
[FantasyData.com](http://www.fantasydata.com/) from their website as well.

> Whether you’re a fantasy football professional, web developer, mobile developer, or simply a football fan who crunches numbers, FantasyData.com stands ready to provide you with top-notch NFL statistical data at the best rates in the business.

> Our product offerings range from a variety of easy-to-implement API solutions to high-quality, regularly updated web services and database downloads, as well as historical team and fantasy database downloads in multiple formats.

> If you’re hunting for comprehensive pro football data or real time data feeds, chances are, you’ll find what you’re looking for on FantasyData.com—but if you browse the site and still have questions, no worries! Feel free to [contact us](http://fantasydata.com/company/contact-us.aspx); we’ve been providing excellent service to our customers since 2007!
-- <cite>FantasyData.com</cite>

## <a name="api-key"></a>API Key
In order to use this library, the very first step will be to acquire an API key. There
are multiple options, so it's best to look at the pricing model. If you're just starting
out, it's likely best to start with a free trial or a developer key.

Visit the [FantasyData developer site](http://developer.fantasydata.com) and click Sign
Up to create a new account if you don't already have one.

Once you have an account, you will need to get your key. Sign in to [FantasyData](http://developer.fantasydata.com/)
and visit the [developer page](http://developer.fantasydata.com/developer/). On the top
left of the page you will see your key. Click "Show Key" and copy that key. You'll need
that whenever creating a client. For details on how to create a client, visit the
[Client Documentation](CLIENTS.md).

## <a name="resources"></a>Resources
The Service itself provides a number of Resources. Below you will find links to the
service documentation as well as a description of each Resource that we have implemented
from the service in the [Client Documentation](CLIENTS.md#resources).

If you wish to look through all of the documentation for the service, visit the
[API Documentation](http://developer.fantasydata.com/api-documentation).

* [AreAnyGamesInProgress](CLIENTS.md#check-if-games-in-progress)
* [Teams](CLIENTS.md#get-teams-for-season)
* [Schedules](CLIENTS.md#get-schedules-for-season)
* [Byes](CLIENTS.md#get-bye-week-for-season)
* [Scores](CLIENTS.md#get-bye-week-for-season)
* [ScoresByWeek](CLIENTS.md#get-game-scores-for-season)
* [TeamSeasonStats](CLIENTS.md#get-scores-for-season-and-week)
* [Timeframes](CLIENTS.md#timeframes)
* ... more to come as implemented!

## <a name="enums"></a>Enums
This library contains a collection of ENUM classes that definte PHP Class constants for
accessing the results returned from the various service resources.

Below is a list of the Service Enums that have been added to the library.

* Byes Resource
    * [Byes Property List](/module/FantasyDataAPI/Enum/Byes/Property.php)
* Schedule Resource
    * [Schedule Property List](/module/FantasyDataAPI/Enum/Schedule/Property.php)
* Score Resource
    * [Score Property List](/module/FantasyDataAPI/Enum/Score/Property.php)
* Stadium Resource
    * [Stadium Property List](/module/FantasyDataAPI/Enum/Stadium/Property.php)
* Team Resource
    * [Stadium Property List](/module/FantasyDataAPI/Enum/Stadium/Property.php)
    * [Teams Property List](/module/FantasyDataAPI/Enum/Teams/Property.php)
* TeamSeasonStats Resource
    * [Property List](/module/FantasyDataAPI/Enum/TeamSeasonStats/Property.php)
* Timeframes Resource
    * [Type Parameter](/module/FantasyDataAPI/Enum/Timeframes/Type.php)
    * [Property List](/module/FantasyDataAPI/Enum/Timeframes/Property.php)

The only Enum not related to resources is the Subscription Enums which is used by
the Client constructor.

* [Subscription Enums](/module/FantasyDataAPI/Enum/Subscription.php)

The enums themselves are derived from the service, and the original values are documented
on the FantasyData site in their [Data Dictionary](http://fantasydata.com/resources/data-dictionary.aspx).

The dictionary not only contains the keys to the various data elements, but also a
description of what those elements are, which can be quite handy.

## <a name="support"></a>Support & FAQ

https://developer.fantasydata.com/issues
http://fantasydata.com/resources/faq.aspx