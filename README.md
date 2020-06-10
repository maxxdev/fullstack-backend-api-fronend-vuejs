#  Laravel Backend API. VueJS frontend SPA
## Brief
Backend and frontend application that consumes a 200-article JSON feed, implements simple database search querying, and displays a (at minimum, barebones) website with basic category and search filtering.

What would be nice to have:
* Unit tests
* Migrations
* Full docblock comments
* PHP 7.4 usage


## JSON Feed
Although quite verbose, the following fields are of importance (the rest can be ignored or consumed if desired):

* `title` – The title of the article
* `slug` – The unique id of the article
* `content` – This contains the main body of the article. In the provided feed only one array item exists which contains a html body.
* `categories` – Shows the categories associated to the article. primary being the single primary category, and additional being a 0-n list of additional categories. If an article does not have a primary category, use the first additional category.
* `media` – Associated media for the article. The featured type (which may not exist) should appear at the top of the article. If it does not exist, show a placeholder.

