document.addEventListener('DOMContentLoaded', function () {
    // Click event for removing a to-do
    let deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        let id = this.id;
  
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'app/delete.php', true);
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
  
    // Click event for checking/unchecking a to-do
    let checkBoxes = document.querySelectorAll('.check-box');
    checkBoxes.forEach(function (checkBox) {
      checkBox.addEventListener('click', function (e) {
        var id = this.getAttribute('data-todo-id');
  
        let xhr = new XMLHttpRequest();
        xhr.open('POST', 'app/checkBox.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4 && xhr.status === 200) {
            let h2 = checkBox.nextElementSibling;
            let desc = h2.nextElementSibling;
            if (xhr.responseText !== 'error') {
               if (xhr.responseText === '1') {
                 h2.classList.remove('checked');
                 desc.classList.remove('checked');
               } else {
                 h2.classList.add('checked');
                 desc.classList.add('checked');
               }
             }
           }
         };
        


  
        xhr.send('id=' + id);
      });
    });
  
    // Click event for editing a to-do
    let showTodoSection = document.querySelector('.show-todo-section');
    showTodoSection.addEventListener('click', function (event) {
      if (event.target.classList.contains('edit-btn')) {
        let todoItem = event.target.closest('.todo-item');
        let todoId = todoItem.querySelector('.delete-btn').id;
        let todoTitle = todoItem.querySelector('h2').innerText;
        let todoDescription = todoItem.querySelector('p').innerText;
        let todoChecked = todoItem.querySelector('.check-box').checked;
  
        let newTitle = prompt('Edit title:', todoTitle);
        let newTodoDescription  = prompt('Edit description:', todoDescription);
        if (newTitle !== null && newTodoDescription !== null) {
          let xhr = new XMLHttpRequest();
          xhr.open('POST', 'app/update.php', true);
          xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
          xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
              if (xhr.responseText.trim() === 'success') {
                todoItem.querySelector('h2').innerText = newTitle;
                todoItem.querySelector('p').innerText = newTodoDescription;
                alert('Todo updated successfully!');
              } else {
                alert('Error updating todo!');
              }
            }
          };
  
          xhr.send('id=' + todoId + '&title=' + encodeURIComponent(newTitle) + '&taskDescription='+ encodeURIComponent(newTodoDescription) + '&checked=' + (todoChecked ? 1 : 0));
        }
     }
    });
    });