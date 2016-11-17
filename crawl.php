#!/usr/bin/php
<?php

require __DIR__.'/vendor/autoload.php';

use Alc\SitemapCrawler;

$crawler = new SitemapCrawler();

$data = $crawler->crawl($argv[1]);

foreach($data as $row) {

	echo $row, "\n";
}
