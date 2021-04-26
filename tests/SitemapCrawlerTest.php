<?php

require __DIR__.'/../vendor/autoload.php';

use Alc\SitemapCrawler;

$crawler = new SitemapCrawler();

$data = $crawler->crawl('https://chemel.blog/sitemap.xml');

// alternate links test
// $data = $crawler->crawl('http://pastebin.com/raw/P9pp5fBA');

print_r($data);
