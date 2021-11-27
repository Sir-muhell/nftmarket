const mongoose = require('mongoose');

mongoose.connect("mongodb://localhost:27017/User1", (error) =>{
    if(!error){
        console.log("Success");
    }
    else{
        console.log("Error connecting to database");
    }
});