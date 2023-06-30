<!DOCTYPE html>
<html>
<head>
    <title>Contacts</title>
    <style>
        body {
            background-image: url("img/jkuat.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script>
        function loadCampuses() {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var campusDropdown = document.getElementById("campusDropdown");
                    campusDropdown.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "load_campuses.php", true);
            xhr.send();
        }

        function searchContacts() {
            var searchTerm = document.getElementById("searchInput").value;
            var selectedCampus = document.getElementById("campusDropdown").value;
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    var contactsContainer = document.getElementById("contactsContainer");
                    contactsContainer.innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "search.php?searchTerm=" + searchTerm + "&selectedCampus=" + selectedCampus, true);
            xhr.send();
        }

        // Load campuses when the page is loaded
        window.onload = loadCampuses;
    </script>
</head>
<body>
    <header>
    <div class="logo">
            <img src="img/download.JPEG" alt="Institution Logo">
        </div>
        <div class="institution-info">
            <h1>JOMO KENYATTA UNIVERSITY OF AGRICULTURE AND TECHNOLOGY</h1>
            <p>Setting Trends in Higher Education, Research, Innovation and Entrepreneurship</p>
        </div>
    </header>

    <div class="container">
        <h2>Contact Information</h2>
        <div class="search">
            <select id="campusDropdown">
                <!-- Campus options will be dynamically loaded here -->
            </select>
            <input type="text" id="searchInput" placeholder="Position or department name">
            <button onclick="searchContacts()">Search</button>
        </div>
        <div id="contactsContainer" class="contacts">
            <!-- Contacts will be dynamically loaded here -->
        </div>
    </div>
</body>
</html>
