# LA 2020: Ao Oni

**Live Game URL:** `https://codd.cs.gsu.edu/~[your_username]/LA-2020-Ao-Oni/login.php`

## Project Title & Description
Welcome to **LA 2020: Ao Oni**, a text-based survival RPG set in a cyberpunk, alternate-history Los Angeles. As a player, you have exactly 30 days to prepare for a final boss fight against "Madame Oni." Every choice you make, whether it's scavenging, fighting, trading, or resting, takes up a day and shifts the game world based on your "Empathy" stat.

## Team Members
* **Connor Tran**
  * *Primary PHP Contribution:* Designed the PHP state-machine logic, server-side combat calculations, and session architecture.
* **Komal Ganta**
  * *Primary PHP Contribution:* Designed semantic HTML5 structures, implemented responsive CSS layouts. 

## Usage Guide
* **Register & Log In:** Start at `login.php` to securely create an Operator ID and log in to the system.
* **The Daily Hub:** This is your main dashboard. Choose your daily activity using the action menus and keep an eye on your 30-day countdown.
* **Playing the Game:** Submit choices during narrative events or purchase items in the Black Market. The game will automatically route you safely back to the Hub after your action.
* **The Leaderboard:** Once your 30 days are up, your final score is saved to the leaderboard so you can compare your survival run with others.

## Setup Instructions (CODD Server Deployment)
This project is set up to run directly on the university CODD server.
* **PHP Version:** PHP 8.0 or higher required.

1.  **Transfer Files:** Use FileZilla to connect to your CODD server.
2.  **Upload:** Move the project folder into your `public_html` directory, such as `~/public_html/LA-2020-Ao-Oni/`.
3.  **Set Permissions:** For the game to save user data properly, you need to give the text files permission to be updated. Change the permissions for `users.txt` and `leaderboard.txt` to `666` or `777`. 
4.  **Launch:** Open your browser and go to your live link like this: `https://codd.cs.gsu.edu/~your_username/LA-2020-Ao-Oni/login.php`

---

## Game Screens Overview

**The Daily Hub**
This is your main dashboard. We built it with a mobile-first design so it looks great on any device. 
* **Tracking Your Status:** Keep an eye on your 30-day countdown, your money (Creds), and your Empathy level.
* **Making Moves:** Choose your daily activity using simple menus that connect directly to our backend logic.

**The Black Market (Shop & Inventory)**
A fully functioning economy running entirely behind the scenes.
* **Dynamic Pricing:** The game checks your Empathy level; if it's high enough, you automatically get a 10% discount on items.
* **Quick Actions:** Buying items happens instantly without having to submit a long form every time.

**Narrative Events**
This is where the story unfolds.
* **Making Choices:** When you run into a story event, you submit your choice securely.
* **Instant Updates:** The game calculates how your choice affects your stats, saves your progress, and brings you right back to the Hub.

**Combat Arena**
Fights are intense and numbers-driven. 
* **Behind-the-Scenes Math:** Win or lose, all the weapon damage and attack stats are calculated securely on our server before you even see the results on your screen.

## Behind the Scenes (Our Tech Stack)

* **How It's Built:** We used a modular setup. One main file (`init.php`) handles the core rules, while individual files handle specific game features before displaying the HTML.
* **Saving Progress:** Because standard PHP doesn't remember what you did on the last page, we used `$_SESSION` to safely track your 30-day loop, inventory, and stats across the whole game.
* **Security Matters:** We make sure all user inputs are cleaned up before the game processes them. This stops malicious code (like XSS attacks) from breaking the site. If a user tries to skip the login screen, they are immediately redirected back to the start.
* **Consistent Design:** We used CSS variables to create a consistent cyberpunk color palette (like our signature dark backgrounds and red accents) without having to rewrite code over and over.

## AI Disclosure

We used AI tools to help troubleshoot some PHP bugs, generate some basic CSS formatting, fix syntax issues, and also help us with brainstorming some ideas for the characters.

## Development Journal & Challenges

Building a game that remembers player choices without using a database like SQL was a challenge. Here is how we handled the hurdles:

* **Lost Items:** Earlier, player inventories would completely disappear when moving from the Hub to the Fight screen. We figured out that a specific line of code (`session_start()`) was missing. We fixed it by putting that required code into one central file that loads on every page.
* **Storing Data:** We chose to use simple text files (`users.txt`) because it was much faster for us to build during our short schedule.
* **Handling Typos:** Figuring out how to deal with blank login fields was challenging, so we built a system that catches the blank field, stops the login process, and shows an error message above the form without crashing the game.
* **Teamwork:** Daily Discord calls helped a lot, as they allowed us to catch and fix UI layout bugs before finalizing the backend code. 
