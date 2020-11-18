// Insert & Edit Buttons
let addTask = document.querySelector('.add-task');
let editTask = document.querySelectorAll('.edit-task');
let removeTask = document.querySelectorAll('.remove-task');

// Add and Edit Modal and Modal Buttons
let insertModal = document.querySelector('.insert-modal');
let editModal = document.querySelector('.edit-modal');
let closeModal = document.querySelectorAll('.close-modal');

let addTaskConfirm = document.querySelector('.insert-button');
let editTaskConfirm = document.querySelector('.edit-button');

// Remove Modal and Modal Buttons
let removeModal = document.querySelector('.remove-modal');
let cancelRemove = document.querySelector('.cancel-remove');
let confirmRemove = document.querySelector('.confirm-remove');


// Button event listeners
addTask.addEventListener('click', ()=> {
    insertModal.style.display = 'block';
})

editTask.forEach ( element => {
    element.addEventListener('click', ()=> {
        editModal.style.display = 'block';
    })
})

removeTask.forEach ( element => {
    element.addEventListener('click', ()=> {
        removeModal.style.display = 'block';
    })
})

closeModal.forEach ( element => {
    element.addEventListener('click', ()=> {
        insertModal.style.display = 'none';
        editModal.style.display = 'none';
    })
})

cancelRemove.addEventListener('click', ()=> {
    removeModal.style.display = 'none';
})

confirmRemove.addEventListener('click', ()=> {
    removeModal.style.display = 'none';
})