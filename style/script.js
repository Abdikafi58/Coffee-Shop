// script.js

// Login form validation
document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    if (username === 'user' && password === 'password') {
        alert('Login successful!');
        window.location.href = 'index.html'; // Redirect to home page
    } else {
        alert('Invalid username or password.');
    }
});

// Order form submission
document.getElementById('order-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const coffeeType = document.getElementById('coffee-type').value;
    const quantity = document.getElementById('quantity').value;

    alert(`You have ordered ${quantity} ${coffeeType}(s).`);
});

// Contact form submission
document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const message = document.getElementById('message').value;

    alert(`Thank you, ${name}! We have received your message: "${message}"`);
});
