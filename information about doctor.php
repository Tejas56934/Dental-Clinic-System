<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Page</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #2C3E50, #3498DB);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
        }

        header {
            text-align: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.7);
        }

        h1 {
            margin: 0;
            font-size: 2.5em;
            color: #ffcc00;
        }

        main {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 100px);
            padding: 20px;
        }

        .card {
            background-color: rgba(0, 0, 0, 0.8);
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            padding: 20px;
            max-width: 80%;
            width: 900px;
            display: flex;
            flex-direction: row;
            align-items: center;
            gap: 20px;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .doctor-info {
            flex: 1;
        }

        .doctor-info h2 {
            margin: 0;
            font-size: 1.8em;
            color: #ffcc00;
        }

        .doctor-info p {
            font-size: 1.2em;
            margin: 10px 0;
        }

        .doctor-image {
            flex: 1;
            text-align: center;
        }

        .doctor-image img {
            width: 100%;
            max-width: 300px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }

        .navigation {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .arrow {
            font-size: 2em;
            color: #ffcc00;
            cursor: pointer;
            transition: color 0.3s;
        }

        .arrow:hover {
            color: white;
        }

        footer {
            text-align: center;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
        }
    </style>
</head>
<body>

<header>
    <h1>Meet Our Doctors</h1>
</header>

<main>
    <div class="card">
        <div class="doctor-info" id="doctor-info">
            <!-- Doctor details will be dynamically loaded here -->
        </div>
        <div class="doctor-image" id="doctor-image">
            <!-- Doctor image will be dynamically loaded here -->
        </div>
    </div>
    <div class="navigation">
        <span class="arrow" id="prev-arrow">&#8592;</span>
        <span class="arrow" id="next-arrow">&#8594;</span>
    </div>
</main>


<script>
    const doctors = [
        {
            name: "Dr. Alice Johnson",
            education: "BDS, Harvard University",
            about: "Dr. Johnson specializes in cosmetic dentistry and has over 10 years of experience in smile makeovers.",
            image: "https://randomuser.me/api/portraits/women/65.jpg"
        },
        {
            name: "Dr. Michael Brown",
            education: "BDS, University of California, San Francisco",
            about: "Dr. Brown focuses on pediatric dentistry, ensuring every child has a positive dental experience.",
            image: "https://randomuser.me/api/portraits/men/43.jpg"
        },
        {
            name: "Dr. Emily Davis",
            education: "BDS, University of Michigan",
            about: "Dr. Davis is an expert in endodontics and has successfully treated over 5,000 root canal cases.",
            image: "https://randomuser.me/api/portraits/women/82.jpg"
        },
        {
            name: "Dr. James Smith",
            education: "BDS, University of Pennsylvania",
            about: "Dr. Smith excels in oral surgery and implantology with a passion for patient care.",
            image: "https://randomuser.me/api/portraits/men/12.jpg"
        },
        {
            name: "Dr. Sophia Martinez",
            education: "BDS, Columbia University",
            about: "Dr. Martinez is a leading orthodontist, transforming smiles with precision and care.",
            image: "https://randomuser.me/api/portraits/women/22.jpg"
        }
    ];

    let currentDoctorIndex = 0;

    const doctorInfoDiv = document.getElementById('doctor-info');
    const doctorImageDiv = document.getElementById('doctor-image');
    const prevArrow = document.getElementById('prev-arrow');
    const nextArrow = document.getElementById('next-arrow');

    function displayDoctor(index) {
        const doctor = doctors[index];
        doctorInfoDiv.innerHTML = `
            <h2>${doctor.name}</h2>
            <p><strong>Education:</strong> ${doctor.education}</p>
            <p>${doctor.about}</p>
        `;
        doctorImageDiv.innerHTML = `<img src="${doctor.image}" alt="${doctor.name}">`;
    }

    prevArrow.addEventListener('click', () => {
        currentDoctorIndex = (currentDoctorIndex - 1 + doctors.length) % doctors.length;
        displayDoctor(currentDoctorIndex);
    });

    nextArrow.addEventListener('click', () => {
        currentDoctorIndex = (currentDoctorIndex + 1) % doctors.length;
        displayDoctor(currentDoctorIndex);
    });

    // Initial display
    displayDoctor(currentDoctorIndex);
</script>

</body>
</html>
