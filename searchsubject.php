<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>LumiLearnHub - Search Subject</title>
  <link rel="stylesheet" href="searchsubject.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>

  <div class="header-bar">
    <button class="back-button">BACK TO HOME</button>
    <img class="user-top-icon" src="image/LoginUser.png" alt="User Icon">
  </div>
    
    <div class="welcome-section">
    <h1 class="welcome-title">WELCOME STUDENT!</h1>
    <p class="description">
      We’re excited to have you here. This is your space to explore, learn, and grow at your own pace.
      You can find the right tutors, book sessions that suit your schedule, and keep track of your learning progress all in one convenient place.
      Whether you’re brushing up on a subject or aiming for top scores, LumiLearnHub is here to support every step of your journey.
      Let’s make the most of your time here and reach your goals together!
    </p>
    </div>

  <div class="container"></div>
  <div class="main-buttons">
  <button class="btn active">
    <img src="image/subject.png" alt="Explore Subject" style="width: 20px; vertical-align: middle; margin-right: 5px;">
    Explore Subject
  </button>
  <button class="btn" id="find-tutor-btn" >
    <img src="image/findtutor.png" alt="Find a Tutor" style="width: 20px; vertical-align: middle; margin-right: 5px;">
    Find a Tutor
  </button>
  <button class="btn" id="top-tutors-btn">
    <img src="image/toptutor.png" alt="Top Tutors" style="width: 20px; vertical-align: middle; margin-right: 5px;">
    Top Tutors
  </button>
  </div>

    <div class="search-bar">
      <input type="text" placeholder="Search Subject">
    </div>

  <div id="subject-info-modal" class="modal">
  <div class="modal-content">
    <span class="close-btn">&times;</span>
    <h2 id="subject-title">Subject Details</h2>
    <p><strong>Subject ID:</strong> <span id="subject-id"></span></p>
    <p><strong>Description:</strong> <span id="subject-description"></span></p>
    <button id="enroll-btn">Enroll</button>
  </div>
  </div>

 
    <div class="subject-section">
      <div class="subject-grid">
        <button class="subject-btn">Bahasa Melayu</button>
        <button class="subject-btn">English</button>
        <button class="subject-btn">Computer Science</button>
        <button class="subject-btn">Add Math</button>
        <button class="subject-btn">Biology</button>
        <button class="subject-btn">Math</button>
        <button class="subject-btn">Chemistry</button>
        <button class="subject-btn">Science</button>
        <button class="subject-btn">Physics</button>
        <button class="subject-btn">History</button>
        <button class="subject-btn">Geography</button>
        <button class="subject-btn">Moral Studies</button>
        <button class="subject-btn">Islamic Studies</button>
        <button class="subject-btn">Programming</button>
        <button class="subject-btn">Art</button>
        <button class="subject-btn">PE (Physical Ed)</button>
        <button class="subject-btn">Design & Tech</button>
        <button class="subject-btn">Literature</button>
        <button class="subject-btn">Economics</button>
        <button class="subject-btn">Account</button>
        <button class="subject-btn">Business</button>
        <button class="subject-btn">Music</button>
        <button class="subject-btn">Basic Math</button>
        <button class="subject-btn">Civics</button>
        <button class="subject-btn">ICT</button>
      </div>
    </div>

  
    <div class="right-buttons">
      <div class="right-btn" id="my-schedule-btn">
        <img src="image/calendaricon.png" alt="My Schedule">
        <span>My Schedule</span>
      </div>
      <div class="right-btn" id="my-subject-btn">
        <img src="image/subject.png" alt="My Subject">
        <span>My Subject</span>
      </div>
      <div class="right-btn" id="feedback-btn">
        <img src="image/feedbackicon.png" alt="Feedback">
        <span>Feedback</span>
      </div>
    </div>


  <footer>
    2025 LumiLearnHub. All rights reserved
</footer>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const subjectDetails = {
  "Bahasa Melayu": { id: "BM101", description: "Fundamentals of the Malay language and literature." },
  "English": { id: "ENG102", description: "Grammar, vocabulary, and composition in English." },
  "Computer Science": { id: "CS103", description: "Intro to programming, data structures, and algorithms." },
  "Add Math": { id: "AM104", description: "Advanced algebra, calculus, and trigonometry." },
  "Biology": { id: "BIO105", description: "Study of living organisms, cells, and systems." },
  "Math": { id: "MATH106", description: "Core math concepts: algebra, geometry, and statistics." },
  "Chemistry": { id: "CHEM107", description: "Chemical reactions, atoms, and periodic trends." },
  "Science": { id: "SCI108", description: "Integrated science: physics, chemistry, and biology." },
  "Physics": { id: "PHY109", description: "Motion, forces, energy, and electricity." },
  "History": { id: "HIS110", description: "Exploration of world and Malaysian history." },
  "Geography": { id: "GEO111", description: "Maps, landscapes, climate, and natural resources." },
  "Moral Studies": { id: "MOR112", description: "Values, ethics, and character building." },
  "Islamic Studies": { id: "ISL113", description: "Understanding Islamic principles and practices." },
  "Programming": { id: "PROG114", description: "Problem-solving through coding and logic." },
  "Art": { id: "ART115", description: "Creative expression through visual arts." },
  "PE (Physical Ed)": { id: "PE116", description: "Fitness, teamwork, and physical wellbeing." },
  "Design & Tech": { id: "DT117", description: "Basic technical drawing and hands-on design." },
  "Literature": { id: "LIT118", description: "Appreciating stories, poetry, and drama." },
  "Economics": { id: "ECO119", description: "Understanding markets, scarcity, and production." },
  "Account": { id: "ACC120", description: "Bookkeeping, financial statements, and audits." },
  "Business": { id: "BUS121", description: "Foundations of marketing, management, and entrepreneurship." },
  "Music": { id: "MUS122", description: "Rhythm, melody, and musical performance." },
  "Basic Math": { id: "BMATH123", description: "Arithmetic, fractions, and basic problem-solving." },
  "Civics": { id: "CIV124", description: "Roles of citizens, government, and community." },
  "ICT": { id: "ICT125", description: "Introduction to computers, software, and digital skills." }
};

  const searchInput = document.querySelector(".search-bar input");
  const subjectButtons = document.querySelectorAll(".subject-btn");

  const modal = document.getElementById("subject-info-modal");
  const closeBtn = document.querySelector(".close-btn");
  
  const subjectTitle = document.getElementById("subject-title");
  const subjectId = document.getElementById("subject-id");
  

  const subjectDescription = document.getElementById("subject-description");

subjectButtons.forEach(button => {
  button.addEventListener("click", function () {
    const subject = button.textContent.trim();
    if (subjectDetails[subject]) {
      subjectTitle.textContent = subject;
      subjectId.textContent = subjectDetails[subject].id;
      subjectDescription.textContent = subjectDetails[subject].description;
      modal.style.display = "block";
    }
  });
});

  document.getElementById("enroll-btn").addEventListener("click", function () {
    const subjectID = document.getElementById("subject-id").textContent;

    fetch("enroll_subject.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `subjectID=${subjectID}`
    })
    .then(response => response.text())
    .then(data => {
        alert(data); // Show response from PHP
    });

  closeBtn.addEventListener("click", function () {
    modal.style.display = "none";
  });

  window.addEventListener("click", function (event) {
    if (event.target === modal) {
      modal.style.display = "none";
    }
  });

  searchInput.addEventListener("input", function () {
    const filter = searchInput.value.trim().toLowerCase(); // Trim spaces
    subjectButtons.forEach(button => {
      const subjectName = button.textContent.trim().toLowerCase();
      
      // Check if subject starts with the input letter
      if (filter.length === 1 && subjectName.startsWith(filter)) {
        button.style.display = "block";
      } else {
        button.style.display = "none";
      }
    });

    // Show all subjects if input is empty
    if (filter === "") {
      subjectButtons.forEach(button => button.style.display = "block");
    }
  });


    document.querySelector(".back-button").addEventListener("click", function () {
        window.location.href = "studentinterface.html";
    });

    document.querySelector(".user-top-icon").addEventListener("click", function () {
      window.location.href = "profile2.html";
    });

    document.getElementById("find-tutor-btn").addEventListener("click", function () {
      window.location.href = "findtutor.html";
    });

    document.getElementById("top-tutors-btn").addEventListener("click", function () {
      window.location.href = "toptutors.html";
    });

    document.getElementById("my-schedule-btn").addEventListener("click", function () {
      window.location.href = "schedulestudent.html";
    });

    document.getElementById("my-subject-btn").addEventListener("click", function () {
      window.location.href = "subjectstudent.html";
    });

    document.getElementById("feedback-btn").addEventListener("click", function () {
      window.location.href = "feedbackstudent.html";
    });

    
  });
});
</script>

</body>
</html>
