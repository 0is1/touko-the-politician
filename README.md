# Touko The Politician

Custom Wordpress-theme for toukoaalto.fi -site

## Work in progress
* If you spot a bug, please tell about it -> jannejuhani@gmail.com :)

### TODO (lots of things...)
* (Mobile) optimization
* Error handling
  * Especially with newsfeed
* Code optimization
  * Facebook/Twitter in particular
  * Minimize the number of .js- and .css -files
* Theme documentation
* Admin panel styles
* Add [http://owlgraphic.com/owlcarousel/](http://owlgraphic.com/owlcarousel/) or something similar
  * In other words: replace the slider functionality from Travelify parent-theme
* Add [Disqus](https://disqus.com/admin/wordpress/) or something similar to enable comments
* Add support to external rss feeds (in admin panel)
  * __Add rss url (done)__
  * Add keyword (for example author) (TODO)
    * Scrape data by keyword
  * Feeds to add:
    * http://www.vihreat.fi/vihreablogi/rss
    * http://toukoalto.puheenvuoro.uusisuomi.fi/feed/blog (done)
    * http://www.city.fi/blogit/10/feed
* wp_deregister_style();
  * travelify-theme style (until parent theme is removed)
    * add all styles to touko-the-politician -theme css
* Social media related stuff
  * Shorten tweet texts if it's going to be more than 140 chars
  * Instagram apiCallback-URI should be dynamic
  * Add possibility to add Instagram link/icon in admin panel
  * Update theme to use newer version of: https://github.com/cosenary/Instagram-PHP-API
  * Update theme to use new version of: https://github.com/facebook/facebook-php-sdk-v4

## Uses / needs / likes
* At the moment parent them is [Travelify-theme by Color Awesomeness](https://github.com/puikinsh/travelify)

#### [Facebook-php-sdk](https://github.com/facebook/facebook-php-sdk)
* Support to:
  * Facebook-page (like box)
  * Facebook-page posts
* TODO:
  * Posts number set in admin panel should correspond the total posts shown in home page
  * [Real time updates](https://developers.facebook.com/docs/graph-api/real-time-updates)

#### [Twitter-api-php](https://github.com/J7mbo/twitter-api-php)
* Support to:
  * Twitter follow box
  * Tweets from user timeline

#### [Instagram-PHP-API](https://github.com/cosenary/Instagram-PHP-API)
* Support to:
  * User photofeed
* TODO:
  * process text and add #hashtag / @user -links
  * make square instagram elements, big image to bg and text on the image

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
Install npm-packages ([Node.js](https://nodejs.org/) needs to be installed in your system)
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
