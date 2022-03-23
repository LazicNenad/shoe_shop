// RegEx For Registration Inputs
var regExFirstLastName = /^[A-Z][a-z]{2,14}/;
var regExEmail = /\S+@\S+\.\S+/;
var regExPassword = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
// Location Array for checking which page we are on
loc_array = window.location.href.split('/');
$(document).ready(function () {
  $('.parallax').parallax();

  // Scroll To Top
  $('.scrollToTop').on('click', (e) => {
    e.preventDefault();
    window.scrollTo(0, 0);
  });

  // Initially hidden
  $('.scrollToTop').hide();
  $(document).scroll(function () {
    if ($(document).scrollTop() > 200) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });

  // Store.php settings

  if (
    loc_array[loc_array.length - 1] == 'store.php' ||
    loc_array[loc_array.length - 1] == 'store.php#modal1' ||
    loc_array[loc_array.length - 1] == 'store.php?limit=0' ||
    loc_array[loc_array.length - 1] == 'store.php?limit=1' ||
    loc_array[loc_array.length - 1] == 'store.php?limit=2' ||
    loc_array[loc_array.length - 1] == 'store.php?limit=3' ||
    loc_array[loc_array.length - 1] == 'store.php?limit=4'
  ) {
    $('#categoryPlus').on('click', function () {
      $('#categories').slideToggle();
      if ($('#categoryPlus').hasClass('fa-plus')) {
        $('#categoryPlus').removeClass('fa-plus');
        $('#categoryPlus').addClass('fa-minus');
      } else {
        $('#categoryPlus').removeClass('fa-minus');
        $('#categoryPlus').addClass('fa-plus');
      }
    });

    $('#brandPlus').on('click', function () {
      $('#brands').slideToggle();
      $('#brandPlus').toggleClass('fa-minus fa-plus');
    });

    $('#pricePlus').on('click', function () {
      $('#prices').slideToggle();
      $('#pricePlus').toggleClass('fa-minus fa-plus');
    });

    // $('#products').load('alldata.php');
    $('input[type="checkbox"]').on('change', function () {
      console.log($(this).val());
    });

    window.onload = () => {
      $('select').material_select();
      $('.modal').modal();
      var btnDelete = document.querySelectorAll('.btn-delete');
      console.log(btnDelete);
      btnDelete.forEach((element) => {
        element.addEventListener('click', (e) => {
          var conf = confirm('Are you sure you want to delete');
          if (conf == true) {
            var sendingData = {
              idElement: e.target.id,
            };
            ajaxCallBack(
              'models/delete-item.php',
              'post',
              sendingData,
              alertSuccess,
              deleteFailure
            );
          } else {
            console.log(false);
          }
        });
      });
    };
  }

  // Admin-panel settings

  if (
    loc_array[loc_array.length - 1] === 'admin-panel.php' ||
    loc_array[loc_array.length - 1] === 'admin-panel#modal2.php' ||
    loc_array[loc_array.length - 1] === 'admin-panel.php?limit=0' ||
    loc_array[loc_array.length - 1] === 'admin-panel.php?limit=1' ||
    loc_array[loc_array.length - 1] === 'admin-panel.php?limit=3' ||
    loc_array[loc_array.length - 1] === 'admin-panel.php?limit=4' ||
    loc_array[loc_array.length - 1] === 'admin-panel.php?limit=5'
  ) {
    window.onload = () => {
      var btnDelete = document.querySelectorAll('.btn-delete');
      console.log(btnDelete);
      btnDelete.forEach((element) => {
        element.addEventListener('click', (e) => {
          var conf = confirm('Are you sure you want to delete?');
          if (conf == true) {
            var sendingData = {
              idElement: e.target.id,
            };
            ajaxCallBack(
              'models/delete-item.php',
              'post',
              sendingData,
              alertSuccess,
              deleteFailure
            );
          } else {
            console.log(false);
          }
        });
      });
    };
  }

  // Admin-panel-brands settings

  if (loc_array[loc_array.length - 1] === 'admin-panel-brands.php') {
    window.onload = () => {
      var insertBtn = document.querySelector('#insert-brand');
      var brandName = document.querySelector('#brand-name');
      var deleteBtn = document.querySelectorAll('.delete-brand');
      var greske = 0;
      insertBtn.addEventListener('click', function () {
        if (brandName.value < 3) {
          greske++;
        }
        if (greske == 0) {
          var sendingData = {
            brandName: brandName.value,
          };
          ajaxCallBack(
            'models/insert-brand.php',
            'post',
            sendingData,
            successfulInsertBrand,
            errorInsertingBrand
          );
        }
      });
      deleteBtn.forEach((element) => {
        element.addEventListener('click', (e) => {
          var conf = confirm('Are you sure you want to delete this user?');
          if (conf == true) {
            var sendingData = {
              idBrand: e.target.id,
            };
            ajaxCallBack(
              'models/delete-brand.php',
              'post',
              sendingData,
              alertSuccess,
              deleteFailure
            );
          }
        });
      });
    };
  }

  // Contact settings

  if (loc_array[loc_array.length - 1] === 'contact.php') {
    var submitBtn = document.getElementById('submitMessage');
    var first_name = document.getElementById('first_name');
    var last_name = document.getElementById('last_name');
    var emailMessage = document.getElementById('emailMessage');
    var taMessage = document.getElementById('textarea1');
    var greske = 0;
    submitBtn.addEventListener('click', () => {
      if (!regExFirstLastName.test(first_name.value)) {
        greske++;
        first_name.classList.add('invalid');
      } else {
        first_name.classList.add('valid');
      }

      if (!regExFirstLastName.test(last_name.value)) {
        greske++;
        last_name.classList.add('invalid');
      } else {
        last_name.classList.add('valid');
      }

      if (!regExEmail.test(emailMessage.value)) {
        greske++;
        emailMessage.classList.add('invalid');
      } else {
        emailMessage.classList.add('valid');
      }
      if (taMessage.value.length < 15) {
        greske++;
        taMessage.classList.add('invalid');
        document.getElementById('taMessageError').style.color = 'red';
        document.getElementById('taMessageError').innerHTML =
          'Must be at least 15 characters';
      } else {
        taMessage.classList.remove('invalid');
        taMessage.classList.add('valid');
        document.getElementById('taMessageError').innerHTML = '';
      }

      if (greske == 0) {
        var sendingData = {
          first_name: first_name.value,
          last_name: last_name.value,
          emailMessage: emailMessage.value,
          taMessage: taMessage.value,
        };
        ajaxCallBack(
          'models/message-process.php',
          'post',
          sendingData,
          successfulMessage,
          errorMessage
        );
      }
    });
  }

  // Admin-panel-users settings

  if (loc_array[loc_array.length - 1] === 'admin-panel-users.php') {
    window.onload = () => {
      var btnDelete = document.querySelectorAll('.btn-deleteUser');
      btnDelete.forEach((element) => {
        element.addEventListener('click', (e) => {
          var conf = confirm('Are you sure you want to delete this user?');
          if (conf == true) {
            var sendingData = {
              idUser: e.target.id,
            };
            ajaxCallBack(
              'models/delete-user.php',
              'post',
              sendingData,
              alertSuccess,
              deleteFailure
            );
          }
        });
      });
    };
  }

  // Admin-panel-messages settings

  if (loc_array[loc_array.length - 1] === 'admin-panel-messages.php') {
    window.onload = () => {
      var btnDelete = document.querySelectorAll('.btn-deleteMessage');
      console.log(btnDelete);
      btnDelete.forEach((element) => {
        element.addEventListener('click', (e) => {
          var conf = confirm('Are you sure you want to delete this message?');
          if (conf == true) {
            var sendingData = {
              idMessage: e.target.id,
            };
            ajaxCallBack(
              'models/delete-message.php',
              'post',
              sendingData,
              alertSuccess,
              deleteFailure
            );
          }
        });
      });
    };
  }

  // Register settings

  if (loc_array[loc_array.length - 1] === 'register.php') {
    var btnRegister = document.getElementById('btnRegister');
    btnRegister.addEventListener('click', function (e) {
      e.preventDefault();

      // Registration
      var firstName = document.getElementById('first_name');
      var lastName = document.getElementById('last_name');
      var email = document.getElementById('email');
      var password = document.getElementById('password');
      var passwordRepeat = document.getElementById('passwordRepeat');

      var brojGresaka = 0;
      if (!regExFirstLastName.test(firstName.value)) {
        brojGresaka++;
        firstName.classList.add('invalid');
        document.getElementById('errorTextFirstName').innerHTML =
          'Example: Nenad';
      } else {
        // firstName.classList.remove('invalid');
        document.getElementById('errorTextFirstName').innerHTML = '';
        firstName.classList.add('valid');
      }

      if (!regExFirstLastName.test(lastName.value)) {
        brojGresaka++;
        lastName.classList.add('invalid');
        document.getElementById('errorTextLastName').innerHTML =
          'Example: Lazic';
      } else {
        // firstName.classList.remove('invalid');
        lastName.classList.add('valid');
        document.getElementById('errorTextLastName').innerHTML = '';
      }

      if (!regExEmail.test(email.value)) {
        brojGresaka++;
        email.classList.add('invalid');
        document.getElementById('errorTextEmail').innerHTML =
          'Example: nenad.lazic@gmail.com';
      } else {
        email.classList.add('valid');
        document.getElementById('errorTextEmail').innerHTML = '';
      }

      if (!regExPassword.test(password.value)) {
        brojGresaka++;
        password.classList.add('invalid');
        document.getElementById('errorTextPassword').innerHTML =
          'Password must contain at least 1 lowercase character, 1 uppercase character, 1 numeric character, 1 special character, and at least 8 characters or longer';
      } else {
        password.classList.add('valid');
        document.getElementById('errorTextPassword').innerHTML = '';
      }

      if (!regExPassword.test(passwordRepeat.value)) {
        brojGresaka++;
        passwordRepeat.classList.add('invalid');
      } else {
        if (passwordRepeat.value != password.value) {
          brojGresaka++;
          passwordRepeat.classList.add('invalid');
          document.getElementById('errorTextRepeatPassword').innerHTML =
            'Passwords doesnt match';
        }
        passwordRepeat.classList.add('valid');
        document.getElementById('errorTextRepeatPassword').innerHTML = '';
      }

      if (brojGresaka == 0) {
        e.preventDefault();
        data = {
          firstName: firstName.value,
          lastName: lastName.value,
          email: email.value,
          password: password.value,
        };
        ajaxCallBack(
          'models/register-process.php',
          'post',
          data,
          successFunction,
          errorFunction
        );
      }
    });
  }

  // Login
  if (loc_array[loc_array.length - 1] === 'login.php') {
    var btnLogin = document.getElementById('btnLogin');
    btnLogin.addEventListener('click', function (e) {
      e.preventDefault();
      var email = document.getElementById('emailLogin');
      var password = document.getElementById('passwordLogin');
      var greske = 0;
      if (!regExEmail.test(email.value)) {
        greske++;
        email.classList.add('invalid');
        document.getElementById('errorTextEmailLogin').innerHTML =
          'Example: nenad.lazic@gmail.com';
      } else {
        email.classList.add('valid');
        document.getElementById('errorTextEmailLogin').innerHTML = '';
      }

      if (!regExPassword.test(password.value)) {
        greske++;
        password.classList.add('invalid');
        document.getElementById('errorTextPasswordLogin').innerHTML =
          'Password must contain at least 1 lowercase character, 1 uppercase character, 1 numeric character, 1 special character, and at least 8 characters or longer';
      } else {
        password.classList.add('valid');
        document.getElementById('errorTextPasswordLogin').innerHTML = '';
      }

      if (greske == 0) {
        var data = {
          email: email.value,
          password: password.value,
        };

        ajaxCallBack(
          'models/login-process.php',
          'post',
          data,
          successF,
          errorF
        );
      }
    });
  }

  // Insert User In Admin Panel

  if (loc_array[loc_array.length - 1] === 'admin-panel-users.php') {
    var btnRegister = document.getElementById('btnInserUser');
    btnRegister.addEventListener('click', function (e) {
      e.preventDefault();

      // Registration
      var firstName = document.getElementById('first_name');
      var lastName = document.getElementById('last_name');
      var email = document.getElementById('email');
      var password = document.getElementById('password');
      var passwordRepeat = document.getElementById('passwordRepeat');
      var userRole = document.getElementById('userRole');

      var brojGresaka = 0;
      if (!regExFirstLastName.test(firstName.value)) {
        brojGresaka++;
        firstName.classList.add('invalid');
        document.getElementById('errorTextFirstName').innerHTML =
          'Example: Nenad';
      } else {
        // firstName.classList.remove('invalid');
        document.getElementById('errorTextFirstName').innerHTML = '';
        firstName.classList.add('valid');
      }

      if (!regExFirstLastName.test(lastName.value)) {
        brojGresaka++;
        lastName.classList.add('invalid');
        document.getElementById('errorTextLastName').innerHTML =
          'Example: Lazic';
      } else {
        // firstName.classList.remove('invalid');
        lastName.classList.add('valid');
        document.getElementById('errorTextLastName').innerHTML = '';
      }

      if (!regExEmail.test(email.value)) {
        brojGresaka++;
        email.classList.add('invalid');
        document.getElementById('errorTextEmail').innerHTML =
          'Example: nenad.lazic@gmail.com';
      } else {
        email.classList.add('valid');
        document.getElementById('errorTextEmail').innerHTML = '';
      }

      if (!regExPassword.test(password.value)) {
        brojGresaka++;
        password.classList.add('invalid');
        document.getElementById('errorTextPassword').innerHTML =
          'Password must contain at least 1 lowercase character, 1 uppercase character, 1 numeric character, 1 special character, and at least 8 characters or longer';
      } else {
        password.classList.add('valid');
        document.getElementById('errorTextPassword').innerHTML = '';
      }

      if (!regExPassword.test(passwordRepeat.value)) {
        brojGresaka++;
        passwordRepeat.classList.add('invalid');
      } else {
        if (passwordRepeat.value != password.value) {
          brojGresaka++;
          passwordRepeat.classList.add('invalid');
          document.getElementById('errorTextRepeatPassword').innerHTML =
            'Passwords doesnt match';
        }
        passwordRepeat.classList.add('valid');
        document.getElementById('errorTextRepeatPassword').innerHTML = '';
      }

      if (userRole.value == '0') {
        brojGresaka++;
        userRole.classList.add('invalid');
      } else {
        userRole.classList.add('valid');
      }

      if (brojGresaka == 0) {
        e.preventDefault();
        data = {
          firstName: firstName.value,
          lastName: lastName.value,
          email: email.value,
          password: password.value,
          idRole: userRole.value,
        };
        ajaxCallBack(
          'models/insert-user.php',
          'post',
          data,
          successInsertUser,
          errorInsertingUser
        );
      }
    });
  }
});

// Ajax CallBack
function ajaxCallBack(url, method, data, successFunction, errorFunction) {
  $.ajax({
    url: url,
    method: method,
    data: data,
    dataType: 'json',
    success: function (result) {
      successFunction(result);
    },
    error: function (xhr) {
      errorFunction(xhr);
    },
  });
}

function successFunction(data) {
  document.getElementById('response').innerHTML = `<div class="row">
  <div class="col s12 m6">
    <div class="card-panel teal">
      <span class="white-text">Successfully registered!
      </span>
    </div>
  </div>
</div>`;
  setTimeout(function () {
    window.location.href = 'http://shoeshopphp.epizy.com/index.php'; //      http://127.0.0.1/shoeshop/index.php
  }, 1650);
}

function errorFunction(xhr) {
  if (xhr.status == 500) {
    document.getElementById('response').innerHTML = `<div class="row">
  <div class="col s12 m6">
    <div class="card-panel #b71c1c red darken-4">
      <span class="white-text">Error ${xhr.responseText}, ${xhr.status}, Server Error
      </span>
    </div>
  </div>
</div>`;
  }
  if (xhr.status == 404) {
    document.getElementById('response').innerHTML = `<div class="row">
  <div class="col s12 m6">
    <div class="card-panel #b71c1c red darken-4">
      <span class="white-text">Error ${xhr.responseText}, ${xhr.status} Page Not Found
      </span>
    </div>
  </div>
</div>`;
  }
}

function successF(data) {
  document.getElementById('responseLogin').innerHTML = `<div class="row">
  <div class="col s12 m6">
    <div class="card-panel teal">
      <span class="white-text">Successfully Loged In!
      </span>
    </div>
  </div>
</div>`;
  setTimeout(function () {
    window.location.href = 'http://shoeshopphp.epizy.com/index.php'; //  http://127.0.0.1/shoeshop/index.php
  }, 1650);
}

function errorF(xhr) {
  console.log(xhr);
  if (xhr.status == 500) {
    document.getElementById('responseLogin').innerHTML = `<div class="row">
  <div class="col s12 m6">
    <div class="card-panel #b71c1c red darken-4">
      <span class="white-text">Error ${xhr.responseText}, ${xhr.status}, Server Error
      </span>
    </div>
  </div>
</div>`;
  }
  if (xhr.status == 404) {
    document.getElementById('responseLogin').innerHTML = `<div class="row">
  <div class="col s12 m6">
    <div class="card-panel #b71c1c red darken-4">
      <span class="white-text">Error ${xhr.responseText}, ${xhr.status} Page Not Found
      </span>
    </div>
  </div>
</div>`;
  }
  if (xhr.status == 422) {
    document.getElementById('responseLogin').innerHTML = `<div class="row">
  <div class="col s12 m6">
    <div class="card-panel #b71c1c red darken-4">
      <span class="white-text">Error User Doesnt Exist  
      </span>
    </div>
  </div>
</div>`;
  }
}

function alertSuccess() {
  alert('Successfully deleted');
  location.reload();
}

function deleteFailure(xhr) {
  console.log(xhr);
  alert('Couldnt Delete!');
}

function checkInsertFields() {
  var productName = document.querySelector('#productName');
  var productPrice = document.querySelector('#productPrice');
  var productOldPrice = document.querySelector('#productOldPrice');
  var selectCategory = document.querySelector('#selectCategory');
  var selectBrand = document.querySelector('#selectBrand');
  var imageFile = document.querySelector('#image-file');
  var greske = 0;

  if (productName.value.length < 3) {
    greske++;
    productName.classList.add('invalid');
  } else {
    productPrice.classList.remove('invalid');
    productPrice.classList.add('valid');
  }

  if (productPrice.value < 0 || productPrice.value == '') {
    greske++;
    productPrice.classList.add('invalid');
  } else {
    productPrice.classList.remove('invalid');
    productPrice.classList.add('valid');
  }

  if (productOldPrice.value < 0 || productOldPrice.value == '') {
    greske++;
    productOldPrice.classList.add('invalid');
  } else {
    productOldPrice.classList.remove('invalid');
    productOldPrice.classList.add('valid');
  }

  if (selectCategory.value == 0) {
    greske++;
    document.querySelector('#spanCategory').innerHTML =
      'Please select Category';
    document.querySelector('#spanCategory').style.color = 'red';
  } else {
    document.querySelector('#spanCategory').innerHTML = '';
  }

  if (selectBrand.value == 0) {
    greske++;
    document.querySelector('#spanBrand').innerHTML = 'Please select Brand';
    document.querySelector('#spanBrand').style.color = 'red';
  } else {
    document.querySelector('#spanBrand').innerHTML = '';
  }

  console.log(greske);

  if (imageFile.value == '') {
    greske++;
    imageFile.style.color = 'red';
  } else {
    imageFile.style.color = 'black';
  }

  if (greske == 0) {
    return true;
  }

  return false;
}

function successfulMessage() {
  document.getElementById('responseMessage').innerHTML = `
  <div class="row">
  <div class="col s12 m6">
    <div class="card-panel teal">
      <span class="white-text">Message successfully sent. Thanks for feedback!
      </span>
    </div>
  </div>
</div>
  `;
  setTimeout(function () {
    location.reload();
  }, 1500);
}

function errorMessage(xhr) {
  console.log(xhr);
  document.getElementById('responseMessage').innerHTML = `
  <div class="row">
  <div class="col s12 m6">
    <div class="card-panel #b71c1c red darken-4">
      <span class="white-text">Please try again later. Thanks! 
      </span>
    </div>
  </div>
</div>
  `;
}

function successfulInsertBrand() {
  alert('Successfully inserted brand');
  setTimeout(() => {
    location.reload();
  }, 500);
}

function errorInsertingBrand(xhr) {
  console.log(xhr);
}

function successInsertUser() {
  alert('Successfully inserted User');
  setTimeout(() => {
    location.reload();
  }, 500);
}

function errorInsertingUser(xhr) {
  console.log(xhr);
}
