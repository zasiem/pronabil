var express = require('express');
var router = express.Router();

var connection = require('../context/connection');
var response = require('../context/baseResponse');

// GET transactions
router.get('/', function (req, res, next) {
  let query = null;
  if (req.query.date != undefined) {
    query = `SELECT * FROM transactions WHERE created_at = "${req.query.date}"`;
  } else {
    query = "SELECT * FROM transactions";
  }
  connection.query(query, function (err, result, fields) {
    if (err) throw err;
    return response(res, 200, 'Berhasil Mendapatkan Transactions', result);
  });
});

// GET History transactions
router.get('/history', function (req, res, next) {
  let query = "SELECT * FROM transactions WHERE status = 'paid' OR status = 'arrived' order by created_at DESC";
  connection.query(query, function (err, result, fields) {
    if (err) throw err;
    return response(res, 200, 'Berhasil Mendapatkan History Transactions', result);
  });
});

// GET by Code transactions
router.get('/search/:code', function (req, res, next) {
  let query = `SELECT * FROM transactions WHERE code = "${req.params.code}" `;
  connection.query(query, function (err, result, fields) {
    if (err) throw err;
    return response(res, 200, 'Berhasil Mendapatkan Code Transactions', result);
  });
});

//good receipt
router.post('/good-receipt', function (req, res, next) {
  let barang_id = req.body.barang_id;
  if (barang_id == undefined) {
    return response(res, 400, 'ID barang belum terisi');
  }

  let transaction_code = req.body.transaction_code;
  if (transaction_code == undefined) {
    return response(res, 400, 'Kode transaksi belum terisi');
  }

  const query = `UPDATE transactions_detail SET status = "arrived" WHERE transaction_code = "${transaction_code}" AND barang_id = "${barang_id}"`;
  queryScript(query)
    .then(data => {
      const query = `SELECT count(*) as total FROM transactions_detail WHERE status != "arrived" AND transaction_code = "${transaction_code}"`;
      queryScript(query).then(result => {
        if (result[0].total <= 0) {
          const query = `UPDATE transactions SET status = "arrived" WHERE code = "${transaction_code}"`;
          queryScript(query).then(result => {
            return response(res, 200, 'Berhasil melakukan good receipt, semua barang di transaksi sudah tercatat sampai digudang');
          })
        }else{
          return response(res, 200, 'Berhasil melakukan good receipt');
        }
      })
    })
    .catch(error => {
      console.log(error);
      return response(res, 400, error);
    })

});

//request order
router.post('/request-order', function (req, res, next) {
  let barang_id = req.body.barang_id;

  if (barang_id.length <= 0) {
    return response(res, 400, 'ID barang belum terisi');
  }

  let quantity = req.body.quantity;
  if (quantity.length != barang_id.length) {
    return response(res, 400, 'quantity tiap barang tidak sesuai');
  }

  let name = req.body.name;
  if (name == undefined) {
    return response(res, 400, 'Nama request belum terisi');
  }

  let description = req.body.description;
  if (description == undefined) {
    return response(res, 400, 'Deskripsi request belum terisi');
  }

  const code = createCode(8);
  const query = `INSERT INTO transactions (id, code, name, description, status) VALUES(NULL, "${code}", "${name}", "${description}", "request")`;

  queryScript(query)
    .then(data => {
      barang_id.map((id, index) => {
        const query = `INSERT INTO transactions_detail (id, transaction_code, barang_id, quantity, status) VALUES(NULL, "${code}", "${id}", "${quantity[index]}", "request")`;
        queryScript(query);
      });
      return response(res, 201, 'Berhasil membuat request order', {
        'transaction_code': code
      });
    })
    .catch(error => {
      console.log(error);
      return response(res, 400, error);
    })

});

const createCode = (length) => {
  var result = '';
  var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  var charactersLength = characters.length;
  for (var i = 0; i < length; i++) {
    result += characters.charAt(Math.floor(Math.random() * charactersLength));
  }
  return result.toUpperCase();
}

const queryScript = script => {
  return new Promise((resolve, reject) => {
    connection.query(script, function (error, result) {
      if (error) {
        reject(error);
        throw error;
      }
      resolve(result);
    });
  });
}

module.exports = router;
