var chai = require('chai');
var Garden = require(require.resolve('plus.garden')).Garden;
var garden = new Garden().init();

var World = function World(callback) {
  this.api = garden.get('ApiTester');
  this.garden = garden;
  this.expect = chai.expect;

  this.config = garden.get('config');

  var gardenConfig = require(garden.dir + '/' + this.config.configName + '.json');

  garden.get('Webdriver.Browser').create(function(browserService) {
    this.browserService = browserService;
    this.driver = browserService.driver;
    this.browser = browserService.browser;
    this.proxy = browserService.proxy;
    callback();
  }.bind(this));
};

exports.World = World;
