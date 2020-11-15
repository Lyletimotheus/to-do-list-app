// Insert & Edit Buttons
let addTask = document.querySelector('.add-task');
let editTask = document.querySelectorAll('.edit-task');
let removeTask = document.querySelectorAll('.remove-task');

// Add and Edit Modal and Modal Buttons
let updateModal = document.querySelector('.update-modal');
let closeModal = document.querySelector('.close-modal');
let newTaskHeading = document.querySelector('.task-heading');

let addTaskConfirm = document.querySelector('.insert-button');
let editTaskConfirm = document.querySelector('.edit-button');

// Remove Modal and Modal Buttons
let removeModal = document.querySelector('.remove-modal');
let cancelRemove = document.querySelector('.cancel-remove');
let confirmRemove = document.querySelector('.confirm-remove');


// Button event listeners
addTask.addEventListener('click', ()=> {
    updateModal.style.display = 'block';
    newTaskHeading.innerHTML = `Insert Task`;
    addTaskConfirm.style.display = "inline";
    editTaskConfirm.style.display = 'none';
})

editTask.forEach ( element => {
    element.addEventListener('click', ()=> {
        updateModal.style.display = 'block';
        newTaskHeading.innerHTML = `Update Current Task`;
        addTaskConfirm.style.display = "none";
        editTaskConfirm.style.display = 'inline';
    })
})

removeTask.forEach ( element => {
    element.addEventListener('click', ()=> {
    removeModal.style.display = 'block';
    })
})

closeModal.addEventListener('click', ()=> {
    updateModal.style.display = 'none';
})

cancelRemove.addEventListener('click', ()=> {
    removeModal.style.display = 'none';
})

confirmRemove.addEventListener('click', ()=> {
    removeModal.style.display = 'none';
})