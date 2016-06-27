<?php
/**
 * Github Repo Fetcher plugin for Craft CMS
 *
 * GithubRepoFetcher Service
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://roundhouseagency.com
 * @package   GithubRepoFetcher
 * @since     0.0.1
 */

namespace Craft;

class GithubRepoFetcherService extends BaseApplicationComponent
{

  /**
  * Get Single Repo
   */
  public function getRepo($fieldName, $repoName)
  {
    $tonkens = '?client_id='.$fieldName->settings['clientId'].'&client_secret='.$fieldName->settings['clientSecret'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.github.com/repos/'.$fieldName->settings['githubUser'].'/'.$repoName).$tonkens;
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $output = curl_exec($ch);
    curl_close($ch); 
    $value = json_decode($output);

    $repos = [];
    $repos['id'] = $value->id;
    $repos['name'] = $value->name;
    $repos['url'] = $value->html_url;
    $repos['description'] = $value->description;
    $repos['size'] = $value->size;
    $repos['language'] = $value->language;
    $repos['starsCount'] = $value->stargazers_count;
    $repos['watchersCount'] = $value->watchers;
    $repos['forksCount'] = $value->forks;
    $repos['hasIssues'] = $value->has_issues;
    $repos['openIssuesCount'] = $value->open_issues;
    $repos['createdAt'] = $value->created_at;
    $repos['gitUrl'] = $value->git_url;
    $repos['cloneUrl'] = $value->clone_url;

    return $repos;
  }


  /**
  * Get All Repos
   */
  public function getRepos($settings)
  {
    $tonkens = '?client_id='.$settings['clientId'].'&client_secret='.$settings['clientSecret'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.github.com/users/".$settings['githubUser']."/repos".$tonkens);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
    $output = curl_exec($ch);
    curl_close($ch); 
    $obj = json_decode($output);

    $repos = [];
    foreach ($obj as $key => $value) {
      $repos[$key]['id'] = $value->id;
      $repos[$key]['name'] = $value->name;
      $repos[$key]['url'] = $value->html_url;
      $repos[$key]['description'] = $value->description;
      $repos[$key]['size'] = $value->size;
      $repos[$key]['language'] = $value->language;
      $repos[$key]['starsCount'] = $value->stargazers_count;
      $repos[$key]['watchersCount'] = $value->watchers;
      $repos[$key]['forksCount'] = $value->forks;
      $repos[$key]['hasIssues'] = $value->has_issues;
      $repos[$key]['openIssuesCount'] = $value->open_issues;
      $repos[$key]['createdAt'] = $value->created_at;
      $repos[$key]['gitUrl'] = $value->git_url;
      $repos[$key]['cloneUrl'] = $value->clone_url;
    }
    return $repos;
  }

}