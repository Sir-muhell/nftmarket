$(document).ready(function () {
  //signup
  $("#submit").click(function () {
    var uname = $("#name").val();
    var email = $("#email").val();
    var pword = $("#password").val();
    var cpword = $("#cpassword").val();

    if (uname == "" || uname == null) {
      $("#msg").html("Please input your Username");
    } else {
      if (email == "" || email == null) {
        $("#msg").html("Please input your email");
      } else {
        if (password == "" || password == null) {
          $("#msg").html("Type a password");
        } else {
          if (pword != cpword) {
            $("#msg").html("Password does not match");
          } else {
             $("#msg").html("Loading...Please Wait");

             $.ajax({
                      type: "post",
                      url: "functions/init.php",
                      data: {
                        uname: uname,
                        email: email,
                        pword: pword,
                        cpword: cpword
                      },
                      success: function (data) {
                        $("#msg").html(data);
                      },
                    });
          }
        }
      }

    }
   $("#exampleModalCenter").modal();
   
  });

  //signin
  $("#login").click(function () {
    var username = $("#lusername").val();
    var password = $("#lpassword").val();

    if (username == "" || username == null) {
      $("#msg").html("Please insert your username");
    } else {
      if (password == "" || password == null) {
        $("#msg").html("Please insert your Password");
      } else {
        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: { username: username, password: password },
          success: function (data) {
            $("#msg").html(data);
          },
        });
      }
    }

    $("#exampleModalCenter").modal();
  });

  //forgot
  $("#forgot").click(function () {
    var ffemail = $("#femail").val();

    if (ffemail == "" || ffemail == null) {
      $("#msg").html("Please insert your email");
    } else {
      $("#msg").html("Loading... Please Wait!");

      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: { ffemail: ffemail },
        success: function (data) {
          $("#msg").html(data);
        },
      });
    }

    $("#exampleModalCenter").modal();
  });

  //reset
  $("#update").click(function () {
    var fpassword = $("#fpassword").val();
    var cfpassword = $("#cfpassword").val();
    var mail = $("#data").text();
    console.log(mail);

    if (fpassword == "" || fpassword == null) {
      $("#msg").html("Please create a password");
    } else {
      if (cfpassword == "" || cfpassword == null) {
        $("#msg").html("Confirm Your Password");
      } else {
        if (cfpassword != cfpassword) {
          $("#msg").html("Password does not match!");
        } else {
          $("#msg").html("Loading...Please Wait!");

          $.ajax({
            type: "post",
            url: "functions/init.php",
            data: { fpassword: fpassword, cfpassword: cfpassword, mail: mail },
            success: function (data) {
              $("#msg").html(data);
            },
          });
        }
      }
    }

    $("#exampleModalCenter").modal();
  });

   });
