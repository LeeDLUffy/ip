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
        function searchContacts() {
    var searchTerm = document.getElementById("searchInput").value;
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var contactsContainer = document.getElementById("contactsContainer");
            contactsContainer.innerHTML = xhr.responseText;
        }
    };
    xhr.open("GET", "search.php?searchTerm=" + searchTerm, true);
    xhr.send();
}
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
            <input type="text" id="searchInput" placeholder="Position or department name">
            <button onclick="searchContacts()">Search</button>
        </div>
        <div id="contactsContainer" class="contacts">
            <!-- Contacts will be dynamically loaded here -->
        </div>
    </div>
</body>
</html>