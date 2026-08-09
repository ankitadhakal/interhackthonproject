CREATE DATABASE IF NOT EXISTS tripnep_db;
USE tripnep_db;

/*Anti-Scam Fair Price Index Table*/
CREATE TABLE IF NOT EXISTS fair_prices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL, 
    price_npr VARCHAR(100) NOT NULL,
    price_usd VARCHAR(100) NOT NULL,
    tips TEXT NOT NULL
);

/*Quest Map & Hidden Gems Table*/
CREATE TABLE IF NOT EXISTS hidden_gems (
    id INT AUTO_INCREMENT PRIMARY KEY,
    spot_name VARCHAR(255) NOT NULL,
    region VARCHAR(100) NOT NULL,
    category VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
);

/*3. Cultural Etiquette & Local Phrasebook Table*/
CREATE TABLE IF NOT EXISTS phrases (
    id INT AUTO_INCREMENT PRIMARY KEY,
    english_phrase VARCHAR(255) NOT NULL,
    nepali_phrase VARCHAR(255) NOT NULL,
    phonetic VARCHAR(255) NOT NULL,
    category VARCHAR(100) NOT NULL 
);

/*4. Tourist Police & Emergency SOS Table*/
CREATE TABLE IF NOT EXISTS emergency_contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(255) NOT NULL,
    phone_number VARCHAR(100) NOT NULL,
    category VARCHAR(100) NOT NULL, 
    location VARCHAR(100) NOT NULL,
    description TEXT NOT NULL
);