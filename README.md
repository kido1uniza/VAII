# FotoKruh – skupinový fotoalbum

Oct 12, 2026 · @Matus

Meno a priezvisko študenta

Študijná skupina

## Stručný opis projektu

FotoKruh je webová aplikácia na spoločné zdieľanie fotografií v uzavretých skupinách. Rieši bežný problém, keď fotky z výletu, svadby, osláv alebo školskej akcie skončia roztrúsené v telefónoch rôznych ľudí a v rôznych chatoch, často v zníženej kvalite. Používateľ si založí skupinu (napr. „Chata Tatry 2026“), pozve do nej priateľov a všetci členovia môžu nahrávať fotografie do spoločných albumov, komentovať ich a označovať ako obľúbené.

## Role v projekte

- **Návštevník (neprihlásený)** – vidí úvodnú stránku s popisom služby, môže sa zaregistrovať alebo prihlásiť. Nemá prístup k žiadnym skupinám ani fotografiám.

- **Registrovaný používateľ** – spravuje svoj profil, zakladá nové skupiny, prijíma pozvánky a pripája sa do skupín pomocou pozývacieho kódu.

- **Člen skupiny** – v skupinách, kde je členom, prezerá albumy, nahráva fotografie, komentuje a označuje fotky „páči sa mi“. Môže mazať a upravovať len vlastné fotografie a komentáre.

- **Správca skupiny (vlastník)** – používateľ, ktorý skupinu založil, prípadne ktorému boli práva udelené. Upravuje nastavenia skupiny, vytvára a maže albumy, pozýva a odstraňuje členov, môže mazať akýkoľvek obsah v skupine.

- **Administrátor systému** – spravuje celú aplikáciu: používateľské účty (blokovanie), rieši nahlásený nevhodný obsah, vidí základné štatistiky.

## Prípady použitia podľa rolí

### Návštevník

- Návštevník si prezrie úvodnú stránku s popisom aplikácie.
- Návštevník sa zaregistruje.
- Návštevník sa prihlási.

### Registrovaný používateľ

- Používateľ si upraví profil (meno, profilová fotka, heslo).
- Používateľ založí novú skupinu.
- Používateľ sa pripojí do skupiny pomocou pozývacieho kódu/odkazu.
- Používateľ prijme alebo odmietne pozvánku do skupiny.
- Používateľ si zobrazí zoznam svojich skupín.

### Člen skupiny

- Člen si prezrie albumy a fotografie v skupine.
- Člen nahrá jednu alebo viac fotografií do albumu.
- Člen pridá k fotografii popis.
- Člen okomentuje fotografiu.
- Člen označí fotografiu „páči sa mi“.
- Člen stiahne fotografiu v plnom rozlíšení.
- Člen vymaže alebo upraví vlastnú fotografiu či komentár.
- Člen opustí skupinu.

### Správca skupiny

- Správca upraví názov, popis a titulný obrázok skupiny.
- Správca vytvorí, premenuje alebo vymaže album.
- Správca pozve nového člena (e-mailom alebo vygenerovaným kódom).
- Správca odstráni člena zo skupiny.
- Správca povýši člena na správcu.
- Správca vymaže nevhodnú fotografiu alebo komentár.
- Správca zruší skupinu.

### Administrátor systému

- Administrátor si zobrazí zoznam používateľov a zablokuje účet.
- Administrátor skontroluje nahlásený obsah a odstráni ho.
- Administrátor si zobrazí štatistiky (počet používateľov, skupín, fotiek).

## Plánované entity

- **Používateľ (User)** – registrovaný používateľ aplikácie. Atribúty: id, meno, e-mail, heslo (hash), profilová fotka, globálna rola (user/admin), dátum registrácie, zablokovaný (bool).
- **Skupina (Group)** – uzavretý priestor na zdieľanie fotiek. Atribúty: id, názov, popis, titulný obrázok, pozývací kód, dátum vytvorenia, id vlastníka.
- **Členstvo (Membership)** – prepojenie používateľa so skupinou vrátane jeho roly v nej. Atribúty: id, id používateľa, id skupiny, rola (member/admin), dátum pripojenia.
- **Album** – tematický priečinok fotiek v rámci skupiny. Atribúty: id, id skupiny, názov, popis, titulná fotografia, dátum vytvorenia, id autora.
- **Fotografia (Photo)** – nahraný obrázok. Atribúty: id, id albumu, id autora, cesta k súboru, cesta k náhľadu, popis, dátum nahratia, veľkosť, rozmery.
- **Komentár (Comment)** – textový komentár k fotografii. Atribúty: id, id fotografie, id autora, text, dátum vytvorenia.
- **Páči sa mi (Like)** – označenie fotografie používateľom. Atribúty: id používateľa, id fotografie, dátum.
- **Pozvánka (Invitation)** – pozvanie používateľa do skupiny. Atribúty: id, id skupiny, e-mail pozvaného, id pozývajúceho, stav (čaká/prijatá/odmietnutá), dátum vytvorenia, platnosť do.
- **Nahlásenie (Report)** *(rozširujúca)* – nahlásenie nevhodného obsahu. Atribúty: id, id fotografie, id nahlasujúceho, dôvod, stav, dátum.

## Vzťahy medzi entitami

- **Používateľ – Skupina: M:N** cez entitu **Členstvo**. Používateľ môže byť vo viacerých skupinách, skupina má viacerých členov. Členstvo nesie navyše rolu v skupine.
- **Používateľ – Skupina (vlastník): 1:N**. Používateľ môže vlastniť viacero skupín, každá skupina má práve jedného vlastníka.
- **Skupina – Album: 1:N**. Skupina obsahuje viacero albumov, album patrí práve do jednej skupiny.
- **Album – Fotografia: 1:N**. Album obsahuje viacero fotiek, fotka patrí do jedného albumu.
- **Používateľ – Fotografia: 1:N**. Používateľ je autorom viacerých fotiek.
- **Fotografia – Komentár: 1:N** a **Používateľ – Komentár: 1:N**.
- **Používateľ – Fotografia (páči sa mi): M:N** cez entitu **Like** (dvojica používateľ + fotka je unikátna).
- **Skupina – Pozvánka: 1:N**. Skupina môže mať viacero pozvánok.
- **Fotografia – Nahlásenie: 1:N**.

## Hlavné stránky aplikácie

1. **Úvodná stránka** – predstavenie aplikácie, tlačidlá na registráciu a prihlásenie.
2. **Registrácia / Prihlásenie** – formuláre na vytvorenie účtu a prihlásenie.
3. **Moje skupiny (dashboard)** – prehľad skupín používateľa v podobe kartičiek, tlačidlo „Založiť skupinu“, „Pripojiť sa kódom“, zoznam čakajúcich pozvánok.
4. **Detail skupiny** – zoznam albumov skupiny, zoznam členov, najnovšie nahraté fotky.
5. **Detail albumu (galéria)** – mriežka náhľadov fotografií, tlačidlo na nahratie fotiek.
6. **Detail fotografie** – fotka vo väčšom rozlíšení, popis, autor, komentáre, „páči sa mi“, šípky na listovanie, stiahnutie.
7. **Nahrávanie fotografií** – výber viacerých súborov, náhľad pred odoslaním, výber albumu.
8. **Nastavenia skupiny** – úprava údajov skupiny, správa členov a rolí, generovanie pozývacieho kódu, zrušenie skupiny (iba pre správcu).
9. **Profil používateľa** – úprava osobných údajov a hesla.
10. **Administrácia** – zoznam používateľov, nahlásený obsah, štatistiky (iba pre administrátora).

## Rozdelenie funkcionality

### Základné funkcie

- Registrácia, prihlásenie, odhlásenie, úprava profilu.
- Založenie, úprava a zmazanie skupiny.
- Pripojenie do skupiny pomocou pozývacieho kódu.
- Kontrola prístupu – obsah skupiny vidia len jej členovia.
- Vytváranie, úprava a mazanie albumov.
- Nahrávanie fotografií (aj viacerých naraz), generovanie náhľadov.
- Galéria albumu a detail fotografie.
- Komentovanie fotografií.
- Správa členov skupiny (odstránenie, zmena roly).
- Mazanie vlastného obsahu, správca maže akýkoľvek obsah v skupine.

### Rozširujúce funkcie

- „Páči sa mi“ a zoradenie fotiek podľa obľúbenosti.
- Pozvánky e-mailom so stavom a platnosťou.
- Hromadné stiahnutie albumu ako ZIP.
- Zobrazenie fotografií na časovej osi podľa dátumu odfotenia (z EXIF údajov).
- Označovanie osôb na fotkách alebo tagy.
- Nahlasovanie nevhodného obsahu a administrátorský panel.
- Notifikácie o nových fotkách a komentároch v skupine.
- Fullscreen prezentácia (slideshow) albumu.
- Verejný zdieľací odkaz na jeden album pre ľudí mimo skupiny.
- Drag & drop nahrávanie a zmena poradia fotiek.
