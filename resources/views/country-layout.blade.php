<!-- resources/views/myanmar-layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: black;

        }
        

        .cover-image img {
            height: 100px;
            position: absolute;
            top: 20px;
            left: 15px;
        }
        
/* Gradient Overlay */
        .cover-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(0, 0, 0, 1)); /* Gradient overlay */
        }
        /* Basic styling for the back button */
        /* Ensure the cover-image container is positioned relatively */
        /* Ensure the cover-image container is positioned relatively */
        /* Ensure the cover-image container is positioned relatively */
        .cover-image {
            position: relative; /* Required for absolute positioning of the child */
            width: 100%; /* Adjust as needed */
            height: 300px; /* Adjust as needed */
            background-color: #333; /* Dark background for contrast */
        }
        .cover-text {
            position: absolute;
            top: 55%; /* Push it up higher */
            left: 60px; /* Distance from left edge */
            color: white;
            z-index: 2;
            max-width: 50%;
            text-align: left;
        }


        .cover-text h1 {
            font-size: 36px;
            margin: 0 0 10px;
        }

        .cover-text p {
            font-size: 18px;
            line-height: 1.4;
            margin: 0;
        }

        /* Style the back button */
        .back-button {
            position: absolute; /* Position the button absolutely within the cover-image */
            top: 40%; /* Distance from the top */
            left: 5%; /* Distance from the left */
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px; /* Circle size */
            height: 40px; /* Circle size */
            border: 2px solid white; /* White hollow border */
            border-radius: 50%; /* Make it circular */
            text-decoration: none; /* Remove underline */
            color: white; /* White arrow color */
            font-size: 20px; /* Adjust icon size */
            transition: all 0.3s ease; /* Smooth transition */
        }

        /* Hover effect */
        .back-button:hover {
            background-color: rgba(255, 255, 255, 0.1); /* Light white background on hover */
            border-color: rgba(255, 255, 255, 0.8); /* Slightly transparent border on hover */
            color: rgba(255, 255, 255, 0.8); /* Slightly transparent arrow color on hover */
            transform: scale(1.1); /* Slightly scale up the button */
        }

        /* Optional: Add a box shadow on hover for a more pronounced effect */
        .back-button:hover {
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.2);
        }
        .container {
            display: flex;
            width: 100%;
            max-width: 1300px; /* Adjust as needed */
            margin-top: 20px;

            
        }
        /* Side Nav Container */
.side-nav {
    width: 30%;
    position: sticky;
    top: 40%;
    align-self: flex-start;
    background-color:rgb(0, 0, 0); /* Dark background for side nav */
    padding: 20px;
    border-radius: 10px;
}

/* List Reset */
.side-nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

/* Side Nav List Items */
.side-nav ul li {
    margin: 10px 0;
    position: relative;
}

/* White bullet points with color indicators */


/* Nav Item Link Styling */
.side-nav ul li a {
    display: block;
    padding: 10px 15px;
    text-decoration: none;
    font-size: 18px;
    color: white;
    border-radius: 8px;
    transition: all 0.3s ease;
    opacity: 0.7;
}

/* Hover Effect */
.side-nav ul li a:hover {
    background-color: #333;
    opacity: 1;
}

/* Active Nav Item */
.side-nav ul li a.active {
    background-color:rgb(99, 94, 94); /* Example active color */
    color: white;
    font-weight: bold;
    opacity: 1;
}

        .content {
            width: 75%;
            margin-left: 5%; /* Space between side nav and content */
        }
        .content-section {
            margin-bottom: 110px;
        }
        .content-section img {
            width: 850px;
            height: auto;
        }
        .content-section iframe {
            width: 900px;
            height: 400px; /* Adjust height as needed */
            border: none;
            border-radius: 10px;
        }
        .content-section h2 {
            margin: 20px 0 20px;
            font-size: 24px;
            color: #FFFFFF;
        }
        .content-section p {
            font-size: 16px;
            color:  #FFFFFF;
            line-height: 1.6;
        }
        .additional-images {
            display: flex;
            gap: 15px; /* Space between images */
            margin-top: 15px;
        }

/* Style for individual images */
        .additional-images img {
            width: 50%; /* Make them take half the width each */
            max-width: 420px; /* Optional: Set a maximum width */
            object-fit: cover; /* Optional: Crop images to cover their box */
        }
    </style>
</head>
<body>
    <!-- Cover Image -->
   

    <div class="cover-image">
    <img src="{{ asset('img/logo.png') }}" alt="CWB Logo">

    <a href="{{ url('/') }}" class="back-button">
        <i class="fas fa-arrow-left"></i> <!-- Font Awesome arrow icon -->
    </a>

    <div class="cover-text">
        <h1>@yield('cover-title')</h1>
        <p>@yield('cover-paragraph')</p>
    </div>
</div>
    <!-- Container for Side Nav and Content -->
    <div class="container">
        <!-- Side Navigation -->
        <div class="side-nav">
    <ul>
        @foreach($contents as $content)
            <li>
                <a href="#{{ $content->section_id }}" class="{{ $loop->first ? 'active' : '' }}">
                    {{ $content->side_nav_link_name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>

        <!-- Content -->
        <div class="content">
            @yield('content')
        </div>
    </div>

    <!-- Smooth Scrolling Script -->
    <script>
          // Fade-in effect on page load
          document.addEventListener("DOMContentLoaded", function () {
            document.body.style.opacity = "1";
            document.querySelector(".container").style.opacity = "1";
            document.querySelector(".container").style.transform = "translateY(0)";
        });
        document.querySelectorAll('.side-nav a').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const targetId = this.getAttribute('href').substring(1);
                const targetSection = document.getElementById(targetId);
                targetSection.scrollIntoView({ behavior: 'smooth' });
            });
        });
        
            // Function to check which section is in view
            document.addEventListener('DOMContentLoaded', function () {
            const sideNavLinks = document.querySelectorAll('.side-nav a');
            const contentSections = document.querySelectorAll('.content-section');

            function updateActiveNav() {
                contentSections.forEach((section, index) => {
                    const rect = section.getBoundingClientRect();
                    if (rect.top <= window.innerHeight / 2 && rect.bottom >= window.innerHeight / 3) {
                        sideNavLinks.forEach(link => {
                            link.classList.remove('active');
                            link.style.opacity = '0.5';
                        });

                        sideNavLinks[index].classList.add('active');
                        sideNavLinks[index].style.opacity = '1';
                    }
                });
            }

            let isScrolling;
            window.addEventListener('scroll', function () {
                window.clearTimeout(isScrolling);
                isScrolling = setTimeout(updateActiveNav, 30);
            });

            updateActiveNav();
        });
    </script>
</body>
</html>