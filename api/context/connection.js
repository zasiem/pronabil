require('dotenv/config')

var mysql = require('mysql');

var connection = mysql.createPool({
    host: process.env.DB_HOST,
    user: process.env.DB_USER,
    password: process.env.DB_PASSWORD,
    database: process.env.DB_DATABASE
});

// connection.connect(function (err) {
//     if (err) throw err;
//     console.log("Connected!");
// });

// connection.on('error', function(err) {
//     console.log('db error', err);
//     if(err.code === 'PROTOCOL_CONNECTION_LOST') { 
//       handleDisconnect();                         
//     } else {                                      
//       throw err;                                  
//     }
//   });

module.exports = connection;