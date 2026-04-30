# FinalProject
# 🍽️ La Maison — Sito Web Ristorante

**Autore:** Aggio Filippo · **Classe:** 5IE · **Anno:** 2025/2026

---

La Maison è un sito web per un ristorante di lusso milanese sviluppato come progetto di fine anno scolastico. L'obiettivo era creare un sito completo e funzionale che rappresentasse un ristorante reale, con tutte le funzionalità che ci si aspetterebbe da un sito professionale del settore.

Il sito permette agli utenti di consultare il menù del ristorante diviso per categorie, sfogliare lo shop con tre sezioni dedicate a vini pregiati, pasticceria artigianale e prodotti gourmet, prenotare un tavolo scegliendo data, ora e numero di persone, e lasciare recensioni con un voto da 1 a 5 sui piatti assaggiati. Le recensioni sono visibili a tutti con un filtro per voto, mentre per scriverne una è necessario essere registrati. La prenotazione richiede anch'essa il login.

Esiste un'area riservata agli amministratori, accessibile solo dopo il login con un account admin, che permette di visualizzare statistiche generali sul sito come il numero di utenti, prenotazioni e recensioni, e di gestire i contenuti. Il login e la registrazione sono gestiti con password hashate tramite `password_hash()` e verificate con `password_verify()`, quindi le credenziali sono salvate in modo sicuro nel database.

La struttura del progetto segue un framework basato su un file `pages.json` che classifica ogni pagina in categorie: pagine pubbliche, pagine che richiedono il login, pagine admin e pagine che usano il database. Un file `menuChoice.php` viene incluso in cima a ogni pagina e in base alla classificazione decide automaticamente quale navbar mostrare, se controllare la sessione e se includere la connessione al database. Questo evita di ripetere lo stesso codice in ogni pagina.

Il database è strutturato con relazioni 1:N e M:N tra le tabelle principali. Le operazioni critiche come la prenotazione di un tavolo e il salvataggio di una recensione usano le transazioni PDO per garantire la coerenza dei dati. La connessione al database è gestita tramite una classe singleton `DBHandler` che crea una sola connessione condivisa in tutta l'applicazione.

Il frontend è scritto in HTML5 e CSS3 puro senza framework esterni, con un design elegante ispirato ai ristoranti di lusso. La homepage scorre verso il basso con sezioni animate, una navbar orizzontale che diventa opaca allo scroll, sezioni con testo e immagini affiancati, una sezione numeri su sfondo scuro e un footer a quattro colonne. Il sito è completamente responsive e si adatta a mobile, tablet e desktop tramite media queries. Gira in locale tramite XAMPP.

---

## 🚀 Avvio

Copia la cartella in `C:/xampp/htdocs/`, importa `tabella.sql` su phpMyAdmin e apri `http://localhost/FinalProject/`.

---

## 🔐 Credenziali di test

| Ruolo | Email | Password |
|-------|-------|----------|
| 👑 Admin | admin@lamaison.it | admin123 |
| 👤 Cliente | mario@demo.it | 1234 |

> ⚠️ Le password nel file SQL sono in chiaro. Per creare un utente con password hashata usa la pagina di registrazione `/autenticazione/signup.php`

---
