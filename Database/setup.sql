USE tripnep_db;

TRUNCATE TABLE fair_prices;
TRUNCATE TABLE hidden_gems;
TRUNCATE TABLE phrases;
TRUNCATE TABLE emergency_contacts;

/*Sample Data for Fair Price Index*/
INSERT INTO fair_prices (item_name, category, price_npr, price_usd, tips) VALUES
('Airport Prepaid Taxi (TIA to Thamel)', 'Transportation', 'Rs. 800 - 1,200', '$6.00 - $9.00', 'Use the official prepaid taxi booking counter inside airport arrival hall.'),
('Local Bus Ride (City Route / Short)', 'Transportation', 'Rs. 25 - 45', '$0.20 - $0.35', 'Keep small change (Rs. 20/50 notes) ready for conductor.'),
('Ride Share (Pathao / InDrive Taxi)', 'Transportation', 'Rs. 200 - 450', '$1.50 - $3.50', 'Verify driver details on app before entering car.'),
('Tourist Bus (Kathmandu to Pokhara / Chitwan)', 'Transportation', 'Rs. 1,200 - 1,800', '$9.00 - $13.50', 'Includes AC and reclining seats; departs early morning.'),
('Standard Local Dal Bhat Set (Thali)', 'Food & Drinks', 'Rs. 200 - 400', '$1.50 - $3.00', 'Includes free unlimited refills of rice, dal, and curry.'),
('Bottled Mineral Water (1 Liter)', 'Food & Drinks', 'Rs. 25 - 30', '$0.20 - $0.25', 'Check that the plastic bottle cap seal is unbroken.'),
('Nepali Masala Chiya (Local Tea)', 'Food & Drinks', 'Rs. 30 - 60', '$0.25 - $0.45', 'Freshly brewed milk tea with cardamom and ginger.'),
('Tourist SIM Card (Ncell / NT 10GB Data)', 'Services', 'Rs. 150 - 300', '$1.10 - $2.25', 'Requires passport copy, 1 PP photo, and visa copy.'),
('Motorbike / Scooter Rental (Per Day)', 'Transportation', 'Rs. 800 - 1,500', '$6.00 - $11.00', 'Fuel cost extra. Wearing helmet is mandatory by law.'),
('TIMS Card & Trekking Permit', 'Services', 'Rs. 2,000 - 3,000', '$15.00 - $22.50', 'Mandatory permit before entering Annapurna or Everest zones.');

/*Sample Data for Hidden Gems (Quest Map)*/
INSERT INTO hidden_gems (spot_name, region, category, description) VALUES
('Bardibas Cultural Trail & Mithila Art', 'Bardibas / Madhesh', 'Culture', 'Discover traditional Mithila wall paintings, hand-crafted pottery, and warm community homestays in Bardibas.'),
('Tal Jhaljhale & Wetland Eco-Trail', 'Itahari / Koshi', 'Nature', 'Serene wetland sanctuary, lotus ponds, and peaceful eco-park near Itahari in Koshi Province.'),
('Namo Buddha Sacred Stupa', 'Kavre / Central', 'Spiritual', 'Peaceful hilltop stupa away from city crowds with panoramic views of the central Himalayan range.'),
('Chhaaimale Organic Village', 'Kathmandu Valley', 'Nature', 'Quiet organic farming village famous for lush plum orchards, hiking trails, and rural homestays.'),
('Bungamati Ancient Newar Village', 'Lalitpur Valley', 'Culture', 'Historic 16th-century settlement known for traditional woodcarving, stone temples, and open pottery squares.'),
('Pharping Spiritual Caves & Monastery', 'Kathmandu Valley', 'Spiritual', 'Sacred pilgrimage site featuring ancient meditation caves, prayer flags, and panoramic valley views.'),
('Panchase Hill Eco-Trek', 'Pokhara / Western', 'Adventure', 'Off-the-beaten-path trekking trail offering spectacular sunrise views over Annapurna without tourist crowds.'),
('Janaki Mandir Outer Courtyards', 'Janakpur / Madhesh', 'Culture', 'Vibrant palace-style temple complex showcasing Jhijhiya folk dance traditions and local sweet markets.');

/*Sample Data for Phrasebook*/
INSERT INTO phrases (english_phrase, nepali_phrase, phonetic, category) VALUES
('How much is this?', 'यो कति हो?', 'Yo Kati Ho?', 'Shopping'),
('Thank you very much', 'धेरै धन्यवाद', 'Dherai Dhanyabad', 'Greetings'),
('Where is the bus stop?', 'बस पार्क कहाँ छ?', 'Bus Park Kaha Chha?', 'Transport'),
('The food is delicious!', 'खाना मीठो छ!', 'Khana Mitho Chha!', 'Food'),
('Can you help me?', 'मलाई सहयोग गर्नुहुन्छ?', 'Malai Sahayog Garnuhunchha?', 'Emergency'),
('Where is the health post?', 'स्वास्थ्य चौकी कहाँ छ?', 'Swasthya Chauki Kaha Chha?', 'Emergency'),
('Namaste! (Hello / Respectful Greeting)', 'नमस्ते', 'Namaste', 'Greetings'),
('I dont want it, thank you', 'मलाई चाहिँदैन, धन्यवाद', 'Malai Chahindaina, Dhanyabad', 'Shopping');

/*Sample Data for Emergency Contacts*/
INSERT INTO emergency_contacts (service_name, phone_number, category, location, description) VALUES
('Tourist Police Official Helpline', '1144', 'Police', 'Nepal-Wide', '24/7 Official Tourist Police assistance for lost items, theft, price disputes, and safety.'),
('Nepal Police General Emergency', '100', 'Police', 'Nepal-Wide', '24/7 National Police emergency hotline for critical law enforcement help.'),
('National Ambulance Dispatch', '102', 'Ambulance', 'Nepal-Wide', 'Direct emergency medical ambulance service hotline across major cities.'),
('CIWEC Travel Medicine Hospital', '014524111', 'Hospital', 'Kathmandu', '24/7 Specialized travel medicine hospital for international tourists.'),
('Itahari Emergency Health Post', '025580111', 'Hospital', 'Itahari / Koshi', 'Primary emergency health post and ambulance dispatch in Itahari, Koshi Province.'),
('Fire & Rescue Services', '101', 'Fire', 'Nepal-Wide', '24/7 Emergency fire brigade and rescue dispatch service.');