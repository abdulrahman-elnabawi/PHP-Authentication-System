document.getElementById("registerForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const data = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        password: document.getElementById("password").value
    };

    fetch("http://localhost/newproject/api/register.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(result => {
        document.getElementById("message").innerText = result.message;
    })
    .catch(err => console.error(err));
});