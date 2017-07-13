module.exports = function() {
  this.When(/^I make GET request to "([^"]*)"$/, function(url, callback) {
    this.api.get(url).then(callback);
  });

  this.Then(/^the JSON response should be:$/, function(string, callback) {
    this.api.assertJSON(JSON.parse(string)).then(callback);
  });

  this.Then(/^(?:T|t)he status code should be (\d+)$/, function(statusCode, callback) {
    this.api.assertStatus(statusCode).then(callback);
  });

  this.Then(/^I should see (\d+) items$/, function(count, callback) {
    this.api.assertJSONLength(".", count).then(callback);
  });
};
