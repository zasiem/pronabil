var express = require('express');
var router = express.Router();

var connection = require('../context/connection');
var response = require('../context/baseResponse');

// GET transactions
router.get('/', function(req, res, next){
    let query ="SELECT * FROM transactions";
  connection.query(query, function (err, result, fields) {
    if (err) throw err;
    response(res, 200, 'Berhasil Mendapatkan Transactions', result);
  });
});

// GET History transactions
router.get('/history', function(req, res, next){
    let query ="SELECT * FROM transactions WHERE status = 'selesai' order by created_at DESC";
    connection.query(query, function (err, result, fields) {
      if (err) throw err;
      response(res, 200, 'Berhasil Mendapatkan History Transactions', result);
    });
  });

module.exports = router;
