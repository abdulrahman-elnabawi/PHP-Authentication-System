const token = localStorage.getItem("token");

if (!token) {
    window.location.href = "C:\\xampp\\htdocs\\newproject\\html\\login.html";
}

fetch("http://localhost/newproject/api/profile.php", {
    method: "GET",
    headers: {
        "Authorization": "Bearer " + token
    }
})
.then(res => res.json())
.then(result => {

    if (result.status === "success") {
        const user = result.user;
        document.getElementById("userData").innerText =
            "Name: " + user.name + " | Email: " + user.email;
    } else {
        window.location.href = "C:\\xampp\\htdocs\\newproject\\html\\login.html";
    }
});

function logout() {
    localStorage.removeItem("token");
    window.location.href = "C:\\xampp\\htdocs\\newproject\\html\\login.html";
}