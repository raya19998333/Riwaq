// Login Form Handler
document.addEventListener("DOMContentLoaded", function () {
    const loginForm = document.getElementById("loginForm");
    const emailInput = document.getElementById("email");
    const passwordInput = document.getElementById("password");
    const loginButton = document.querySelector(".btn-login");
    const errorMessage = document.getElementById("errorMessage");

    // Form submission handler
    loginForm.addEventListener("submit", async function (e) {
        e.preventDefault();

        // Clear previous errors
        hideError();

        // Get form data
        const email = emailInput.value.trim();
        const password = passwordInput.value;
        const remember = document.getElementById("remember").checked;

        // Basic validation
        if (!email || !password) {
            showError("يرجى إدخال البريد الإلكتروني وكلمة المرور");
            return;
        }

        if (!isValidEmail(email)) {
            showError("يرجى إدخال بريد إلكتروني صحيح");
            return;
        }

        // Show loading state
        setLoading(true);

        try {
            // Get CSRF token from meta tag
            const csrfToken = document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content");

            // Make login request
            const response = await fetch("/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                    Accept: "application/json",
                },
                body: JSON.stringify({
                    email: email,
                    password: password,
                    remember: remember,
                }),
            });

            const data = await response.json();

            if (response.ok) {
                // Success - redirect to dashboard
                window.location.href = data.redirect || "/dashboard";
            } else {
                // Show error message
                showError(
                    data.message || "البريد الإلكتروني أو كلمة المرور غير صحيحة"
                );
            }
        } catch (error) {
            console.error("Login error:", error);
            showError("حدث خطأ في الاتصال. يرجى المحاولة مرة أخرى");
        } finally {
            setLoading(false);
        }
    });

    // Input validation on blur
    emailInput.addEventListener("blur", function () {
        if (this.value && !isValidEmail(this.value)) {
            this.style.borderColor = "var(--error-color)";
        } else {
            this.style.borderColor = "var(--border-color)";
        }
    });

    // Clear error on input
    emailInput.addEventListener("input", hideError);
    passwordInput.addEventListener("input", hideError);

    // Helper functions
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function showError(message) {
        errorMessage.textContent = message;
        errorMessage.classList.add("show");
    }

    function hideError() {
        errorMessage.classList.remove("show");
    }

    function setLoading(loading) {
        loginButton.disabled = loading;
        if (loading) {
            loginButton.classList.add("loading");
        } else {
            loginButton.classList.remove("loading");
        }
    }

    // Social login handlers
    const socialButtons = document.querySelectorAll(".social-btn");
    socialButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const provider = this.textContent.toLowerCase();
            // Redirect to social login endpoint
            window.location.href = `/login/${provider}`;
        });
    });
});
