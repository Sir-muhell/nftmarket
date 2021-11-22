const { Int32 } = require('bson');
const mongoose = require('mongoose');

const schema = mongoose.Schema;

const userSchema = new mongoose.Schema({
    username: {
        type: String,
        required: true,
        unique: true,
        trim: true,
        minlength: 3
    }, password :{ type: String, required: true, unique: false, trim: true, minlength: 6}
}, {
    timestamps: true,
});

const User = mongoose.user('User', userSchema);

module.exports = User;