# sitemap-crawler
Crawl sitemap.xml recursively and return collected urls as array

## Install

```bash
composer require alc/sitemap-crawler
```

## Usage

```php
require __DIR__.'/vendor/autoload.php';

use Alc\SitemapCrawler;

$crawler = new SitemapCrawler();

$data = $crawler->crawl('https://chemel.blog/sitemap.xml');

print_r($data);
```

## Usage in a terminal:

```bash
php crawl.php https://chemel.blog/sitemap.xml
```
