document.getElementById("loginForm").addEventListener("submit", function(e) {
    e.preventDefault();

    const data = {
        email: document.getElementById("email").value,
        password: document.getElementById("password").value
    };

    fetch("http://localhost/newproject/api/login.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(data)
    })
    .then(res => res.json())
    .then(result => {

        if (result.status === "success") {

           
            localStorage.setItem("token", result.token);

            document.getElementById("message").innerText = "Login successful";

          
            window.location.href = "C:\\xampp\\htdocs\\newproject\\html\\profile.html";

        } else {
            document.getElementById("message").innerText = result.message;
        }
    })
    .catch(err => console.error(err));
});