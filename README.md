# Touko The Politician

Custom Wordpress-theme for toukoaalto.fi -site

## Work in progress
* If you spot a bug, please tell about it -> jannejuhani@gmail.com :)

### TODO
* Lot of things...
* (Mobile) optimization is most urgent
* Error handling
* Code optimization
* Documentation
* Admin panel styles
* Add http://owlgraphic.com/owlcarousel/ or something similar
* Add http://socialitejs.com/
* Add http://salvattore.com/ or something similar
* Add support to external rss feeds (in admin panel)
  * Add rss url
  * Add keyword (for example author)
    * Scrape data by keyword
  * Feeds to add:
    * http://www.vihreat.fi/vihreablogi/rss
    * http://toukoalto.puheenvuoro.uusisuomi.fi/feed/blog
    * http://www.city.fi/blogit/10/feed

## Uses / needs / likes
* At the moment some stuff from [Travelify-theme by Color Awesomeness](http://colorawesomeness.com/themes/travelify/)
  * This is going to be "parent-theme" but at the moment it needs travelify as template
  * I'm going to replace all the dependencies in the future

### "Newsfeed"
* TODO:
  * Cache (~15min)
    * Done to Facebook-page, Twitter-page and Tweets

#### [Facebook-php-sdk](https://github.com/facebook/facebook-php-sdk)
* Support to:
  * Facebook-page (like box)
  * Facebook-page posts
* TODO:
  * [Real time updates](https://developers.facebook.com/docs/graph-api/real-time-updates)

#### [Twitter-api-php](https://github.com/J7mbo/twitter-api-php)
* Support to:
  * Twitter follow box
  * Tweets from user timeline

#### [Instagram-PHP-API](https://github.com/cosenary/Instagram-PHP-API)
* Support to:
  * User photofeed

### Social media links
* Facebook
* Twitter
* RSS
* "Donate button"

### [Fontello](http://fontello.com/)


### Plugins in use
* [Google Calendar Events](http://wordpress.org/extend/plugins/google-calendar-events/)
  * This is used for now. I include this functionality in to the theme later (maybe)...

## Grunt
There's very basic grunt-file which have:

* watch for "src/"-files (.js and .styl)
* Stylus
* js-uglify

### Usage
Install npm-packages ([Node Package Manager](https://npmjs.org/) needs to be installed in your system)
```
npm install
```

While development (watch)
```
grunt
```

When you want production version of .js and .css -files
```
grunt build
```