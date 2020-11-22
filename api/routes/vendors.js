var express = require('express');
var router = express.Router();

var connection = require('../context/connection');
var response = require('../context/baseResponse');

// GET Vendors listing
router.get('/', function(req, res, next){
  let query = "SELECT * FROM vendors JOIN vendor_products ON vendors.id = vendor_products.vendor_id";
  connection.query(query, function (err, results, fields) {
    if (err) throw err;
    response(res, 200, 'Berhasil Mendapatkan Vendor', result);
  });
});

module.exports = router;
