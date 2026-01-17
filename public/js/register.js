// Registration Form Handler
document.addEventListener("DOMContentLoaded", function () {
    // Form elements
    const registerForm = document.getElementById("registerForm");
    const firstNameInput = document.getElementById("firstName");
    const lastNameInput = document.getElementById("lastName");
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("phone");
    const passwordInput = document.getElementById("password");
    const passwordConfirmInput = document.getElementById("passwordConfirm");
    const termsCheckbox = document.getElementById("terms");
    const registerButton = document.querySelector(".btn-register");

    // Message elements
    const errorMessage = document.getElementById("errorMessage");
    const successMessage = document.getElementById("successMessage");

    // Password toggle buttons
    const togglePassword = document.getElementById("togglePassword");
    const togglePasswordConfirm = document.getElementById(
        "togglePasswordConfirm"
    );

    // Password strength elements
    const passwordStrength = document.getElementById("passwordStrength");
    const strengthFill = document.getElementById("strengthFill");
    const strengthText = document.getElementById("strengthText");

    // Password visibility toggle
    togglePassword.addEventListener("click", function () {
        togglePasswordVisibility(passwordInput, this);
    });

    togglePasswordConfirm.addEventListener("click", function () {
        togglePasswordVisibility(passwordConfirmInput, this);
    });

    function togglePasswordVisibility(input, button) {
        const type =
            input.getAttribute("type") === "password" ? "text" : "password";
        input.setAttribute("type", type);

        // Update icon (you can add eye-slash icon if needed)
        button.style.color =
            type === "text" ? "var(--primary-color)" : "var(--text-secondary)";
    }

    // Password strength checker
    passwordInput.addEventListener("input", function () {
        const password = this.value;

        if (password.length === 0) {
            passwordStrength.classList.remove("show");
            return;
        }

        passwordStrength.classList.add("show");
        const strength = calculatePasswordStrength(password);

        // Remove all strength classes
        strengthFill.classList.remove("weak", "medium", "strong");
        strengthText.classList.remove("weak", "medium", "strong");

        // Add appropriate class
        if (strength < 40) {
            strengthFill.classList.add("weak");
            strengthText.classList.add("weak");
            strengthText.textContent = "ضعيفة";
        } else if (strength < 70) {
            strengthFill.classList.add("medium");
            strengthText.classList.add("medium");
            strengthText.textContent = "متوسطة";
        } else {
            strengthFill.classList.add("strong");
            strengthText.classList.add("strong");
            strengthText.textContent = "قوية";
        }
    });

    function calculatePasswordStrength(password) {
        let strength = 0;

        // Length check
        if (password.length >= 8) strength += 25;
        if (password.length >= 12) strength += 15;

        // Contains lowercase
        if (/[a-z]/.test(password)) strength += 15;

        // Contains uppercase
        if (/[A-Z]/.test(password)) strength += 15;

        // Contains numbers
        if (/[0-9]/.test(password)) strength += 15;

        // Contains special characters
        if (/[^a-zA-Z0-9]/.test(password)) strength += 15;

        return strength;
    }

    // Real-time validation
    firstNameInput.addEventListener("blur", function () {
        validateField(
            this,
            "firstNameError",
            validateName,
            "يرجى إدخال الاسم الأول"
        );
    });

    lastNameInput.addEventListener("blur", function () {
        validateField(
            this,
            "lastNameError",
            validateName,
            "يرجى إدخال الاسم الأخير"
        );
    });

    emailInput.addEventListener("blur", function () {
        validateField(
            this,
            "emailError",
            validateEmail,
            "يرجى إدخال بريد إلكتروني صحيح"
        );
    });

    phoneInput.addEventListener("blur", function () {
        validateField(
            this,
            "phoneError",
            validatePhone,
            "يرجى إدخال رقم هاتف صحيح"
        );
    });

    passwordConfirmInput.addEventListener("blur", function () {
        validatePasswordMatch();
    });

    // Clear errors on input
    [
        firstNameInput,
        lastNameInput,
        emailInput,
        phoneInput,
        passwordInput,
        passwordConfirmInput,
    ].forEach((input) => {
        input.addEventListener("input", function () {
            clearFieldError(this);
            hideMessages();
        });
    });

    // Form submission
    registerForm.addEventListener("submit", async function (e) {
        e.preventDefault();

        // Clear previous messages
        hideMessages();

        // Validate all fields
        let isValid = true;

        isValid =
            validateField(
                firstNameInput,
                "firstNameError",
                validateName,
                "يرجى إدخال الاسم الأول"
            ) && isValid;
        isValid =
            validateField(
                lastNameInput,
                "lastNameError",
                validateName,
                "يرجى إدخال الاسم الأخير"
            ) && isValid;
        isValid =
            validateField(
                emailInput,
                "emailError",
                validateEmail,
                "يرجى إدخال بريد إلكتروني صحيح"
            ) && isValid;
        isValid =
            validateField(
                phoneInput,
                "phoneError",
                validatePhone,
                "يرجى إدخال رقم هاتف صحيح"
            ) && isValid;
        isValid = validatePassword() && isValid;
        isValid = validatePasswordMatch() && isValid;
        isValid = validateTerms() && isValid;

        if (!isValid) {
            showError("يرجى تصحيح الأخطاء في النموذج");
            return;
        }

        // Show loading state
        setLoading(true);

        try {
            // Get CSRF token
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

            // Prepare form data
            const formData = {
                first_name: firstNameInput.value.trim(),
                last_name: lastNameInput.value.trim(),
                email: emailInput.value.trim(),
                phone: phoneInput.value.trim(),
                password: passwordInput.value,
                password_confirmation: passwordConfirmInput.value,
                terms: termsCheckbox.checked,
            };

            // Make registration request
            const response = await fetch("/register", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                    Accept: "application/json",
                },
                body: JSON.stringify(formData),
            });

            const data = await response.json();

            if (response.ok) {
                // Success
                showSuccess("تم إنشاء الحساب بنجاح! جاري تحويلك...");

                // Redirect after 2 seconds
                setTimeout(() => {
                    window.location.href = data.redirect || "/dashboard";
                }, 2000);
            } else {
                // Handle validation errors
                if (data.errors) {
                    handleValidationErrors(data.errors);
                } else {
                    showError(
                        data.message ||
                            "حدث خطأ في التسجيل. يرجى المحاولة مرة أخرى"
                    );
                }
            }
        } catch (error) {
            console.error("Registration error:", error);
            showError("حدث خطأ في الاتصال. يرجى المحاولة مرة أخرى");
        } finally {
            setLoading(false);
        }
    });

    // Validation functions
    function validateField(input, errorId, validationFn, errorMsg) {
        const value = input.value.trim();
        const errorElement = document.getElementById(errorId);

        if (!value || !validationFn(value)) {
            input.classList.add("error");
            input.classList.remove("success");
            errorElement.textContent = errorMsg;
            return false;
        } else {
            input.classList.remove("error");
            input.classList.add("success");
            errorElement.textContent = "";
            return true;
        }
    }

    function validateName(name) {
        return name.length >= 2 && /^[\u0600-\u06FFa-zA-Z\s]+$/.test(name);
    }

    function validateEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function validatePhone(phone) {
        // Oman phone number format: +968 followed by 8 digits
        const phoneRegex = /^(\+968|968|00968)?\s?[79]\d{7}$/;
        return phoneRegex.test(phone.replace(/\s/g, ""));
    }

    function validatePassword() {
        const password = passwordInput.value;
        const errorElement = document.getElementById("passwordError");

        if (password.length < 8) {
            passwordInput.classList.add("error");
            errorElement.textContent =
                "يجب أن تحتوي كلمة المرور على 8 أحرف على الأقل";
            return false;
        }

        passwordInput.classList.remove("error");
        passwordInput.classList.add("success");
        errorElement.textContent = "";
        return true;
    }

    function validatePasswordMatch() {
        const password = passwordInput.value;
        const passwordConfirm = passwordConfirmInput.value;
        const errorElement = document.getElementById("passwordConfirmError");

        if (passwordConfirm && password !== passwordConfirm) {
            passwordConfirmInput.classList.add("error");
            errorElement.textContent = "كلمة المرور غير متطابقة";
            return false;
        }

        passwordConfirmInput.classList.remove("error");
        if (passwordConfirm) {
            passwordConfirmInput.classList.add("success");
        }
        errorElement.textContent = "";
        return true;
    }

    function validateTerms() {
        const errorElement = document.getElementById("termsError");

        if (!termsCheckbox.checked) {
            errorElement.textContent = "يجب الموافقة على الشروط والأحكام";
            return false;
        }

        errorElement.textContent = "";
        return true;
    }

    function clearFieldError(input) {
        input.classList.remove("error");
    }

    function handleValidationErrors(errors) {
        // Map Laravel error keys to input IDs
        const errorMap = {
            first_name: "firstNameError",
            last_name: "lastNameError",
            email: "emailError",
            phone: "phoneError",
            password: "passwordError",
            terms: "termsError",
        };

        for (const [field, messages] of Object.entries(errors)) {
            const errorId = errorMap[field];
            if (errorId) {
                const errorElement = document.getElementById(errorId);
                const inputElement = document.getElementById(
                    field === "first_name"
                        ? "firstName"
                        : field === "last_name"
                        ? "lastName"
                        : field
                );

                if (errorElement) {
                    errorElement.textContent = messages[0];
                }
                if (inputElement) {
                    inputElement.classList.add("error");
                }
            }
        }
    }

    // Helper functions
    function showError(message) {
        errorMessage.textContent = message;
        errorMessage.classList.add("show");
        successMessage.classList.remove("show");
    }

    function showSuccess(message) {
        successMessage.textContent = message;
        successMessage.classList.add("show");
        errorMessage.classList.remove("show");
    }

    function hideMessages() {
        errorMessage.classList.remove("show");
        successMessage.classList.remove("show");
    }

    function setLoading(loading) {
        registerButton.disabled = loading;
        if (loading) {
            registerButton.classList.add("loading");
        } else {
            registerButton.classList.remove("loading");
        }
    }

    // Social registration handlers
    const socialButtons = document.querySelectorAll(".social-btn");
    socialButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const text = this.textContent.trim().toLowerCase();
            const provider = text.includes("google") ? "google" : "facebook";
            window.location.href = `/register/${provider}`;
        });
    });
});
