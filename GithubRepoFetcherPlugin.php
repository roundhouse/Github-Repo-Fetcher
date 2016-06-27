<?php
/**
 * Github Repo Fetcher plugin for Craft CMS
 *
 * Fetches Github repo object to be used on front end for things like download url, star count, issue count, etc.
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://roundhouseagency.com
 * @package   GithubRepoFetcher
 * @since     0.0.1
 */

namespace Craft;

class GithubRepoFetcherPlugin extends BasePlugin
{
  /**
   * @return mixed
   */
  public function init()
  {
    if (craft()->request->isCpRequest() && craft()->userSession->isLoggedIn()) 
    {
      // CP Only
    }
  }

  /**
   * @return mixed
   */
  public function getName()
  {
    return Craft::t('Github Repo Fetcher');
  }

  /**
   * @return mixed
   */
  public function getDescription()
  {
    return Craft::t('Fetches Github repo object to be used on front end for things like download url, star count, issue count, etc.');
  }

  /**
   * @return string
   */
  public function getDocumentationUrl()
  {
      return 'https://github.com/roundhouseagency/githubrepofetcher/blob/master/README.md';
  }

  /**
   * @return string
   */
  public function getReleaseFeedUrl()
  {
      return 'https://raw.githubusercontent.com/roundhouseagency/githubrepofetcher/master/releases.json';
  }

  /**
   * @return string
   */
  public function getVersion()
  {
      return '0.0.1';
  }

  /**
   * @return string
   */
  public function getSchemaVersion()
  {
      return '0.0.1';
  }

  /**
   * @return string
   */
  public function getDeveloper()
  {
      return 'Vadim Goncharov';
  }

  /**
   * @return string
   */
  public function getDeveloperUrl()
  {
      return 'http://roundhouseagency.com';
  }

  /**
   * @return bool
   */
  public function hasCpSection()
  {
      return false;
  }

  /**
   */
  public function onBeforeInstall()
  {
  }

  /**
   */
  public function onAfterInstall()
  {
  }

  /**
   */
  public function onBeforeUninstall()
  {
  }

  /**
   */
  public function onAfterUninstall()
  {
  }
}