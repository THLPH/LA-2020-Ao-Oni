<?php 
require_once 'init.php'; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTRACT_BRIEFING</title>
    <link rel="stylesheet" href="styles.css">
    <style>
      .terminal-grid {
        display: grid !important;
        grid-template-columns: 1fr 1fr;
        gap: var(--border-width);
        background: var(--fg-dark);
        max-width: 1100px;
        width: 100%;
        box-sizing: border-box;
        border: var(--border-width) solid var(--fg-dark);
      }

      .cell {
        background: var(--bg-cream);
        box-sizing: border-box;
      }

      .header-cell {
        grid-column: 1 / -1;
        border-bottom: none;
        color: var(--fg-dark);
      }

      .content-cell p {
        margin-top: 0;
        margin-bottom: 1.5rem;
      }

      .highlight {
        background: var(--fg-dark);
        color: var(--bg-cream);
        padding: 0 5px;
        font-weight: bold;
        text-transform: uppercase;
      }

      ul {
        list-style-type: square;
        padding-left: 20px;
        margin-bottom: 1.5rem;
      }

      #enhance-toggle {
        display: none;
      }

      .image-wrapper {
        position: relative;
        width: 100%;
        aspect-ratio: 1 / 1;
        border: var(--border-width) solid var(--fg-dark);
        margin-bottom: 1.5rem;
        background: #000;
        /* FIX: Prevents border from pushing width past 100% */
        box-sizing: border-box;
      }

      .img-layer {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        transition: opacity 0.1s steps(2);
      }

      .img-base {
        background-image: url('assets/kowloon.jpg');
      }

      .img-enhanced {
        background-image: url('assets/kowloonenhanced.jpg');
        opacity: 0;
      }

      .enhance-btn {
        display: block;
        width: 100%;
        padding: 1.2rem;
        text-align: center;
        border: var(--border-width) solid var(--fg-dark);
        background: var(--bg-cream);
        font-weight: bold;
        text-transform: uppercase;
        cursor: pointer;
        box-sizing: border-box;
        color: var(--fg-dark);
      }

      /* Hide the link state by default */
      .state-link {
        display: none;
      }

      /* ACTIVE STATE LOGIC */
      /* 1. Show the enhanced image */
      #enhance-toggle:checked~.terminal-grid .img-enhanced {
        opacity: 1;
      }

      /* 2. Hide the original 'Enhance' label */
      #enhance-toggle:checked~.terminal-grid .state-toggle {
        display: none;
      }

      /* 3. Show the 'Accept' link and change its color */
      #enhance-toggle:checked~.terminal-grid .state-link {
        display: block;
        background: var(--fg-dark);
        color: var(--bg-cream);
      }

      @media (max-width: 900px) {
        .terminal-grid {
          grid-template-columns: 1fr;
        }
      }
    </style>
  <body>
    <input type="checkbox" id="enhance-toggle">
    <div class="terminal-container terminal-grid">
      <div class="cell header-cell">
        <span>>>>> TARGET_BRIEFING</span>
        <span>[ STATUS: PENDING ]</span>
      </div>
      <div class="cell content-cell">
        <span class="sys-text">>>>> ACCESSING TRUST_GLOBAL UPLINK... DONE.</span>
        <p>
          <strong>CONTRACT TYPE: ASSASSINATION</strong>
          <br>
          <strong>TARGET:</strong>
          <span class="highlight">ONI</span>
          <br>
          <strong>Last Location:</strong> Los Angeles, United States
        </p>
        <p>
          <strong>TARGET INTEL:</strong>
          <br>- ~2.0 Meters <br>- Long hair <br>- High mobility <br>- High endurance <br>- High physical strength <br>- Armed with a long blade <br>- Target is extremely lethal at close range
        </p>
        <p>
          <strong>REWARD:</strong>
          <br> Final compensation and bonuses will be calculated upon completion of all contractual obligations. Standard non-disclosure protocols in effect.
        </p>
        <p>
          <strong>TERMS & CONDITIONS:</strong>
          <br> Contract duration: 31 days. Failure to fulfill contract results in immediate termination.
        </p>
        <p>
          <strong>LEGAL DISCLAIMER:</strong>
          <span class="highlight">TRUST GLOBAL</span> assumes zero liability for operative injury, detainment, or death. All operational costs, including equipment, medical, and disposal, are the sole responsibility of the contractor. No expenses will be reimbursed.
        </p>
      </div>
      <div class="cell content-cell">
        <div class="image-wrapper">
          <div class="img-layer img-base"></div>
          <div class="img-layer img-enhanced"></div>
        </div>
        <label for="enhance-toggle" class="enhance-btn state-toggle">ENHANCE IMAGE</label>
        <a href="choice.php" class="enhance-btn state-link" style="text-decoration: none;">ACCEPT CONTRACT</a>
      </div>
    </div>
  </body>
</html>