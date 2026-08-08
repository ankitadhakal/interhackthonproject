# interhackthonproject
# TRIPNEP 🇳🇵 — Travel Smart, Travel Safe in Nepal
A field-specific tourism companion for exploring authentic local quest spots, checking anti-scam fair prices, learning Nepali culture & phrases, and accessing 1-click emergency safety.

Developed for the 24-Hour College Tourism Hackathon.

# Project Motivation & Problem Statement
Tourism is a primary driver of Nepal's economy, welcoming hundreds of thousands of international and domestic travelers annually. However, first-time tourists face three critical challenges that diminish their travel experience:

Price Exploitation & Scams: Tourists are routinely overcharged for prepaid airport taxis, local bus rides, street food, mineral water, and tourist SIM cards due to a lack of transparent local price standards.

Cultural Barriers & Unintentional Offense: Travelers frequently make unintentional cultural errors (e.g., entering Hindu temples with leather items/shoes or pointing feet at sacred stupas) and struggle with basic daily conversation.

Emergency & Safety Isolation: When disputes, medical emergencies, lost passports, or harassment occur, tourists panic because emergency numbers in Nepal are not centralized or obvious.

Overtourism vs. Regional Neglect: Popular commercial hubs (Thamel, Pokhara Lakeside) become congested, while culturally rich regional destinations (such as Madhesh Province's Mithila art trails in Bardibas or Koshi Province trails near Itahari/Eastern Nepal) remain undiscovered.

 # The TripNep Solution (Core Features)
TripNep provides an intuitive, light-weight, mobile-responsive web platform that solves these problems through four integrated modules:

1. 🗺️ Cultural Quest Map (Hidden Gems)
Purpose: Curates off-the-beaten-path cultural, historical, and ecological spots across Nepal.
Coverage: Features destinations from Kathmandu Valley to Kavre, Pokhara, and regional cultural hubs in Eastern Nepal (Koshi Province / Itahari) and Madhesh Province (Bardibas Mithila Trail).
Database Driver: Dynamically queries hidden_gems table from MySQL.

2. 💰 Fair Price Index (The Anti-Scam Tool)
Purpose: Provides a searchable, category-filtered lookup table showing true local rates in NPR and USD.
Categories: Transport (taxis, local buses), Food & Drinks (mineral water, Dal Bhat sets), and Services (Ncell/NT SIM cards, local tours).
Local Tips: Accompanied by practical negotiation advice (e.g., "Always use official prepaid taxi counter inside airport arrival hall").
Database Driver: Dynamically queries fair_prices table with SQL category filtering.

3. 🇳🇵 Culture & Local Phrasebook
Purpose: Teaches tourists essential everyday Nepali vocabulary accompanied by clear phonetic pronunciations ("Yo Kati Ho?", "Dhanyabad").
Etiquette Rules: Provides cardinal customs for visiting stupas, temples, and village homestays.
Database Driver: Dynamically queries phrases table.

4. 🚨 Tourist Police & Emergency SOS Hub
Purpose: High-visibility, 1-click direct telephone call links (href="tel:...") for instant emergency assistance.
Helplines Included:
Tourist Police Helpline: Dial 1144
Nepal Police General Emergency: Dial 100
National Ambulance Service: Dial 102
Direct contact lines for travel hospitals (CIWEC, Norvic) and regional health posts.
Database Driver: Dynamically queries emergency_contacts table.

 # 🛠️ Tech Stack & Tooling Component
- HTML
- CSS
- JavaScript
- PHP
- MySQL
- XAMPP
- GitHub

## Local Setup
1. Install XAMPP.
2. Start Apache and MySQL.
3. Place the project inside:

   C:\xampp\htdocs\

4. Open phpMyAdmin.
5. Create the required database.
6. Import the provided SQL/database files.
7. Open the project in your browser:

   http://localhost/Godwari_Intrahack1.0_-SideQuest/

## Project Structure
- `assets/` - CSS, JavaScript, images and frontend assets
- `config/` - Database configuration
- `database/` - SQL/database files
- `include/` - Reusable PHP functions
- `emergency.php` - Emergency assistance section
- `etiquette.php` - Cultural etiquette section
- `fair_prices.php` - Fair pricing information
- `index.php` - Main application entry point

## Purpose
Our goal is to give tourists a more authentic Nepal experience while reducing common travel problems such as overpricing, lack of local knowledge, cultural misunderstandings, and difficulty accessing emergency information.

## Team
Built during a tourism hackathon by our team.
1.Harshita Ghimire:Team Leader & Integration
2.Aarosh Niraula:Frontend master
3.Ankita Dhakal:Tech Lead & Git master
4.Deekshya Dahal: Database Lead & System QA

## Future Improvements
- Interactive maps
- User-submitted hidden gems
- Multilingual support
- Live transport pricing
- AI-based travel recommendations
- Real-time emergency assistance



