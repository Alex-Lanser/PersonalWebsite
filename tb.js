document.getElementById('submit-btn').addEventListener('click', function () {
    // Simulating message sending
    // Replace this code with your actual message sending logic
    setTimeout(function () {
        // Message sent, hide the inputs and textarea
        var nameInput = document.getElementById('name');
        var emailInput = document.getElementById('email');
        var messageInput = document.getElementById('message');

        nameInput.style.visibility = 'hidden';
        emailInput.style.visibility = 'hidden';
        messageInput.style.visibility = 'hidden';
    }, 2000); // Delay of 2 seconds, replace with your desired delay
});
