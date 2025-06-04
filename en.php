
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tabulara</title>
  <link rel="icon" href="public/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="public/css/home.css">
  <link rel="stylesheet" href="public/css/landingpage.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="public/favicon.ico" alt="Tabulara" style="height: 24px; vertical-align: middle; margin-right: 8px;">
            <a href="#">Tabulara</a>
        </div>
        <nav>
            <a href="#how">How It works</a>
            <a href="#subscribe">Subscribe</a>
            <a href="#about-us">Who we are</a>
        </nav>
        <div class="buttons">
            <div class="dropdown" style="display: inline-block; position: relative;">
                <button class="dropdown-toggle" style="min-width: 90px;">🇬🇧 English</button>
                <div class="dropdown-menu" style="display: none; position: absolute; background: #fff; border: 1px solid #ccc; z-index: 10; min-width: 120px;">
                    <button onclick="changeLanguage('cs')" style="width: 100%; text-align: left;">🇨🇿 Česky</button>
                    <button onclick="changeLanguage('en')" style="width: 100%; text-align: left;">🇬🇧 English</button>
                </div>
            </div>
        </div>
    </header>

    <section id="hero">
        <div class="section-content">
            <div class="logo">
                <img src="public/img/logo.svg" alt="Tabulara Logo" style="width: 100px; margin-bottom: 1em;">
            </div>
            <div>
                <h1>Tabulara</h1>
                <h2>Extract insights from Your tables</h2>
                <p>Process tabular files with natural language – no formulas, no code.</p>
                <a class="btn btn-dark call" href="#subscribe" onclick="selectClosedBeta()">Get early access</a>
            </div>

        </div>
    </section>

    <section id="how">
        <div class="section-content">
            <h2>How It Works</h2>
            <p>Upload your files, type what you want to do in natural language, and Tabulara handles the rest — from joining and filtering to calculating summaries.</p>
            <ol class="how-steps">
                <li>
                    <label>Upload your CSV or XLSX files</label>
                    <img class="step-img" src="public/img/first_step.svg" alt="CSV / XLSX">
                </li>
                <li>
                    <label>Type what you want to do in plain English</label>

                    <input id="tf-input" type="text" name="user_input" placeholder="Write here what to do with files provided" value="Return spending statistics for each region." />
                </li>
                <li>
                    <label>Tabulara returns the result, and shows the process taken.</label>
                    <div class="third">
                        <div class="third-right">
                            <div class="process-steps">
                                <h3>Process Steps</h3>
                                <ol>
                                    <li>Calculate total customer's spendings</li>
                                    <li>Assign region to customers</li>
                                    <li>Calculate spending statistics for all regions</li>
                                </ol>
                            </div>
                        </div>
                        <div class="third-left">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Region</th>
                                        <th>Customer Count</th>
                                        <th>Average</th>
                                        <th>Top 10%</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>North</td>
                                        <td>104</td>
                                        <td>$500</td>
                                        <td>$800</td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td>South</td>
                                        <td>76</td>
                                        <td>$700</td>
                                        <td>$900</td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td>East</td>
                                        <td>55</td>
                                        <td>$800</td>
                                        <td>$900</td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td>West</td>
                                        <td>312</td>
                                        <td>$750</td>
                                        <td>$850</td>
                                        <td>...</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </li>
            </ol>
        </div>
    </section>

    <section id="about">
        <div class="section-content">
            <h2>What is Tabulara for?</h2>
            <p>Tabulara takes tabular files and a natural language command, then performs the requested operation while showing each step.</p>
            <p>Tabulara is designed for professionals and companies who struggle to extract insights from tabular data efficiently. No coding or formulas required.</p>
        </div>
    </section>

    <section id="features">
        <div class="section-content">
            <h2>Key Benefits</h2>
            <div class="feature-container">
                <div class="feature-item">
                    <img src="public/img/feature_plain_english.png" alt="🧠" />
                    <h3>Plain English Interaction</h3>
                    <p>Interact with your data using plain English. No coding or formulas required.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/feature_stepbystep.png" alt="🧠" />
                    <h3>Process Review</h3>
                    <p>Review the steps taken to ensure transparency and understanding of the results.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/feature_manipulations.png" alt="🧩" />
                    <h3>Data Manipulation</h3>
                    <p>Clean, filter, and group data without complex formulas. Easily merge, join, and combine multiple tabular files.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/feature_reports.png" alt="📈" />
                    <h3>Reports & Summaries</h3>
                    <p>Generate reports and summaries with ease.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/feature_visualization.png" alt="🔍" />
                    <h3>Data Visualization</h3>
                    <p>Visualize your data with charts and graphs.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/check.png" alt="🔒" />
                    <h3>Data Consistency</h3>
                    <p>Your data are not affected by hallucinations because they are not processed by AI.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe" class="subscribe">
        <div class="section-content">
            <h2>Subscribe</h2>
            
            <form method="post" action="" class="subscribe-form" id="subscribe-form">
                <p>We are planing to release closed beta soon. Sign up for early access.</p>
                <input type="text" name="lang" value="en" hidden />
                <input type="text" name="csrf" value="CSRF_TOKEN" hidden />
                <div class="form-main-inputs">
                    <input type="text" name="name" placeholder="Your Name" required />
                    <input type="email" name="email" placeholder="Your Email" required />
                </div>
                <div class="form-options">
                    <label class="form-checkbox">
                        <input type="checkbox" id="closed_beta" name="closed_beta" value="beta">
                        <span class="option-title">🔐 Closed beta</span>
                        <span class="option-desc">Early access request</span>
                    </label>
                    <label class="form-checkbox">
                        <input type="checkbox" name="call" value="call">
                        <span class="option-title">📞 15 minute call</span>
                        <span class="option-desc">Are you open to a quick call?</span>
                    </label>
                    <label class="form-checkbox">
                        <input type="checkbox" name="subscribe" value="subscribe" checked>
                        <span class="option-title">🔔 Subscribe</span>
                        <span class="option-desc">Receive updates and news</span>
                    </label>
                </div>
                <textarea name="feedback" rows="2" placeholder="Tell us something about you and your usecase. (optional)" class="subscribe-textarea"></textarea>
                <button class="btn btn-dark" type="submit" style="margin-top: 1em;">Submit</button>
            </form>
        </div>
    </section>

    <section id="about-us" class="about-us">
        <div class="section-content">
            <h2>About us</h2>
            <p>We are starting entrepreneurs. Help us on our journey by telling us about your struggles.</p>
            <p>For more information about us you may visit our website <a href="https://palmaf.com">palmaf.com</a>.</p>
        </div>
    </section>

    <footer>
        &copy; 2025 Tabulara. All rights reserved. &mdash; Created by <a href="https://palmaf.com" target="_blank" rel="noopener">Palmaf</a>
    </footer>

    <script src="public/js/behavior.js"></script>
</body>
</html>

