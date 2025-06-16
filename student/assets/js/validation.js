
window.onload = function() {
   
    const form = document.querySelector('form');
    
   
    form.addEventListener('submit', function(event) {
        
        event.preventDefault();
        
        
        clearErrors();
        
       
        const username = document.getElementById('username').value.trim();
        const password = document.getElementById('password').value.trim();
        const fullName = document.getElementById('full_name').value.trim();
        const dob = document.getElementById('dob').value.trim();
        const gender = document.querySelector('input[name="gender"]:checked');
        const education = document.querySelector('input[name="education"]:checked');
        const address = document.getElementById('address').value.trim();
        const city = document.getElementById('city').value.trim();
        const zip = document.getElementById('zip').value.trim();
        const phone = document.getElementById('phone').value.trim();
        
       
        let isValid = true;
        
        
        if (!username || !/^[a-zA-Z][a-zA-Z0-9]{5,9}$/.test(username)) {
            showError('username', 'Username must start with a letter and be 6-10 characters');
            isValid = false;
        }
        
       
        if (!password || password.length < 8) {
            showError('password', 'Password must be at least 8 characters');
            isValid = false;
        }
        
     
        if (!fullName) {
            showError('full_name', 'Full name is required');
            isValid = false;
        }
        
        
        if (!dob) {
            showError('dob', 'Date of birth is required');
            isValid = false;
        }
        
       
        if (!gender) {
            showError('male', 'Please select a gender');
            isValid = false;
        }
        
        
        if (!education) {
            showError('school', 'Please select education status');
            isValid = false;
        }
        
      
        if (!address) {
            showError('address', 'Address is required');
            isValid = false;
        }
        
      
        if (!city || !/^[a-zA-Z\s]+$/.test(city)) {
            showError('city', 'City must contain letters only');
            isValid = false;
        }
        
      
        if (!zip) {
            showError('zip', 'ZIP code is required');
            isValid = false;
        }
        
        
        if (!phone || !/^[0-9]{11}$/.test(phone)) {
            showError('phone', 'Phone must be exactly 11 digits');
            isValid = false;
        }
        
       
        if (isValid) {
            form.submit();
        }
    });
    
    
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
    
  
    function clearErrors() {
        const errorMessages = document.querySelectorAll('.error-message');
        errorMessages.forEach(function(error) {
            error.remove();
        });
    }
};
