var express = require('express');
var router = express.Router();

var connection = require('../context/connection');
var response = require('../context/baseResponse');

// GET Vendors listing
router.get('/', function (req, res, next) {
  let query = "SELECT * FROM vendors WHERE deleted_at IS NULL";
  connection.query(query, function (err, result, fields) {
    if (err) throw err;
    response(res, 200, 'Berhasil Mendapatkan Vendor', result);
  });
});

// GET Vendors by id
router.get('/:id', function (req, res, next) {
  let id = req.params.id;
  let query = `SELECT * FROM vendors WHERE id = "${id}"`;
  connection.query(query, function (err, result, fields) {
    if (err) throw err;
    response(res, 200, 'Berhasil Mendapatkan Vendor', result);
  });
});

// GET Vendors products
router.get('/:id/products', function (req, res, next) {
  let id = req.params.id;
  let query = `SELECT * FROM vendor_products WHERE vendor_id = "${id}" AND deleted_at IS NULL`;
  connection.query(query, function (err, result, fields) {
    if (err) throw err;
    response(res, 200, 'Berhasil Mendapatkan Vendor Product', result);
  });
});

// add vendors data
router.post('/store', function (req, res, next) {
  let name = req.body.name;
  let rating = req.body.rating;
  let address = req.body.address;
  let phone = req.body.phone;
  let email = req.body.email;
  if (name == undefined || rating == undefined || address == undefined || phone == undefined || email == undefined) {
    return response(res, 400, 'Ada data belum diisi');
  }

  let today = new Date().toISOString().slice(0, 18);
  let query = `INSERT INTO vendors VALUES(NULL,"${name}","${rating}","${address}","${phone}","${email}","${today}",NULL,NULL)`;

  try {
    connection.query(query, function (err, result, fields) {
      if (err) throw err;
      return response(res, 200, 'Berhasil Menambahkan Vendor', req.body);
    });
  } catch (err) {
    return response(res, 400, err);
  }

});

// update vendors data
router.put('/:id', function (req, res, next) {
  let id = req.params.id;
  let name = req.body.name;
  let rating = req.body.rating;
  let address = req.body.address;
  let phone = req.body.phone;
  let email = req.body.email;
  if (name == undefined || rating == undefined || address == undefined || phone == undefined || email == undefined) {
    return response(res, 400, 'Ada data belum diisi');
  }

  let today = new Date().toISOString().slice(0, 18);
  let query = `UPDATE vendors SET name="${name}", rating="${rating}", address="${address}", phone="${phone}", email="${email}", updated_at="${today}" WHERE id = "${id}"`;

  try {
    connection.query(query, function (err, result, fields) {
      if (err) throw err;
      return response(res, 200, 'Berhasil Mendapatkan Mengubah Vendor', req.body);
    });
  } catch (err) {
    return response(res, 400, err);
  }

});

// soft delete vendors data
router.delete('/:id', function (req, res, next) {
  let id = req.params.id;
  let today = new Date().toISOString().slice(0, 18);
  let query = `UPDATE vendors SET deleted_at="${today}" WHERE id = "${id}"`;

  try {
    connection.query(query, function (err, result, fields) {
      if (err) throw err;
      return response(res, 200, 'Berhasil Menghapus Vendor');
    });
  } catch (err) {
    return response(res, 400, err);
  }

});

// add product vendors data
router.post('/:id/products/store', function (req, res, next) {
  let id = req.params.id;
  let name = req.body.name;
  let type = req.body.type;
  let price = req.body.price;
  let description = req.body.description;
  if (name == undefined || type == undefined || price == undefined || description == undefined) {
    return response(res, 400, 'Ada data belum diisi');
  }

  let today = new Date().toISOString().slice(0, 18);
  let query = `INSERT INTO vendor_products VALUES(NULL,"${id}","${name}","${type}","${price}","${description  }","${today}",NULL,NULL)`;

  try {
    connection.query(query, function (err, result, fields) {
      if (err) throw err;
      return response(res, 200, 'Berhasil Menambahkan Vendor Product', req.body);
    });
  } catch (err) {
    return response(res, 400, err);
  }

});

// update vendors data
router.put('/:id/products/:product', function (req, res, next) {
  let id = req.params.product;
  let vendor_id = req.params.id;
  let name = req.body.name;
  let type = req.body.type;
  let price = req.body.price;
  let description = req.body.description;
  if (name == undefined || type == undefined || price == undefined || description == undefined) {
    return response(res, 400, 'Ada data belum diisi');
  }

  let today = new Date().toISOString().slice(0, 18);
  let query = `UPDATE vendor_products SET name="${name}", type="${type}", price="${price}", description="${description}", updated_at="${today}" WHERE id = "${id}"`;

  try {
    connection.query(query, function (err, result, fields) {
      if (err) throw err;
      return response(res, 200, 'Berhasil Mendapatkan Mengubah Vendor Product', req.body);
    });
  } catch (err) {
    return response(res, 400, err);
  }

});

// soft delete vendors data
router.delete('/:id/products/:product', function (req, res, next) {
  let id = req.params.product;
  let today = new Date().toISOString().slice(0, 18);
  let query = `UPDATE vendor_products SET deleted_at="${today}" WHERE id = "${id}"`;

  try {
    connection.query(query, function (err, result, fields) {
      if (err) throw err;
      return response(res, 200, 'Berhasil Menghapus Vendor Product');
    });
  } catch (err) {
    return response(res, 400, err);
  }

});

module.exports = router;
