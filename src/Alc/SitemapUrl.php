<?php

namespace Alc;

class SitemapUrl {

	private $url;
	private $alternateLinks = array();

	/**
	 * setUrl
	 *
	 * @param string url
	 */
	public function setUrl($url) {

		$this->url = $url;
	}

	/**
	 * getUrl
	 *
	 * @return string url
	 */
	public function getUrl() {

		return $this->url;
	}

	/**
	 * addAlternateLinks
	 *
	 * @param string lang
	 * @param string url
	 */
	public function addAlternateLinks($lang, $url) {

		$this->alternateLinks[$lang] = $url;
	}

	/**
	 * getAlternateLinks
	 *
	 * @return array<lang, url> alternateLinks
	 */
	public function getAlternateLinks() {

		return $this->alternateLinks;
	}

	/**
	 * __toString
	 *
	 * @return string url
	 */
	public function __toString() {

		return $this->getUrl();
	}
}
