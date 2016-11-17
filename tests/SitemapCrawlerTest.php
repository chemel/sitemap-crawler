<?php

require __DIR__.'/../vendor/autoload.php';

use Alc\SitemapCrawler;

$crawler = new SitemapCrawler();

$data = $crawler->crawl('http://blog.chemel.fr/sitemap.xml');

print_r($data);
