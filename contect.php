<?php
session_start(); 

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "contect_db";

$conn = new mysqli($servername, $username, $password, $database);

// Connection check
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submit hone ka check
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    // Check if all fields are filled
    if (!empty($name) && !empty($email) && !empty($message)) {
        // Data insert query
        $sql = "INSERT INTO message (name, email, message) VALUES ('$name', '$email', '$message')";

        if ($conn->query($sql) === TRUE) {
            
           
            $_SESSION['message_sent'] = true;

            
            header("Location: contect.php");
            exit;
        } else {
            echo "<script>alert('Error: " . $conn->error . "');</script>";
        }
    } else {
        echo "<script>alert('Please fill all fields.');</script>";
    }
}

$conn->close();
?>

<!--  Alert message sirf ek dafa show hoga -->
<?php
if (isset($_SESSION['message_sent'])) {
    echo "<script>alert('Message Sent Successfully!');</script>";
    unset($_SESSION['message_sent']); // 
}
?>



<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="author" content="Untree.co">
	<link rel="shortcut icon" href="favicon.png">

	<meta name="description" content="" />
	<meta name="keywords" content="bootstrap, bootstrap4" />

	<!-- Bootstrap CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
	<link href="css/tiny-slider.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<title>Furni Free Bootstrap 5 Template for Furniture and Interior Design Websites by Untree.co </title>



<style>
	.img-wrap {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100%;
}

.img-wrap img {
  max-width: 100%;
  height: 100%;
  border-radius: 1rem;
}



.form-container {
	
	
  max-width: 1200px;
  height: auto;
  margin: 0 auto;
  background: white;
  padding: 2rem;
  border-radius: 1rem;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  font-family: system-ui, -apple-system, sans-serif;
}

h1 {
  font-size: 2rem;
  text-align: center;
  margin-top: 1.5rem;
  color: #111827;
}

.form-group {
  margin-bottom: 1.5rem;
  position: relative;
}

label {
  display: block;
  margin-bottom: 0.5rem;
  font-weight: 500;
}

input,
textarea {
  width: 100%;
  padding: 0.75rem;
  border: 1px solid #d1d5db;
  border-radius: 0.5rem;
  font-size: 1rem;
  transition: all 0.15s ease;
}

input:focus,
textarea:focus {
  outline: none;
  border-color: var(--primary);
  box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}

.error-message {
  color: var(--error);
  font-size: 0.875rem;
  margin-top: 0.25rem;
  display: none;
}

.validation-icon {
  position: absolute;
  right: 1rem;
  top: 2.5rem;
  display: none;
}

.validation-icon.success {
  color: var(--success);
  display: block;
}

.validation-icon.error {
  color: var(--error);
  display: block;
}

input.success,
textarea.success {
  border-color: var(--success);
}

input.error,
textarea.error {
  border-color: var(--error);
}

.checkbox-group {
  display: flex;
  align-items: start;
  gap: 0.75rem;
  margin-top: 1rem;
}

.checkbox-group input[type="checkbox"] {
  width: auto;
  margin-top: 0.25rem;
}

.checkbox-group label {
  font-size: 0.875rem;
  color: var(--gray);
}

button {
  background: black;
  color: white;
  padding: 0.75rem 1.5rem;
  border: none;
  border-radius: 0.5rem;
  font-size: 1rem;
  font-weight: 500;
  cursor: pointer;
  transition: background-color 0.15s ease;
 
}

button:hover {
  background: rgb(110, 110, 110);
}

.privacy-notice {
  font-size: 0.875rem;
  color: var(--gray);
  margin-top: 2rem;
  padding-top: 1rem;
  border-top: 1px solid #e5e7eb;
}



    /* Centering the map */
	#map {
            height: 500px;
            width: 800px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.49);
        }
        .map-container {
            position: relative;
			top:5rem;
            display: flex;
            justify-content: center;
            align-items: center;
			margin:auto;
			width:90vw;
            height: 80vh;
        }


    </style>

</head>

<body>

	<!-- Start Header/Navigation -->
	<nav class="custom-navbar navbar navbar-expand-md navbar-dark bg-dark" aria-label="Furni navigation bar">
		<div class="container">

			<a class="navbar-brand" href="index.html"
				style="margin-left: 20px; display: flex; align-items: center; gap: 8px;">
				<!-- Logo Image -->
				<img src="images/logo.png" alt="Logo" style="width: 70px; height: 60px;">
				<!-- Artify Text -->
				<span style="font-family: 'Pacifico', cursive; font-size: 24px;">Artify</span>
			</a>

			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsFurni"
				aria-controls="navbarsFurni" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarsFurni">
				<ul class="custom-navbar-nav navbar-nav ms-auto mb-2 mb-md-0">
					<li class="nav-item active">
						<a class="nav-link" href="index.html">Home</a>
					</li>
					<li><a class="nav-link" href="shop.html">Shop</a></li>
					<li><a class="nav-link" href="about.html">About us</a></li>
					<li><a class="nav-link" href="services.html">Services</a></li>
					<li><a class="nav-link" href="blog.html">Blog</a></li>
					<li><a class="nav-link" href="contact.html">Contact us</a></li>
				</ul>

				<ul class="custom-navbar-cta navbar-nav mb-2 mb-md-0 ms-5">

					<li class="nav-item">
						<button class="btn-search btn bg-transparent p-0" data-bs-toggle="modal"
							data-bs-target="#searchModal">
							<i class="fas fa-search"></i>
						</button>
					</li>
					<li class="nav-item">
						<a class="nav-link p-0" href="#"><img src="images/user.svg"></a>
					</li>
					<li class="nav-item">
						<a class="nav-link p-0" href="cart.html"><img src="images/cart.svg"></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- End Header/Navigation -->

	<!-- Modal Search Start -->
	<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-fullscreen">
			<div class="modal-content rounded-0">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body d-flex align-items-center">
					<div class="input-group w-75 mx-auto d-flex">
						<input type="search" class="form-control p-3" placeholder="keywords"
							aria-describedby="search-icon-1">
						<span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal Search End -->

	<!-- Start Contact Us Hero Section -->
	<div class="hero"
		style="background: linear-gradient(to right, rgba(0, 0, 0, 0.37), rgba(0, 0, 0, 0.5)), url('images/contect2.webp'); background-size: cover; background-position: center; color: white; padding: 150px 0; min-height: 80vh;" >
		<div class="container">
			<div class="row justify-content-between align-items-center">
				<div class="col-lg-6">
				<div class="intro-excerpt" style="margin-top: 50px; text-align: center;">
    <p class="mb-4" style="font-size: 3rem; color: white; position: absolute; top: 20rem; width: 80%; left: 10%; font-family: 'Poppins', sans-serif; word-wrap: break-word; line-height: 2;">
        <span id="animated-text"></span>
    </p>
</div>

<script>
 const text = `Need help? We're here to assist you!`;  

    let i = 0;
    function typeEffect() {
        if (i < text.length) {
            let char = text.charAt(i) === "\n" ? "<br>" : text.charAt(i);
            document.getElementById("animated-text").innerHTML += char;
            i++;
            setTimeout(typeEffect, 50);
        }
    }
    window.onload = typeEffect;
</script>

				</div>
			</div>
		</div>
	</div>
	<!-- End Contact Us Hero Section -->

<!-- Start We Help Section -->
<div class="we-help-section" style=" position: relative;
			top:5rem;">
					<div class="container">
						<div class="row justify-content-between">
							<div class="col-lg-7 mb-5 mb-lg-0">
								<div class="imgs-grid" data-aos="fade-up"
								data-aos-duration="3000">
									<div class="grid grid-1"><img src="images/greeting card2.jpg" alt="Untree.co"></div>
									<div class="grid grid-2"><img src="images/doll3.webp" alt="Untree.co"></div>
									<div class="grid grid-3"><img src="images/beauty.jpg" alt="Untree.co"></div>
								</div>
							</div>
							<div class="col-lg-5 ps-lg-5">
								<h2 class="section-title mb-4" style="color: #3b5d50 ;">We Help You Create a Modern &
									Stylish Interior</h2>
								<p>Transform your space with artistic elegance and timeless charm. Whether you're
									decorating your home or workspace, our handpicked collection adds a touch of
									creativity and sophistication.</p>

								<ul class="list-unstyled custom-list my-4">
									<li><strong style="color: black;">✔ Premium Craftsmanship </strong>– Each piece is
										designed to blend seamlessly with modern interiors.</li>
									<li><strong style="color: black;">✔ Versatile & Aesthetic</strong> – From wall art
										to décor essentials, find products that suit every style.</li>
							

								</ul>
								<a href="shop.html">
									<button class="btn">
										Shop Now
									</button>
								</a>
							</div>
						</div>
					</div>
				</div>
				<!-- End We Help Section -->

	<!-- Start Contact Form -->
	<h1>Contact Form</h1>

<div class="form-container">

  
  <div class="row">
    <div class="col-lg-7">
	<form class="contact-form" id="contactForm" method="post">
    <div class="form-group">
        <label for="name">Full Name *</label>
        <input type="text" id="name" name="name" required>
        <span class="validation-icon">✓</span>
        <div class="error-message" id="nameError">Please enter your full name</div>
    </div>

    <div class="form-group">
        <label for="email">Email Address *</label>
        <input type="email" id="email" name="email" required>
        <span class="validation-icon">✓</span>
        <div class="error-message" id="emailError">Please enter a valid email address</div>
    </div>

    <div class="form-group">
        <label for="message">Message *</label>
        <textarea id="message" name="message" rows="4" required></textarea>
        <span class="validation-icon">✓</span>
        <div class="error-message" id="messageError">Please enter your message</div>
    </div>

	<div class="checkbox-group">
          <input type="checkbox" id="marketing" name="marketing">
          <label for="marketing">
            I would like to receive marketing communications about your products and services
          </label>
        </div>

    <button type="submit">Submit Form</button>
</form>

    </div>
    <div class="col-lg-5">
      <div class="img-wrap">
        <img src="images/shop.jpg" alt="Image" class="img-fluid">
      </div>
    </div>
  </div>
</div>
<!-- End Contact Form -->


    <!-- // Validation functions -->
<script>
const validators = {
  name: (value) => value.trim().length >= 2,
  email: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
  message: (value) => value.trim().length >= 10
};

// Debounce function to limit validation frequency
function debounce(func, wait) {
  let timeout;
  return function executedFunction(...args) {
    const later = () => {
      clearTimeout(timeout);
      func(...args);
    };
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
  };
}

// Function to update field status
function updateFieldStatus(field, isValid) {
  const errorElement = document.getElementById(`${field.id}Error`);
  const validationIcon = field.parentElement.querySelector(".validation-icon");

  field.classList.remove("success", "error");
  field.classList.add(isValid ? "success" : "error");

  if (validationIcon) {
    validationIcon.textContent = isValid ? "✓" : "✗";
    validationIcon.classList.remove("success", "error");
    validationIcon.classList.add(isValid ? "success" : "error");
  }

  if (errorElement) {
    errorElement.style.display = isValid ? "none" : "block";
  }
}

// Progressive validation handler
const validateField = debounce((field) => {
  if (field.type === "checkbox") return;

  const validator = validators[field.id];
  if (!validator) return;

  const isValid = validator(field.value);
  updateFieldStatus(field, isValid);
}, 300);

// Add validation listeners to form fields
document
  .querySelectorAll('input[type="text"], input[type="email"], textarea')
  .forEach((field) => {
    field.addEventListener("input", () => validateField(field));
    field.addEventListener("blur", () => validateField(field));
  });

// Form submission handler
document.getElementById("gdprForm").addEventListener("submit", function (e) {
  e.preventDefault();

  let hasErrors = false;

  // Validate all fields
  Object.entries(validators).forEach(([fieldName, validator]) => {
    const field = document.getElementById(fieldName);
    const isValid = validator(field.value);
    updateFieldStatus(field, isValid);
    if (!isValid) hasErrors = true;
  });

  // Validate consent
  const consent = document.getElementById("dataConsent");
  if (!consent.checked) {
    document.getElementById("consentError").style.display = "block";
    hasErrors = true;
  } else {
    document.getElementById("consentError").style.display = "none";
  }

  if (!hasErrors) {
    // Collect form data
    const formData = {
      name: document.getElementById("name").value,
      email: document.getElementById("email").value,
      message: document.getElementById("message").value,
      dataConsent: consent.checked,
      marketing: document.getElementById("marketing").checked
    };

    // Here you would typically send the data to your server
    console.log("Form data:", formData);

    // Show success message
    document.getElementById("successMessage").style.display = "block";

    // Reset form and validation states
    this.reset();
    document.querySelectorAll(".validation-icon").forEach((icon) => {
      icon.classList.remove("success", "error");
      icon.style.display = "none";
    });
    document.querySelectorAll("input, textarea").forEach((field) => {
      field.classList.remove("success", "error");
    });

    // Hide success message after 5 seconds
    setTimeout(() => {
      document.getElementById("successMessage").style.display = "none";
    }, 5000);
  }
});
</script>
	<!-- End Contact Form -->

<!-- Google Map -->
<div class="map-container">
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26466167.642274346!2d60.8729730150764!3d30.375321060377687!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38db52d359db9c05%3A0x1d01a3e4c79cba9d!2sPakistan!5e0!3m2!1sen!2s!4v1710480000000" 
        width="800" 
        height="500" 
        style="border:0; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>
</div>
<!-- Google Map End -->



	



	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/tiny-slider.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>