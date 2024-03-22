// Character count functionality
document.addEventListener("DOMContentLoaded", function () {
    var messageInput = document.getElementById("message");
    var charCount = document.getElementById("charCount");
    var maxLength = 200; // Maximum character limit

    messageInput.addEventListener("input", function () {
        var currentLength = messageInput.value.length;
        var remainingChars = maxLength - currentLength;

        charCount.textContent = remainingChars + " characters remaining";

        if (remainingChars == 0) {
            document.getElementById("charCount").style.color = "red";
        }
        else {
            document.getElementById("charCount").style.color = "gray";
        }
    });
});

// Alphabetically sort skills list
document.addEventListener("DOMContentLoaded", function () {
    const skillsList = document.querySelector('.skills-list');
    const skillsItems = Array.from(skillsList.children);

    skillsItems.sort((a, b) => a.textContent.localeCompare(b.textContent));

    skillsList.innerHTML = '';

    skillsItems.forEach(item => {
        skillsList.appendChild(item);
    });
});
