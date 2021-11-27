const express = require('express');
const mongoose = require('mongoose');
const User = require('../backend/data/user');

var firstTimeUser = require('../models/newUser');

console.log("client-side running");

const app = express();

app.use(express.static('public'));

const signUpButton = document.getElementById('submitButton');


    app.get('/', (req, res) =>{
        const user1 = new User({
            username: 'JamesComfort',
            password: 'nevermind',
        });

        user1.save()
            .then((result) => {
                res.send(result);
                console.log('saved');
            })
            .catch((err) => {
                console.log(err);
            })
    })
  