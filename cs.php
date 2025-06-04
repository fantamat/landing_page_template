<!DOCTYPE html>
<html lang="cs">
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
            <a href="#how">Jak to funguje</a>
            <a href="#subscribe">Přihlásit se</a>
            <a href="#about-us">Kdo jsme</a>
        </nav>
        <div class="buttons">
            <div class="dropdown" style="display: inline-block; position: relative;">
                <button class="dropdown-toggle" style="min-width: 90px;">🇨🇿 Česky</button>
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
                <h2>Získejte informace ze svých tabulek</h2>
                <p>Zpracujte tabulkové soubory pomocí přirozeného jazyka – bez vzorců, bez kódu.</p>
                <a class="btn btn-dark call" href="#subscribe" onclick="selectClosedBeta()">Získat přednostní přístup</a>
            </div>
        </div>
    </section>

    <section id="how">
        <div class="section-content">
            <h2>Jak to funguje</h2>
            <p>Nahrajte své soubory, napište, co chcete udělat, a Tabulara vše zařídí — od spojování a filtrování až po vytvoření souhrnů.</p>
            <ol class="how-steps">
                <li>
                    <label>Nahrajte své CSV nebo XLSX soubory</label>
                    <img class="step-img" src="public/img/first_step.svg" alt="CSV / XLSX">
                </li>
                <li>
                    <label>Napište, co chcete udělat v češtině</label>
                    <input id="tf-input" type="text" name="user_input" placeholder="Napište zde, co chcete s daty provést" value="Vrať statistiky útrat pro každý region." />
                </li>
                <li>
                    <label>Tabulara vrátí výsledek a ukáže postup.</label>
                    <div class="third">
                        <div class="third-right">
                            <div class="process-steps">
                                <h3>Postup</h3>
                                <ol>
                                    <li>Výpočet celkové útraty zákazníků</li>
                                    <li>Přiřazení regionů zákazníkům</li>
                                    <li>Výpočet statistik útrat pro všechny regiony</li>
                                </ol>
                            </div>
                        </div>
                        <div class="third-left">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Region</th>
                                        <th>Počet zákazníků</th>
                                        <th>Průměr</th>
                                        <th>Top 10%</th>
                                        <th>...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Sever</td>
                                        <td>104</td>
                                        <td>500 Kč</td>
                                        <td>800 Kč</td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td>Jih</td>
                                        <td>76</td>
                                        <td>700 Kč</td>
                                        <td>900 Kč</td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td>Východ</td>
                                        <td>55</td>
                                        <td>800 Kč</td>
                                        <td>900 Kč</td>
                                        <td>...</td>
                                    </tr>
                                    <tr>
                                        <td>Západ</td>
                                        <td>312</td>
                                        <td>750 Kč</td>
                                        <td>850 Kč</td>
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
            <h2>K čemu je Tabulara?</h2>
            <p>Tabulara vezme tabulkové soubory a příkaz v přirozeném jazyce, provede požadovanou operaci a ukáže každý krok.</p>
            <p>Tabulara je určena pro profesionály a firmy, které potřebují efektivně získávat poznatky z tabulkových dat. Není potřeba žádné programování ani vzorce.</p>
        </div>
    </section>

    <section id="features">
        <div class="section-content">
            <h2>Hlavní výhody</h2>
            <div class="feature-container">
                <div class="feature-item">
                    <img src="public/img/feature_plain_english.png" alt="🧠" />
                    <h3>Přirozený jazyk</h3>
                    <p>Pracujte s daty v přirozeném jazyce. Žádné kódy ani vzorce.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/feature_stepbystep.png" alt="🧠" />
                    <h3>Přehledný postup</h3>
                    <p>Zkontrolujte jednotlivé kroky a mějte přehled o výsledku.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/feature_manipulations.png" alt="🧩" />
                    <h3>Úpravy dat</h3>
                    <p>Čistěte, filtrujte a seskupujte data bez složitých vzorců. Snadno slučujte a kombinujte více tabulkových souborů.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/feature_reports.png" alt="📈" />
                    <h3>Přehledy a souhrny</h3>
                    <p>Snadno generujte přehledy a souhrny.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/feature_visualization.png" alt="🔍" />
                    <h3>Vizualizace dat</h3>
                    <p>Vizualizujte svá data pomocí grafů a diagramů.</p>
                </div>
                <div class="feature-item">
                    <img src="public/img/check.png" alt="🔒" />
                    <h3>Konzistence dat</h3>
                    <p>Vaše data nejsou ovlivněna halucinacemi, protože nejsou zpracovávána AI.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="subscribe" class="subscribe">
        <div class="section-content">
            <h2>Přihlásit se</h2>
            <form method="post" action="" class="subscribe-form" id="subscribe-form">
                <p>Plánujeme brzy spustit uzavřenou betu. Přihlaste se pro přednostní přístup.</p>
                <input type="text" name="lang" value="cs" hidden />
                <input type="text" name="csrf" value="CSRF_TOKEN" hidden />
                <div class="form-main-inputs">
                    <input type="text" name="name" placeholder="Vaše jméno" required />
                    <input type="email" name="email" placeholder="Váš e-mail" required />
                </div>
                <div class="form-options">
                    <label class="form-checkbox">
                        <input type="checkbox" id="closed_beta" name="closed_beta" value="beta">
                        <span class="option-title">🔐 Uzavřená beta</span>
                        <span class="option-desc">Žádost o přednostní přístup</span>
                    </label>
                    <label class="form-checkbox">
                        <input type="checkbox" name="call" value="call">
                        <span class="option-title">📞 15minutový hovor</span>
                        <span class="option-desc">Jste otevřeni krátkému hovoru?</span>
                    </label>
                    <label class="form-checkbox">
                        <input type="checkbox" name="subscribe" value="subscribe" checked>
                        <span class="option-title">🔔 Odběr novinek</span>
                        <span class="option-desc">Dostávejte aktualizace a novinky</span>
                    </label>
                </div>
                <textarea name="feedback" rows="2" placeholder="Napište nám něco o sobě a svém využití. (nepovinné)" class="subscribe-textarea"></textarea>
                <button class="btn btn-dark" type="submit" style="margin-top: 1em;">Odeslat</button>
            </form>
        </div>
    </section>

    <section id="about-us" class="about-us">
        <div class="section-content">
            <h2>O nás</h2>
            <p>Jsme začínající podnikatelé. Pomozte nám na naší cestě tím, že nám sdělíte co vás trápí.</p>
            <p>Více informací o nás najdete na našem webu <a href="https://palmaf.com">palmaf.com</a>.</p>
        </div>
    </section>

    <footer>
        &copy; 2025 Tabulara. Všechna práva vyhrazena. &mdash; Vytvořil <a href="https://palmaf.com" target="_blank" rel="noopener">Palmaf</a>
    </footer>

    <script src="public/js/behavior.js"></script>
</body>
</html>

