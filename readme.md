# TSW Login-Register

## Overview
* PHP, HTML5, Twitter Bootstrap, jQuery
* Creates three SESSIONs to use for retrieving data
* PDO prepared statements 
* Using MySQL - sql table included
* Checks for duplicate email on registry
* Inserts MD5 password
* Password confirmation (enter twice)
* Great start for any medium to small size membership program
* Easily adaptable to about any PHP script 
* Bootstrap HTML5 forms and pages
* Forgot password and Reset password
* Register and confirm registry through email
* No Salt no Hash... TODO
* several security functions and sanitizers
* all fields are preset jquery or html5 validate


## Code Example
```
    // check database for duplicate email
    $query = $dbh->prepare("SELECT email FROM tsw_members
                            WHERE email = :email 
                               "); 
    $query->bindValue(':email', $email);
    $query->execute();
    if($query->rowCount() > 0)
    {
        esc("<p>This email has already been registered.</p>");
```
## Motivation
I had troubles with some open source reigistration and login scripts being either too complex or not secure enough. This is my final answer to a secure enough system which can be used for small to medium size membership login systems. I wanted to have the usage generalized enough that it could be adapted to about any PHP project that I work on.

## Installation
Very basic PHP Apache Server, LAMP style install:
* create a database or just add the one table to an existing database
   * the table is in the `inc` directory; file named `sql.txt`
* add files where needed into directory structure
* add settings in file `inc/settings.php` and connection in `inc/dbh.php`
* send donation to Larry... lol :-)

Also note install can be uploaded and ran as a standalone Website (albeit Bootstrap theme-able). 
demo: http://tradesouthwest.com/dev/tswlogin/login.php

## Contributors
Open for contributions. 

## License
Licensed under Apache Open Source. You can use this script for free for any private or commercial projects.
http://www.apache.org/licenses/LICENSE-2.0

