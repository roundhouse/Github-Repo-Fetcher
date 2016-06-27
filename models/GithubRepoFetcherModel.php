<?php
/**
 * Github Repo Fetcher plugin for Craft CMS
 *
 * GithubRepoFetcher Model
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://roundhouseagency.com
 * @package   GithubRepoFetcher
 * @since     0.0.1
 */

namespace Craft;

class GithubRepoFetcherModel extends BaseModel
{
  /**
   * @return array
   */
  protected function defineAttributes()
  {
    return array_merge(parent::defineAttributes(), array(
      'githubRepo' => AttributeType::String,
      'applicationId' => AttributeType::String,
      'clientSecret' => AttributeType::String
    ));
  }

}