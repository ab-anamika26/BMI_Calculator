// chatbot.js
document.getElementById('chatbot-toggle').addEventListener('click', () => {
  const window = document.getElementById('chatbot-window');
  window.style.display = window.style.display === 'block' ? 'none' : 'block';
});

function fillInput(text) {
  document.getElementById('user-input').value = text;
}

function submitQuestion() {
  const input = document.getElementById('user-input').value;
  const responseBox = document.getElementById('response-box');
  const answer = responses[input] || "Sorry, I don't have an answer for that.";
  typeText(responseBox, answer);
}

function typeText(element, text) {
  element.textContent = '';
  let index = 0;
  const interval = setInterval(() => {
    element.textContent += text[index];
    index++;
    if (index >= text.length) clearInterval(interval);
  }, 20);
}

const responses = {
  "What is BMI?": "BMI stands for Body Mass Index. It's a simple index of weight-for-height used to classify underweight, overweight, and obesity.",
  "How is BMI calculated?": "BMI = weight (kg) / (height in meters)^2",
  "What are healthy BMI ranges?": "Underweight: <18.5\nNormal: 18.5–24.9\nOverweight: 25–29.9\nObese: 30–39.9\nMorbidly Obese: ≥40",
  "Tips to gain weight?": "• Eat calorie-rich foods\n• Include healthy fats & proteins\n• Eat more frequently\n• Add smoothies & shakes\n• Do strength training",
  "Tips to lose weight?": "• Balanced diet & portion control\n• Reduce junk/sugary foods\n• Regular exercise (cardio + strength)\n• Stay hydrated & sleep well",
  "What exercises help reduce BMI?": "• Brisk walking\n• Jogging\n• Cycling\n• Swimming\n• HIIT\n• Strength training",
  "Is BMI always accurate?": "BMI doesn't distinguish between muscle & fat. Athletes may have high BMI but low body fat.",
  "Health risks of obesity?": "• Heart disease\n• Type 2 diabetes\n• High blood pressure\n• Joint problems\n• Sleep apnea\n• Some cancers",
  "What is a healthy BMI for teenagers?": "For teens, BMI is age- and sex-specific. It’s measured using BMI-for-age percentiles on growth charts.",
  "Why is BMI important?": "It helps identify risk levels for conditions like heart disease, diabetes, and hypertension.",
  "Can BMI be used for children?": "Yes, but children's BMI is compared with other children of the same age and gender using percentiles.",
  "Is BMI the same for men and women?": "Yes, but body fat distribution may differ. So results should be interpreted with care.",
  "Are there alternatives to BMI?": "Yes. Waist-to-hip ratio, body fat percentage, and waist circumference can also assess health risks.",
  "How can I measure body fat percentage?": "Methods include skinfold calipers, bioelectrical impedance, DEXA scans, or smart scales.",
  "What should I eat to gain weight?": "High-calorie, nutrient-rich foods like nuts, cheese, whole grains, lean meats, and healthy fats.",
  "Should I take supplements to gain weight?": "Only if advised by a healthcare professional. Natural food sources are usually safer and more effective.",
  "What are some low-calorie foods?": "Vegetables, lean proteins, legumes, fruits, low-fat dairy, and whole grains.",
  "Should I avoid carbs to lose weight?": "Not necessarily. Complex carbs like oats, brown rice, and veggies are good for you.",
  "Can walking reduce BMI?": "Yes! Regular brisk walking helps burn calories and reduce BMI over time.",
  "How often should I exercise?": "Aim for at least 150 minutes of moderate-intensity aerobic activity each week.",
  "How many calories do I need per day?": "It depends on age, sex, activity level. On average: 1800–2500 kcal per day.",
  "Can skipping meals affect BMI?": "Yes. It can slow metabolism and lead to overeating later, affecting weight and health.",
  "What are the health risks of being underweight?": "• Nutritional deficiencies\n• Weakened immunity\n• Fertility issues\n• Fatigue\n• Osteoporosis",
  "Should I consult a doctor for BMI?": "Yes, especially if you're underweight or overweight. They can guide you with personalized advice.",
  "How often should I check my BMI?": "Every few months is fine unless you're actively working on weight change goals."
};
window.onload = () => {
  const suggestionBox = document.getElementById("suggestions");
  Object.keys(responses).forEach(question => {
    const span = document.createElement("span");
    span.className = "suggestion";
    span.textContent = question;
    span.onclick = () => fillInput(question);
    suggestionBox.appendChild(span);
  });
};

