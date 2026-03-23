<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>BMI Calculator</title>
  <link rel="stylesheet" href="bmi-style.css" />
<!--<script src="bmi-script.js" defer></script>-->
  <style>
    .back-home-btn {
      position: absolute;
      top: 20px;
      right: 20px;
      padding: 10px 18px;
      background-color:rgb(43, 115, 143);
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 6px;
      font-size: 14px;
      font-weight: 600;
      cursor: pointer;
      transition: background-color 0.3s ease;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    }
    .back-home-btn:hover {
      background-color:rgb(194, 220, 242);
    }
    
  </style>
</head>
<body>
  <a href="user-index.php" class="back-home-btn">🏠Back to Home</a>
  
<!-- Chat Window (optional placeholder) -->
<div class="chatbot-container">
  <button id="chatbot-toggle">🤖 Chat</button>
  <div class="chatbot-window" id="chatbot-window">
    <div class="chatbot-header">BMI & Health Chatbot</div>

    <div class="suggestions" id="suggestions"></div>


    <div class="input-area">
      <input type="text" id="user-input" placeholder="Ask a question...">
      <button onclick="submitQuestion()">Ask</button>
    </div>

    <div class="response-box" id="response-box"></div>
  </div>
</div>

<link rel="stylesheet" href="chatbot\chatbot.css">
<script src="chatbot\chatbot.js"></script>


  <div class="container">
    <h1>BMI Calculator</h1>
       <div class="main-content">
      <form class="calculator" method="POST" action="">
        <div class="form-group">
          <label for="gender">Gender</label>
          <select id="gender" name="gender" required>
            <option value="" disabled selected>Select Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="others">Others</option>
          </select>
        </div>

        <div class="form-group">
          <label for="weight">Weight (kg)</label>
          <input type="number" id="weight" name="weight" min="0" step="any" placeholder="Enter your weight" required />
        </div>

        <div class="form-group">
          <label for="height">Height (cm)</label>
          <input type="number" id="height" name="height" min="0" step="any" placeholder="Enter your height" required />
        </div>

        <div class="form-buttons">
          <button type="reset">Reset</button>
          <button type="submit">Calculate</button>
        </div>

        <div class="bmi-output">
          <div class="bmi-result">
            <h3>Your BMI</h3>
            <p id="bmi">0</p>
            <p id="desc">N/A</p>
          </div>
          <div class="bmi-banner">
            <img src="assets/img/bmi-category.png" alt="BMI Categories" />
          </div>
        </div>
      </form>

      <section id="tips-section" class="tips" style="display: none;">
        <h3 id="tips-heading">Tips to Improve Your BMI</h3>
        <ul id="tips-list"></ul>
      </section>
    </div>
  </div>
</body>
</html>
<script>
  const tipsData = {
  male: {
    normalweight: [
       "Great job!",
      "Maintain a balanced diet and stay active with regular exercise like walking, stretching, or light yoga.",
      "Keep hydrated and get enough sleep to support overall health.",
      "Continue regular health check-ups to stay on track."
    ],
    underweight: [
      "Tips to help you gain weight:",
      "Do:",
      "Gain weight gradually by adding healthy calories adults could try adding around 300 to 500 extra calories a day.",
      "Eat smaller meals more often, adding healthy snacks between meals.",
      "Add extra calories to your meals with cheese, nuts, and seeds.",
      "Have high-calorie drinks in between meals, such as milkshakes.",
      "Have a balanced diet – choose from a variety of food groups, such as fruit and vegetables, starchy carbohydrates and dairy and alternatives.",
      "Add protein to your meals with beans, pulses, fish, eggs and lean meat.",
      "Have snacks that are easy to prepare, such as yogurt or rice pudding.",
      "Build muscle with strength training or yoga exercise can also improve your appetite.",
      "Don't:",
      "Do not rely on chocolate, cakes and sugary drinks to gain weight.",
      "Do not fill up on drinks before eating meals."
    ],
    overweight: [
      "Healthy Eating:",
      "Balanced Diet: Focus on fruits, vegetables, whole grains, and lean protein. Limit processed foods and sugary drinks.",
      "Portion Control: Use smaller plates and measure portions.",
      "Hydration: Drink plenty of water to avoid mistaking thirst for hunger.",
      "Fiber: Increase fiber intake for satiety and digestion.",
      "Sugar Reduction: Limit sugary drinks and snacks.",
      "Physical Activity:",
      "Regular Exercise: Aim for at least 150 minutes of moderate-intensity aerobic activity weekly.",
      "Variety: Include cardio, strength, and flexibility exercises.",
      "Enjoyable Activities: Choose exercises you enjoy.",
      "Gradual Progress: Increase intensity gradually.",
      "Lifestyle Adjustments:",
      "Sleep: Get adequate, quality sleep.",
      "Stress Management: Try meditation, exercise, or nature time.",
      "Social Support: Engage friends and family.",
      "Limit Screen Time: Avoid excessive sedentary habits."
    ],
    obese: [
      "Dietary Changes:",
      "Prioritize whole foods: Fruits, vegetables, lean proteins.",
      "Limit processed foods and sugary drinks.",
      "Control portion sizes.",
      "Drink water regularly.",
      "Balance macronutrients: Include protein, healthy fats, and complex carbs.",
      "Physical Activity:",
      "Engage in moderate exercise: Aim for 150 min/week.",
      "Enjoyable and consistent routines.",
      "Daily movement: Walk, take stairs, etc.",
      "Strength training helps boost metabolism.",
      "Lifestyle Adjustments:",
      "Sleep: Get 7-9 hours nightly.",
      "Stress Management: Use meditation, nature, or therapy.",
      "Set achievable goals and stay consistent."
    ],
    morbidly_obese: [
      "General Tips:",
      "Diet: Whole foods, reduce portions, limit processed foods, track intake.",
      "Exercise: Start gradually (walking), increase intensity, choose fun activities, consult doctor.",
      "Behavioral Therapy: Individual/group therapy, develop support system, set realistic goals.",
      "Medical Interventions: Medications or surgery under doctor supervision.",
      "Stress Management: Yoga, meditation, hobbies, therapy.",
      "Sleep: Prioritize 7-8 hours, regular schedule.",
      "Specific for Men: Improve testosterone via fitness, add strength training, seek social support."
    ]
  },
  female: {
    normalweight: [
     "Great job!",
      "Stick to balanced meals including fruits, veggies, whole grains, and lean protein.",
      "Stay active with activities you enjoy, such as walking or yoga.",
      "Avoid skipping meals to maintain stable energy levels."
    ],
    underweight: [
      "Tips to help you gain weight:",
      "Do:",
      "Gain weight gradually by adding healthy calories adults could try adding around 300 to 500 extra calories a day.",
      "Eat smaller meals more often, adding healthy snacks between meals.",
      "Add extra calories to your meals with cheese, nuts, and seeds.",
      "Have high-calorie drinks in between meals, such as milkshakes.",
      "Have a balanced diet choose from a variety of food groups, such as fruit and vegetables, starchy carbohydrates and dairy and alternatives.",
      "Add protein to your meals with beans, pulses, fish, eggs and lean meat.",
      "Have snacks that are easy to prepare, such as yogurt or rice pudding.",
      "Build muscle with strength training or yoga exercise can also improve your appetite.",
      "Don't:",
      "Do not rely on chocolate, cakes and sugary drinks to gain weight.",
      "Do not fill up on drinks before eating meals."
    ],
    overweight: [
      "Healthy Eating:",
      "Balanced Diet: Focus on fruits, vegetables, whole grains, and lean protein. Limit processed foods and sugary drinks.",
      "Portion Control: Use smaller plates and measure portions.",
      "Hydration: Drink plenty of water.",
      "Fiber: Increase intake for satiety and digestion.",
      "Sugar Reduction: Avoid added sugars.",
      "Physical Activity:",
      "150 minutes of moderate aerobic exercise weekly.",
      "Include strength and flexibility workouts.",
      "Choose enjoyable activities.",
      "Increase intensity gradually.",
      "Lifestyle Adjustments:",
      "Get enough sleep.",
      "Manage stress through healthy techniques.",
      "Social support helps stay motivated.",
      "Limit screen time."
    ],
    obese: [
      "Dietary Changes:",
      "Whole foods and lean proteins.",
      "Avoid processed foods.",
      "Portion control.",
      "Hydration.",
      "Macronutrient balance.",
      "Physical Activity:",
      "Moderate intensity 150 min/week.",
      "Daily movement.",
      "Strength training included.",
      "Lifestyle Adjustments:",
      "7-9 hours of sleep.",
      "Reduce stress.",
      "Professional guidance.",
      "Set realistic goals and stick to them."
    ],
    morbidly_obese: [
      "General Tips:",
      "Whole foods, portion control, food tracking.",
      "Start slow with exercise, increase gradually.",
      "Behavioral therapy and support systems.",
      "Medical support if needed: meds/surgery.",
      "Stress reduction techniques.",
      "7-8 hours of consistent sleep.",
      "Women-specific: Be aware of hormonal changes, plan for health during/after pregnancy."
    ]
  }
}; 
const bmiText = document.getElementById("bmi");
const descText = document.getElementById("desc");
const form = document.querySelector("form");
const bmiOutput = document.querySelector(".bmi-output");

form.addEventListener("submit", handleSubmit);
form.addEventListener("reset", handleReset);

document.getElementById("weight").addEventListener("input", () => {
  document.getElementById("weight").placeholder = "";
});
document.getElementById("height").addEventListener("input", () => {
  document.getElementById("height").placeholder = "";
});

function handleReset() {
  bmiText.textContent = 0;
  bmiOutput.className = "bmi-output";
  descText.textContent = "N/A";
  document.getElementById("tips-section").style.display = "none";
}

function handleSubmit(e) {
  e.preventDefault();

  const weight = parseFloat(document.getElementById("weight").value);
  const height = parseFloat(document.getElementById("height").value);
  const gender = document.getElementById("gender").value;

  if (!gender) {
    alert("Please select your gender");
    return;
  }

  if (isNaN(weight) || isNaN(height) || weight <= 0 || height <= 0) {
    alert("Please enter a valid weight and height");
    return;
  }

  const heightInMeters = height / 100;
  const bmi = weight / (heightInMeters ** 2);
  const desc = interpretBMI(bmi);

  bmiText.textContent = bmi.toFixed(2);
  bmiOutput.className = `bmi-output output ${desc}`;
  descText.innerHTML = `You are <strong>${desc.replace("_", " ")}</strong>`;

  showTips(gender, desc);
 fetch('save_bmi.php', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify({
    gender,
    weight,
    height,
    bmi: bmi.toFixed(2),
    category: desc.replace("_", " ")
  }),
})
.then(res => res.json())
.then(data => {
  console.log("Server response:", data);
})
.catch(err => {
  console.error("Error saving BMI:", err);
});

}

function interpretBMI(bmi) {
  if (bmi < 18.5) return "underweight";
  else if (bmi < 25) return "normalweight";
  else if (bmi < 30) return "overweight";
  else if (bmi < 40) return "obese";
  else return "morbidly_obese";
}

function showTips(gender, category) {
  const tipsSection = document.getElementById("tips-section");
  const tipsList = document.getElementById("tips-list");
  const tipsHeading = document.getElementById("tips-heading");

  tipsList.innerHTML = "";

  if (category === "normalweight") {
    tipsHeading.textContent = "Tips to Maintain Your Healthy Weight";
    tipsList.innerHTML = `
      <li>Great job!</li>
      <li>Maintain a balanced diet and stay active with regular exercise like walking, stretching, or light yoga.</li>
    `;
    tipsSection.style.display = "block";
    return;
  }

  tipsHeading.textContent = "Tips to Improve Your BMI";

  const tips = tipsData[gender]?.[category] || [];

  tips.forEach(tip => {
    const li = document.createElement("li");
    if (tip === "Do:" || tip === "Don't:") {
      li.textContent = tip;
      li.style.listStyleType = "none"; 
      li.style.fontWeight = "bold";    
    } else {
      li.textContent = tip;
    }
    tipsList.appendChild(li);
  });

  tipsSection.style.display = "block";
}

</script>
