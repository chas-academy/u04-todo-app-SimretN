document.addEventListener('DOMContentLoaded', function () {
    // Click event for removing a to-do
    let deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        let id = this.id;
  
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'app/remove.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            if (xhr.responseText) {
              button.parentElement.style.display = 'none';
            }
          }
        };
  
        xhr.send('id=' + id);
      });
    });
  

  
   
  });