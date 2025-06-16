
window.onload = function() {
    
    const form = document.querySelector('form');
    
   
    form.addEventListener('submit', function(event) {
       
        event.preventDefault();
        
        
        clearErrors();
        
       
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        
        
        let isValid = true;
        
        
        if (!username || !/^[a-zA-Z][a-zA-Z0-9]{5,9}$/.test(username)) {
            showError('username', 'Username must start with a letter and be 6-10 characters');
            isValid = false;
        }
        
   
        if (!password || password.length < 8) {
            showError('password', 'Password must be at least 8 characters');
            isValid = false;
        }
        
       
        if (isValid) {
            form.submit();
        }
    });
    
    // Function to show error message
    function showError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorDiv = document.createElement('div');
        errorDiv.className = 'error-message';
        errorDiv.style.color = 'red';
        errorDiv.style.fontSize = '12px';
        errorDiv.style.marginTop = '-5px';
        errorDiv.style.marginBottom = '10px';
        errorDiv.textContent = message;
        
        field.parentNode.insertBefore(errorDiv, field.nextSibling);
    }
    
    // Function to clear all error messages
    function clearErrors() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function(error) {
            error.remove();
        });
    }
    
    // Function to clear form fields
    window.clearFields = function() {
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
    };
};
