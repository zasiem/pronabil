var express = require('express');
var router = express.Router();

var connection = require('../context/connection');
var response = require('../context/baseResponse');

// GET Vendors listing
router.get('/', function(req, res, next){
  connection.query("SELECT * FROM vendors", function (err, result, fields) {
    if (err) throw err;
    response(res, 200, 'Berhasil Mendapatkan Vendor', result);
  });
});

/* GET vendors listing. */
router.get('/testing', function(req, res, next) {
  response(res, 200, 'Berhasil Mendapatkan Vendor');
  // res.send('respond with a resource');
});

module.exports = router;
