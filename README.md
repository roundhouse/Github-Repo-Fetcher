# Github Repo Fetcher Plugin for Craft CMS

Fetches Github repo object to be used on front end for things like download url, star count, issue count, etc.

## Usage

Create a new custom field `Github Repo Fetcher`, add required info

*	Github Username
*	Client ID
*	Client Secret

You can [go here](https://github.com/settings/developers "Developer Applications") to create github application and get your Client ID and Client Secret.

After you completed above and added your new field to an entry type add this to your front-end templates. 

*	`{% set repoField = craft.fields.getFieldByHandle('handlename') %}`
	* Put in your own field's handle name. This gets us the field object. Next we need to fetch the repo
*	`{% set githubRepo = craft.githubRepoFetcher.getRepo(repoField, entry.handlename) %}`
	* Here we are fetching the actual repo data. You need to pass 2 things to the `getRepo` function. First the `repoField` that we set earlier and second you need to entery the handlename again. (note: if you are on an entry page you need to add `entry.` before handlename or whatever value you have for the loop)


## Available Options

What you can get from a repo entry. Example: `githubRepo.description` (whatever you set as your repo variable)

*	id
*	name
*	url
*	description
*	size
*	language
*	starsCount
*	watchersCount
*	forksCount
*	hasIssues - **bool**
*	openIssuesCount
*	createdAt
*	gitUrl
*	cloneUrl

-
## Github Repo Fetcher Changelog

### 0.0.1 -- 2016.06.27

* Initial release


