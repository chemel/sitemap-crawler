#!/usr/bin/php
<?php

require __DIR__.'/vendor/autoload.php';

use Alc\SitemapCrawler;

$crawler = new SitemapCrawler();

$sitemapUrls = $crawler->crawl($argv[1]);

foreach($sitemapUrls as $url) {

	echo $url, "\n";

	foreach( $url->getAlternateLinks() as $alt ) {

		echo $alt, "\n";
	}
}
