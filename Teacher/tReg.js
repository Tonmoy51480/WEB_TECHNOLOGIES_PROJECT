document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");

    form.addEventListener("submit", function (event) {
        event.preventDefault(); // Prevent form submission until validation passes
        let isValid = true;

        // Get form fields
        const firstName = document.getElementById("first_name");
        const lastName = document.getElementById("last_name");
        const email = document.getElementById("email");
        const phone = document.getElementById("phone_number");
        const teacherID = document.getElementById("teacher_id");
        const institution = document.getElementById("institution_name");
        const city = document.getElementById("city");
        const gender = document.getElementById("gender");
        const educationLevels = document.querySelectorAll('input[name="education_level[]"]:checked');

        // Clear previous error messages
        document.querySelectorAll(".error").forEach(el => el.remove());

        // Function to show error messages
        function showError(input, message) {
            const error = document.createElement("div");
            error.className = "error";
            error.style.color = "red";
            error.style.fontSize = "0.9em";
            error.textContent = message;
            input.parentNode.appendChild(error);
        }

        // Validation checks
        if (firstName.value.trim() === "") {
            showError(firstName, "First name is required.");
            isValid = false;
        }

        if (lastName.value.trim() === "") {
            showError(lastName, "Last name is required.");
            isValid = false;
        }

        if (!/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/.test(email.value)) {
            showError(email, "Enter a valid email address.");
            isValid = false;
        }


        if (!/^\d{11}$/.test(phone.value)) {
            showError(phone, "Enter a valid 11-digit phone number.");
            isValid = false;
        }

        if (teacherID.value.trim() === "") {
            showError(teacherID, "Teacher ID is required.");
            isValid = false;
        }

        if (institution.value.trim() === "") {
            showError(institution, "Institution name is required.");
            isValid = false;
        }

        if (city.value.trim() === "") {
            showError(city, "City is required.");
            isValid = false;
        }

        if (gender.value.trim() === "") {
            showError(gender, "Gender is required.");
            isValid = false;
        }

        if (educationLevels.length === 0) {
            showError(document.querySelector('input[name="education_level[]"]').parentNode, "Select at least one education level.");
            isValid = false;
        }

        // If form is valid, submit it
        if (isValid) {
            alert("Form submitted successfully!");
            form.submit(); // Remove this line if handling form submission via AJAX
        }
    });
});
