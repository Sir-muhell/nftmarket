const mongoose = require("mongoose");
const { any } = require("webidl-conversions");
import { isEmail } from 'validator';
/*const Schema = mongoose.Schema;*/

var validateEmail = function(email) {
    var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return re.test(email)
};



var newUser = new mongoose.Schema({
    userName:{
        type:String, 
        required: true,
    },

    email: {
        type: String,
        trim: true,
        lowercase: true,
        unique: true,
        required: 'Email address is required',
        validate: [validateEmail, 'Please fill a valid email address'],
        match: [/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/, 'Please fill a valid email address'],
        validate: [ isEmail, 'invalid email' ],
    },

    password: {
        type: any,
        required: true,
    },

    id: {
        type: Number
    }


}, {
    timestamps: true
});

const Newuser =mongoose.model('User', newUser);

module.exports = Newuser;