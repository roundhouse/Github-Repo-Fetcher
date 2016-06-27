<?php
namespace Craft;

class GithubRepoFetcherVariable
{
  // Get Single Repo
  public function getRepo($repoField, $repoName)
  { 
    return craft()->githubRepoFetcher->getRepo($repoField, $repoName);
  }

  // Get All Repos
  public function getRepos($settings)
  { 
    return craft()->githubRepoFetcher->getRepos($settings);
  }
}
