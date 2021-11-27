console.log('Server-side code running');
const mongoose = require('mongoose');

const express = require('express');






const app = express();

const DB_URI = 'mongodb+srv://rootuser:rootpass@cluster0.0fksq.mongodb.net/myFirstDatabase?retryWrites=true&w=majority';
mongoose.connect(DB_URI)
    .then((result) => app.listen(8080, () => {
        console.log('listening on 8080');
      }))
      .then((rese) => console.log('connected to db'))
    .catch((err) => console.log(err))

    //serve files from the public directory

app.use(express.static('public'));


// serve the homepage
// app.get('/', (req, res) => {
//   res.sendFile(__dirname + '/index.html');
// });