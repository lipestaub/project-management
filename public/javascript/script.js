function validateSignInFields(event) {
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    if (email.trim() === '' || password.trim() === '') {
        alert('Please fill in all fields.');
        event.preventDefault();
        return false;
    }
    
    return true;
}

function validateSignUpFields(event) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (name.trim() === '' || email.trim() === '' ||  password.trim() === '' || confirmPassword.trim() === '') {
        alert('Please fill in all fields.');
        event.preventDefault();
        return false;
    }

    if (password !== confirmPassword) {
        alert('Password and confirm password do not match.');
        event.preventDefault();
        return false;
    }
    
    return true;
}

function validateRegisterProjectFields(event) {
    const name = document.getElementById('name').value;
    const description = document.getElementById('description').value;
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;

    if (name.trim() === '' || description.trim() === '' || startDate.trim() === '' || endDate.trim() === '') {
        alert('Please fill in all fields.');
        event.preventDefault();
        return false;
    }

    if (new Date(endDate) <= new Date(startDate)) {
        alert('End date must be greater than start date.');
        event.preventDefault();
        return false;
    }
    
    return true;
}

function validateRegisterTaskFields(event) {
    const description = document.getElementById('description').value;
    const projectId = parseInt(document.getElementById('project_id').value);
    const startDate = document.getElementById('start_date').value;
    const endDate = document.getElementById('end_date').value;

    if (description.trim() === '' || projectId === 0 || startDate.trim() === '' || endDate.trim() === '') {
        alert('Please fill in all fields.');
        event.preventDefault();
        return false;
    }

    if (new Date(endDate) <= new Date(startDate)) {
        alert('End date must be greater than start date.');
        event.preventDefault();
        return false;
    }
    
    return true;
}

function validateRegisterUserFields(event) {
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;

    if (name.trim() === '' || email.trim() === '' ||  password.trim() === '' || confirmPassword.trim() === '') {
        alert('Please fill in all fields.');
        event.preventDefault();
        return false;
    }

    if (password !== confirmPassword) {
        alert('Password and confirm password do not match.');
        event.preventDefault();
        return false;
    }
    
    return true;
}

function validateAssignUserToTaskFields(event) {
    const userId = parseInt(document.getElementById('user_id').value);

    if (userId === 0) {
        alert("Please select an user.");
        event.preventDefault();
        return false;
    }

    return true;
}