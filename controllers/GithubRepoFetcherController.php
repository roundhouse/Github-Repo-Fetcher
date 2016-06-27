<?php
/**
 * Github Repo Fetcher plugin for Craft CMS
 *
 * GithubRepoFetcher Controller
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://roundhouseagency.com
 * @package   GithubRepoFetcher
 * @since     0.0.1
 */

namespace Craft;

class GithubRepoFetcherController extends BaseController
{

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     * @access protected
     */
    protected $allowAnonymous = array('actionIndex',
        );

    /**
     */
    public function actionIndex()
    {
    }
}