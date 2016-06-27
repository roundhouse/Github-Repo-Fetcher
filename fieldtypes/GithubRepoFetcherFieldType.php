<?php
/**
 * Github Repo Fetcher plugin for Craft CMS
 *
 * GithubRepoFetcher FieldType
 *
 * @author    Vadim Goncharov
 * @copyright Copyright (c) 2016 Vadim Goncharov
 * @link      http://roundhouseagency.com
 * @package   GithubRepoFetcher
 * @since     0.0.1
 */

namespace Craft;

class GithubRepoFetcherFieldType extends BaseFieldType
{
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
    public function defineContentAttribute()
    {
      return AttributeType::Mixed;
    }

    /**
     * @param string $name
     * @param mixed  $value
     * @return string
     */
    public function getInputHtml($name, $value)
    {
      if (!$value) {
        $value = new GithubRepoFetcherModel();
      }

      $id = craft()->templates->formatInputId($name);
      $namespacedId = craft()->templates->namespaceInputId($id);
      $settings = $this->getSettings();

      craft()->templates->includeCssResource('githubrepofetcher/css/fields/GithubRepoFetcherFieldType.css');
      craft()->templates->includeJsResource('githubrepofetcher/js/fields/GithubRepoFetcherFieldType.js');

      $jsonSettings = [
        'githubUser' => $settings->githubUser,
        'clientId' => $settings->clientId,
        'clientSecret' => $settings->clientSecret
      ];

      $jsonVars = array(
        'id' => $id,
        'name' => $name,
        'namespace' => $namespacedId,
        'value' => $value,
        'settings' => $jsonSettings,
        'prefix' => craft()->templates->namespaceInputId(""),
      );

      $jsonVars = json_encode($jsonVars);
      craft()->templates->includeJs("$('#{$namespacedId}').GithubRepoFetcherFieldType(" . $jsonVars . ");");

      $variables = array(
        'id' => $id,
        'name' => $name,
        'namespaceId' => $namespacedId,
        'value' => $value,
        'settings' => $settings
      );

      return craft()->templates->render('githubrepofetcher/fields/GithubRepoFetcherFieldType.twig', $variables);
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function prepValueFromPost($value)
    {
      return $value;
    }

    /**
     * @param mixed $value
     * @return mixed
     */
    public function prepValue($value)
    {
      return $value;
    }

    protected function defineSettings()
    {
      return array(
        'githubUser' => AttributeType::String,
        'clientId' => AttributeType::String,
        'clientSecret' => AttributeType::String
      );
    }

    public function getSettingsHtml()
    {
      return craft()->templates->render('githubrepofetcher/fields/settings', array(
        'settings' => $this->getSettings()
      ));
    }

    public function prepSettings($settings)
    {
      // Modify $settings here...
      return $settings;
    }
}