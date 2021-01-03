PHP Application with Composer
=============================

A photo sharing application. 

The basics are ready. Working on the database and researching which one to implement.

The `composer` is a PHP executable. 
All that is needed is a PHP executable to run `composer`.

```
sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_2.0.7.phar --version
```

Installing Thirdparty modules

```
sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_2.0.7.phar require monolog/monolog
``` 

### Must

Run this
```
sudo /Applications/MAMP/bin/php/php7.3.8/bin/php composer_2.0.7.phar dump-autoload
```

This is the final step to re-generate the Autoload scripts correctly.


### Done with

 - [composer][1] 
 - SQLite is tested


### Thanks

File upload is done with [this tutorial][2].









[1]: https://getcomposer.org/
[2]: https://www.taniarascia.com/how-to-upload-files-to-a-server-with-plain-javascript-and-php/