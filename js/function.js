const lengthCheck = (string, length) => {
  if (string.length < length) {
    return `Length should be at least ${length}`;
  } else {
    return "ok";
  }
};

const passwordCheck = (password, confirmPassword) => {
  if (password.trim() != confirmPassword.trim()) {
    return "Confirm Password Doesn't match!!";
  } else {
    return "ok";
  }
};

$(document).ready(function () {
  $("input[name='name']").on("change", function () {
    var x = $(this).val();
    var validation = lengthCheck(x, 3);

    if (validation != "ok") {
      $(this).after("<span class='validation-error'>" + validation + "</span>");
      $(".submit").prop("disabled", "true");
    } else {
      $(".submit").removeAttr("disabled");
      $(this).siblings("span").hide();
    }
  });

  $("input[name='companyName']").on("change", function () {
    var x = $(this).val();
    var validation = lengthCheck(x, 5);

    if (validation != "ok") {
      $(this).after("<span class='validation-error'>" + validation + "</span>");
      $(".submit").prop("disabled", "true");
    } else {
      $(".submit").removeAttr("disabled");
      $(this).siblings("span").hide();
    }
  });

  $("input[name='password']").on("change", function () {
    var x = $(this).val();
    var validation = lengthCheck(x, 5);

    if (validation != "ok") {
      $(this).after("<span class='validation-error'>" + validation + "</span>");
      $(".submit").prop("disabled", "true");
    } else {
      $(".submit").removeAttr("disabled");
      $(this).siblings("span").hide();
    }
  });

  $("input[name='rePassword']").on("change", function () {
    var userRePassword = $(this).val();
    var userPassword = $("input[name='password']").val();
    let validation = passwordCheck(userPassword, userRePassword);
    if (validation != "ok") {
      $(this).after("<span class='validation-error'>" + validation + "</span>");
      $(".submit").prop("disabled", "true");
    } else {
      $(".submit").removeAttr("disabled");
      $(this).siblings("span").hide();
    }
  });

  // SINGUP
  $("#signup-form").on("submit", function (e) {
    e.preventDefault();
    if (
      $("input[name='password']").val().trim() !=
      $("input[name='rePassword']").val().trim()
    ) {
      alert("Both Password Field Should have same values!!");
    } else {
      $.post(
        "./api/create-new-user.php",
        {
          name: e.target.name.value,
          email: e.target.email.value,
          password: e.target.password.value,
          companyName: e.target.companyName.value,
          aboutCompany: e.target.aboutCompany.value,
          submit: true,
        },
        function (r) {
          let jsonData = JSON.parse(r);
          if (jsonData.status == 200) {
            setTimeout(function () {
              window.location.href = "./search.php";
            }, 5000);
            $(".signup-container").hide("slow");
            $("h1").text("Successfull!!");
            $("p").text(
              jsonData.message +
                " You will be redirected to search page in 5 seconds!!"
            );
          }
        }
      );
    }
  });

  // LOGIN
  $("#login-form").on("submit", function (e) {
    e.preventDefault();
    $.post(
      "./api/login.php",
      {
        email: e.target.email.value,
        password: e.target.password.value,
        submit: true,
      },
      function (r) {
        $jsonData = JSON.parse(r);
        if ($jsonData.status != 200) {
          $("p").addClass("validation-error").text($jsonData.message);
        }
        if ($jsonData.status == 200) {
          setTimeout(function () {
            window.location.href = "./search.php";
          }, 3000);
          $("p").text(
            "User Found, You will be redirected to the Search Page in 3 Seconds..."
          );
        }
      }
    );
  });

  // LOAD RECORD TO UPDATE
  $(".edit-record").click(function () {
    $("input[name='recordID']").val($(this).attr("recordid"));

    $.post(
      "./api/update-user.php",
      {
        loadRecord: true,
        recordID: $(this).attr("recordid"),
      },
      function (r) {
        $data = JSON.parse(r);
        $("input[name='name']").val($data.name);
        $("input[name='companyName']").val($data.companyName);
        $("[name='aboutCompany']").val($data.aboutCompany);
      }
    );
  });

  // UPDATE RECORD
  $("#update-record-form").on("submit", function (e) {
    e.preventDefault();

    $.post(
      "./api/update-user.php",
      {
        recordID: e.target.recordID.value,
        name: e.target.name.value,
        companyName: e.target.companyName.value,
        aboutCompany: e.target.aboutCompany.value,
        updateRecord: true,
      },
      function (r) {
        console.log(r);
        location.reload();
      }
    );
  });
});
