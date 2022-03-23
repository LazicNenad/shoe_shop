window.onload = function () {
  if (loc_array[loc_array.length - 1] === 'admin-panel.php') {
    window.onload = () => {
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
};
