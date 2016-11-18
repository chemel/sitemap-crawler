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
	 * parse
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

		$nodes = $parser->find('url');

		if( !empty($nodes) ) {

			foreach( $nodes as $node ) {

				$loc = $node->find('loc', 0);

				if( !isset($this->urls[$loc->innertext]) ) {

					$url = new SitemapUrl();

					// Set url
					$url->setUrl($loc->innertext);

					// Find alternate links
					$alternateLinks = $node->find('xhtml:link[rel=alternate]');

					foreach($alternateLinks as $alternateLink) {

						$url->addAlternateLinks($alternateLink->getAttribute('hreflang'), $alternateLink->getAttribute('href'));
					}

					// Push in array
					$this->urls[$url->getUrl()] = $url;
				}
			}
		}

		$helper->clear();
	}
}