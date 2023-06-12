
<?php include 'includes/header.php'; ?>
<style>
@font-face {
    font-family: 'Opensans';
    src: url('./components/Open_Sans/opensans.ttf') format('truetype');
  /* Add additional src declarations for different font file formats if available */
}

@import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;500;800&display=swap');

body {

}
input {
  border: none;
  outline: none;
  border-radius: 10px;
  padding: 0.5em;
  background-color: #ccc;
  box-shadow: inset 1px 3px 7px rgba(0,0,0,0.3);
  transition: 200ms ease-in-out;
}

input:focus {
  background-color: white;
  /* transform: scale(1.02); */
  box-shadow: 3px 3px 50px #969696,
             -3px -3px 50px #ffffff;
}
.mbody
	{
        /* font-family:Times; */
    font-family: 'Open sans', Arial, sans-serif;

		margin: 20px;
        background-image:url(./static/images/start.jpg);
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
        height: 100%;
	}
    .ma{
        color: white;
    }
    .ma:hover{
        color: aliceblue;
    }
    .front-div{
        height: 500px;
        text-align: center;
        color: white;
    }
    .intro{
        /* font-family:Verdana, Geneva, Tahoma, sans-serif; */
        font-weight:800;
        font-size: larger;
        text-shadow: 2px 2px 2px #000;
    }
    .containerr {
  position: relative;
  padding: 20px;
}

.containerr:before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  backdrop-filter: blur(1px); /* Adjust the blur value as needed */
  background-color: rgba(255, 255, 255, 0.2); /* Adjust the opacity as needed */
  z-index: -1;
}
#GoToTopBtn{
  position: fixed;
  top: 20px;
  right: 20px;
  z-index: 999;
  color:white;
  background: rgba(171, 167, 167, 0.24);
}
</style>
<body class="mbody bg-warning">


<div class="btn-group" id="GoToTopBtn">
  <button type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
  ≣
  </button>
  <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="user_login.php">User</a></li>
            <li><a class="dropdown-item" href="Labour/lb_login.php">Labour</a></li>
            <li><a class="dropdown-item" href="Admin/admin_login.php">Admin</a></li>
  </ul>
</div>
<div >


    <div class="container  d-flex flex-column justify-content-center align-items-center mb-auto front-div">
        <div class=" col-lg-10 text-center">

            <p class="fs-1 intro">Labours Management System</p>
            <p class="intro">Simplify your task assignment processes with our intuitive tools. Our system enables you to hire and track works effortlessly, ensuring optimal coverage and minimizing conflicts. Allocate tasks and monitor progress, all in one centralized platform.</p>
        
        </div>
    </div>
</div>
</body>
</html>