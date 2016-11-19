<?php

namespace Alc\SitemapCrawler\Test;

use Alc\SitemapCrawler;

class SitemapCrawlerTest extends \PHPUnit_Framework_TestCase {

    public function test() {

		$crawler = new SitemapCrawler();

		$data = $crawler->crawl('http://pastebin.com/raw/P9pp5fBA');

		$url = current($data);

        $this->assertEquals( $url->getUrl(), 'http://www.example.com/english/' );
        $this->assertEquals( $url->getAlternateLinks(), array(
        	'de' => 'http://www.example.com/deutsch/',
        	'de-ch' => 'http://www.example.com/schweiz-deutsch/',
        	'en' => 'http://www.example.com/english/',
        ));
    }
}
