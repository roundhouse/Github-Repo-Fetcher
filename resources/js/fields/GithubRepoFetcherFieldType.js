(function($, window, document) {
  var Plugin, defaults, pluginName;
  pluginName = 'GithubRepoFetcherFieldType';
  defaults = {};
  Plugin = function(element, options) {
    this.element = element;
    this.options = $.extend({}, defaults, options);
    this._defaults = defaults;
    this._name = pluginName;
    this.init();
  };
  Plugin.prototype = {
    init: function(id) {
      var _this;
      _this = this;
      return $(function() {
        var getRepoJson, isEmpty, repoName, settings;
        isEmpty = function(obj) {
          var prop;
          for (prop in obj) {
            if (obj.hasOwnProperty(prop)) {
              return false;
            }
          }
          return true && JSON.stringify(obj) === JSON.stringify({});
        };
        getRepoJson = function(settings, repoName) {
          var token;
          token = '?client_id=' + settings.clientId + 'client_secret=' + settings.clientSecret;
          return $.getJSON('https://api.github.com/repos/roundhouse/' + repoName + token, function(data) {
            var $field, $repoUrl, $spinner;
            $field = $('#fields-' + _this.options.id + '-field');
            $spinner = $field.find('.spinner');
            $spinner.addClass('hidden');
            $repoUrl = '<a href="' + data.html_url + '" target="_blank">' + data.name + '</a>';
            $field.find('.repo-stars').html(data.stargazers_count + ' stars');
            $field.find('.repo-issues').html(data.open_issues + ' issues');
            $field.find('.repo-forks').html(data.forks_count + ' forks');
            $field.find('.repo-name .text').html($repoUrl);
            $field.find('.repo-description .text').html(data.description);
            return $field.find('.repo-information').slideDown();
          });
        };
        $('#fields-' + _this.options.id + '-field').find('.spinner').removeClass('hidden');
        repoName = _this.options.value;
        settings = _this.options.settings;
        if (!isEmpty(repoName)) {
          getRepoJson(settings, repoName);
        } else {
          $('#fields-' + _this.options.id + '-field').find('.spinner').addClass('hidden');
        }
        return $('#fields-' + _this.options.id).on('change', function(e) {
          var valueSelected;
          valueSelected = this.value;
          return getRepoJson(settings, valueSelected);
        });
      });
    }
  };
  $.fn[pluginName] = function(options) {
    return this.each(function() {
      if (!$.data(this, 'plugin_' + pluginName)) {
        return $.data(this, 'plugin_' + pluginName, new Plugin(this, options));
      }
    });
  };
})(jQuery, window, document);
