<?php

namespace Alc;

use Alc\Curl\Curl;
use Alc\HtmlDomParserHelper;

class SitemapCrawler {

	protected $sitemaps = array();

	protected $urls = array();

	/**
	 * crawl
	 *
	 * @param string url
	 * @return array urls
	 */
	public function crawl( $url ) {

		$this->parse($url);

		while( $url = array_shift($this->sitemaps) ) {

			$this->parse($url);
		}

		return $this->urls;
	}

	/**
	 * url
	 *
	 * @param string url
	 */
	protected function parse( $url ) {

		$helper = new HtmlDomParserHelper();
		$parser = $helper->parse($url);

		$nodes = $parser->find('sitemap loc');

		if( !empty($nodes) ) {

			foreach( $nodes as $node ) {

				$this->sitemaps[] = $node->innertext;
			}
		}

		$nodes = $parser->find('url loc');

		if( !empty($nodes) ) {

			foreach( $nodes as $node ) {

				if( !in_array($node->innertext, $this->urls) )
					$this->urls[] = $node->innertext;
			}
		}

		$helper->clear();
	}
}