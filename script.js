// Handle Login
function handleLogin(event) {
  event.preventDefault(); // Prevent the form from submitting the traditional way
  
  // Simulate login credentials
  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;
  
  if (username === "user" && password === "password") {
    // Redirect to home page if credentials are correct
    window.location.href = "home.html";
  } else {
    alert("Invalid username or password. Please try again.");
  }
}
