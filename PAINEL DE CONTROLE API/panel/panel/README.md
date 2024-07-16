## Readme is WIP while I compile all the shit I've made for free-use

Free for anyone to use, this is the middleware used for handling casino games in general. This is admin panel for the middleware/actual API itself - which in turn should contact your internal API where you actually handle game results and what not. 

You should check code thoroughly, as I'm not sure if this was the latest version for when it was used - make sure to manually import database to mysql/mariadb, there is support for mongoDB.

## Screenshots

<img src="https://github.com/ryan-gate-2/scriptjes/blob/main/portfolio/panel/Screenshot%20from%202022-06-13%2021-54-32.png?raw=true">

Check for more screenshots at https://gitlab.com/ivanmontikfan/ryan-personal-notes/-/tree/main/portfolio/panel


## MongoDB/Multi Database support

The API basically is writing the game transactions as they happen in a seperate table/database for it be processed afterwards in queue system for actual GGR payment from the operator user, so what I did was write the actual middleware (unprocessed) in mongoDB then have the helper that runs every 1 minute from the admin environment simply copy it in a mysql/relational database for archiving/review/ggr process purposes.

MongoDB has much much more room for errors as it is pretty much writing json as it happens, instead of filling per field. 

## SMS Login

Admin area supports SMS login, which at the time I considered as one of most safe ways to process 2fa (this opinion turned out diff hehe @Softswiss eSIM).

## Error Handling

There is an extensive error handler, which can be turned on per operator specifically also by operator themselves, after which for 10 minutes (at a time) the operator can review all game transactions as they happen live in special area within admin area.

There is error/warning level system, depending on level specific actions are taken, such as closing down automatically of operator's API access and notifying them and you per text msg & telegram & email.

## Automatic GGR

You can set interval for operator to be charged within the admin area, you can fill in amount of days for a cycle. Operator can ofcourse at anytime check & review his current GGR costs.

Invoices are automatically generated and sent per notification to you and to the operator. There is support to work on a balance level, also to protect mainly yourself but also operator you can set various levels to warn operator of high GGR (for example hacked site sor whatever can incur this) and also an amount at which the operator access gets closed down.

## Currency

In theory all currencies are available, there is a pretty straightforward currency module where you can add in any currency/currency API. All is displayed both in the played currency and the value of currency in USD$ (AT THE TIME OF THE GAME). 
Currency prices are updated every 15 minute, there are some straight forward protectional stuff against that, for instance currency can not drop or go higher for X% (I believe I set it to 30%).

You can edit this all in the console commands area.

## Index Rating

You can assign providers & games resources index rating and create (based on popularity and fudge factor) automatically favorable 'ordered' game lists, so that you can create the most efficient order of games to be presented on API to client semi-automatically by important factors.

It's extremely important and it is far from finished (in my opinion) as maybe 95%~ of gameplay was on the top 100 (in listing) out of total of 7000 games, hence why I tried focus a lot on this 'gamelist generator' as perfecting this can squeeze out so much more $$.
 
Factors: popularity (toggleable) based on net win/loss, fudge factor (set this to "15" to start with) so the game lists generated do look natural (so actually different providers & games are shown instead of all of pragmatic's games f.e. at the top of list), base rating to game in particular (individually) and the base rating of a provider as a whole. 

If not satisfied simply re-roll the generation few times then make manual editions, this works with "Access Profiles" so you can even make a specific custom gamelist order for a specific client (especially with global regional differences).

See for example (there is also options to upsert & change provider listings):

<img src="[https://github.com/ryan-gate-2/scriptjes/blob/main/portfolio/panel/Screenshot%20from%202022-06-13%2021-58-22.png?raw=true](https://raw.githubusercontent.com/ryan-gate-2/scriptjes/main/portfolio/panel/Screenshot%20from%202022-06-13%2021-57-02.png)">


## Access Profiles

You can create & make access profiles, basically it's a role system but you can select the currencies an 'profile' can access which in turn you can assign to specific operator API keys.

You can set some other things like:
	[*] max_hourly_demosessions
	[*] max_hourly_callback_errors
	[*] max_hourly_createsession_errors
	[*] branded (theming system for gamelauncher, toggle 0 or 1 to disable/enable)
	[*] branded_launcher_baseurl (base url to the actual gamelauncher itself, you can find more at other git, this can also be handy if you wish to illegal games so you can set the gamelauncher/iframe really easy per operator seperated from your legitimate business)

But also things as setting price ranges for your clients and what not, make selective criteria on who's to go where.

## Game Tracking & Logging

Extensive tracking of game sessions, for example origin place and also it tracks player individually so you can easily create patterns and/or adapt and change which games to display to each player.

Also includes general stuff using browser detection. This can be handy again if you wish to put illegal games or on contrary want to protect your games/providers from illegal gambling areas more indepth.

"{"visit_2":{"host":"launch.slotts.io","referrer":0,"browserdetect-device":"desktop","browserdetect-os":"Chrome 100.0.4896","browserdetect-devicefamily":"Unknown","browserdetect-devicegrade":"","browserdetect-browser":"Chrome 100.0.4896","user-agent":"Mozilla\/5.0 (X11; Linux x86_64) AppleWebKit\/537.36 (KHTML, like Gecko) Chrome\/100.0.4896.88 Safari\/537.36"}}"
