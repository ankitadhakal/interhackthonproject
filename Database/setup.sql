USE tripnep_db;

/*Sample Data for Fair Price Index*/
INSERT INTO fair_prices (item_name, category, price_npr, price_usd, tips) VALUES
('Prepaid Taxi (Airport to Thamel)', 'Transport', 'Rs. 700 - 900', '$5 - $7', 'Use official prepaid taxi counter inside airport arrival hall.'),
('Standard 1L Mineral Water Bottle', 'Food', 'Rs. 25 - 30', '$0.20 - $0.25', 'Ensure bottle seal is unbroken before paying.'),
('Local Bus Ride (Within City)', 'Transport', 'Rs. 20 - 30', '$0.15 - $0.25', 'Keep small change (Rs. 20/50 notes) ready.'),
('Standard Local Dal Bhat Set', 'Food', 'Rs. 150 - 250', '$1.20 - $2.00', 'Includes unlimited refills of rice and lentils in local eateries.'),
('Local Ncell/NT Tourist SIM Card', 'Services', 'Rs. 100 - 200', '$0.80 - $1.50', 'Requires citizenship/passport copy and 1 PP photo.');

/*Sample Data for Hidden Gems (Quest Map)*/
INSERT INTO hidden_gems (spot_name, region, category, description) VALUES
('Bardibas Cultural Trail & Mithila Art', 'Bardibas / Madhesh', 'Culture', 'Experience authentic Mithila art, local pottery, and vibrant community culture in Bardibas.'),
('Namo Buddha Stupa', 'Kavre / Central', 'Spiritual', 'Serene hilltop stupa away from city crowds with panoramic Himalayan views.'),
('Chhaaimale Organic Village', 'Kathmandu Valley', 'Nature', 'Quiet organic farm village famous for hiking trails and local orchards.');

/*Sample Data for Phrasebook*/
INSERT INTO phrases (english_phrase, nepali_phrase, phonetic, category) VALUES
('How much is this?', 'यो कति हो?', 'Yo Kati Ho?', 'Shopping'),
('Thank you', 'धन्यवाद', 'Dhanyabad', 'Greetings'),
('Where is the bus?', 'गाडी कहाँ छ?', 'Gadi Kaha Chha?', 'Transport'),
('Delicious food', 'मीठो छ', 'Mitho Chha', 'Food');

/*Sample Data for Emergency Contacts*/
INSERT INTO emergency_contacts (service_name, phone_number, category, location, description) VALUES
('Tourist Police Helpline', '1144', 'Police', 'Nepal-Wide', '24/7 Official Tourist Police assistance for lost items, disputes, and safety.'),
('Nepal Police General Emergency', '100', 'Police', 'Nepal-Wide', '24/7 National Police emergency helpline.'),
('National Ambulance Service', '102', 'Ambulance', 'Nepal-Wide', 'Direct emergency medical transport hotline.'),
('CIWEC Travel Medicine Hospital', '014524111', 'Hospital', 'Kathmandu', '24/7 Travel medicine hospital for international tourists.'),
('Bardibas Emergency Care Post', '044550111', 'Hospital', 'Bardibas / Madhesh', 'Primary emergency care & health post in Bardibas, Madhesh Province.');