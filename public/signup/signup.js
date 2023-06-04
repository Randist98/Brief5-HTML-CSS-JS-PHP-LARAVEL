document.addEventListener('DOMContentLoaded', () => {
    const signUpButton = document.getElementById('signUp');
    const signUp1Button = document.getElementById('signUp1');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
      container.classList.add('right-panel-active');
    });

    signUp1Button.addEventListener('click', () => {
      container.classList.add('right-panel-active-lessor');
    });

    signInButton.addEventListener('click', () => {
      container.classList.remove('right-panel-active');
      container.classList.remove('right-panel-active-lessor');
    });

  // Form validation for sign up
  const signupForm = document.getElementById('signup-form');
  signupForm.addEventListener('submit', (e) => {
      e.preventDefault();
      validateSignUpForm();
  });

  function validateSignUpForm() {
    const nameInput = document.getElementById('name-sign');
    const emailInput = document.getElementById('email-sign');
    const passwordInput = document.getElementById('password-sign');
    const confirmPasswordInput = document.getElementById('conf-Password');
    const nameError = document.getElementById('name-error');
    const emailError = document.getElementById('email-error-sign');
    const passwordError = document.getElementById('password-error-sign');
    const confirmPasswordError = document.getElementById('conf-password-error-sign');

    // Reset error messages
    nameError.textContent = '';
    emailError.textContent = '';
    passwordError.textContent = '';
    confirmPasswordError.textContent = '';

    let isValid = true;

    // Validate name
    if (nameInput.value.trim() === '') {
        nameError.textContent = 'Please enter your name';
        isValid = false;
    }

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailInput.value.trim() === '') {
        emailError.textContent = 'Please enter your email';
        isValid = false;
    } else if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Please enter a valid email address';
        isValid = false;
    }

    // Validate password
    if (passwordInput.value === '') {
        passwordError.textContent = 'Please enter your password';
        isValid = false;
    }

    // Validate confirm password
    if (confirmPasswordInput.value === '') {
        confirmPasswordError.textContent = 'Please confirm your password';
        isValid = false;
    } else if (confirmPasswordInput.value !== passwordInput.value) {
        confirmPasswordError.textContent = 'Passwords do not match';
        isValid = false;
    }

    if (isValid) {
        // Submit the form
        signupForm.submit();
    }
    console.log('Sign Up form validation');
  }

  // Form validation for sign up as lessor
  const signupLessorForm = document.getElementById('lessor-signup-form');
  signupLessorForm.addEventListener('submit', (e) => {
    e.preventDefault();
    validateLessorForm();
  });

  function validateLessorForm() {
    const nameInput = document.getElementById('name-sign-lessor');
    const emailInput = document.getElementById('email-sign-lessor');
    const passwordInput = document.getElementById('password-sign-lessor');
    const confirmPasswordInput = document.getElementById('conf-Password-lessor');
    const nameError = document.getElementById('name-error-lessor');
    const emailError = document.getElementById('email-error-sign-lessor');
    const passwordError = document.getElementById('password-error-sign-lessor');
    const confirmPasswordError = document.getElementById('conf-password-error-sign-lessor');

    // Reset error messages
    nameError.textContent = '';
    emailError.textContent = '';
    passwordError.textContent = '';
    confirmPasswordError.textContent = '';

    let isValid = true;

    // Validate name
    if (nameInput.value.trim() === '') {
      nameError.textContent = 'Please enter your name';
      isValid = false;
    }

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailInput.value.trim() === '') {
      emailError.textContent = 'Please enter your email';
      isValid = false;
    } else if (!emailRegex.test(emailInput.value)) {
      emailError.textContent = 'Please enter a valid email address';
      isValid = false;
    }

    // Validate password
    if (passwordInput.value === '') {
      passwordError.textContent = 'Please enter your password';
      isValid = false;
    }

    // Validate confirm password
    if (confirmPasswordInput.value === '') {
      confirmPasswordError.textContent = 'Please confirm your password';
      isValid = false;
    } else if (confirmPasswordInput.value !== passwordInput.value) {
      confirmPasswordError.textContent = 'Passwords do not match';
      isValid = false;
    }

    if (isValid) {
      // Submit the form
      document.getElementById('form-container signup-lessor-form').submit()
    }
    console.log('Sign Up as Lessor form validation');
  }

  // Form validation for sign in
  const loginForm = document.getElementById('login-form');
  loginForm.addEventListener('submit', (e) => {
      e.preventDefault();
      validateLoginForm();
  });

  function validateLoginForm() {
    const emailInput = document.getElementById('floatingInputSignIn');
    const passwordInput = document.getElementById('password-login');
    const emailError = document.getElementById('email-error-login');
    const passwordError = document.getElementById('password-error-login');

    // Reset error messages
    emailError.textContent = '';
    passwordError.textContent = '';

    let isValid = true;

    // Validate email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (emailInput.value.trim() === '') {
        emailError.textContent = 'Please enter your email';
        isValid = false;
    } else if (!emailRegex.test(emailInput.value)) {
        emailError.textContent = 'Please enter a valid email address';
        isValid = false;
    }

    // Validate password
    if (passwordInput.value === '') {
        passwordError.textContent = 'Please enter your password';
        isValid = false;
    }

    if (isValid) {
        // Submit the form
        loginForm.submit();
    }
    console.log('Sign In form validation');
  }
});
