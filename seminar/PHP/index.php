<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Úkoly</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">
<div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-2xl font-bold mb-6">PHP Úkoly</h1>
    <!--

 /*
    |--------------------------------------------------------------------------
    | Ukol 1 - Sloučení polí a odstranění duplicit
    |--------------------------------------------------------------------------
    | Máte dvě pole s čísly:
    |
    |   $pole1 = [1, 2, 3, 4];
    |   $pole2 = [3, 4, 5, 6];
    |
    | Napište PHP skript, který sloučí obě pole do jednoho a odstraní duplicity
    | (tj. každé číslo se objeví jen jednou). Výsledek by měl být například:
    |   [1, 2, 3, 4, 5, 6]
*/

Použití funkcí: array_merge(), array_unique(), array_values()
Popis: Dvě pole se spojí (array_merge()), odstraní se duplicity (array_unique()) a indexy se přenastaví (array_values()).
    -->
    <div class="mb-6 p-4 bg-blue-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 1 - Sloučení polí a odstranění duplicit</h2>
        <?php
        $pole1 = [1, 2, 3, 4];
        $pole2 = [3, 4, 5, 6];
        $vysledek = array_values(array_unique(array_merge($pole1, $pole2)));
        echo "Výsledek: " . implode(", ", $vysledek);
        ?>
    </div>
    <!--

    /*
    |--------------------------------------------------------------------------
    | Ukol 2 - Převod teplot – Celsia na Fahrenheita
    |--------------------------------------------------------------------------
    | Máte pole teplot ve stupních Celsia:
    |
    |   $celsius = [0, 20, 37, 100];
    |
    | Napište funkci celsiusToFahrenheit($c), která převádí teplotu podle vzorce:
    |       F = C * 9/5 + 32
    |
    | a vytvořte nové pole, kde budou teploty převedeny na stupně Fahrenheita.
*/



Funkce: celsiusToFahrenheit($c)
Popis: Převádí hodnoty z Celsia na Fahrenheita podle vzorce F = C * 9/5 + 32. Používá array_map(), aby aplikovala převod na celé pole.
    -->
    <div class="mb-6 p-4 bg-green-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 2 - Převod teplot (C → F)</h2>
        <?php
        function celsiusToFahrenheit($c)
        {
            return $c * 9 / 5 + 32;
        }

        $celsius = [0, 20, 37, 100];
        $fahrenheit = array_map('celsiusToFahrenheit', $celsius);
        echo "Převedené teploty: " . implode(", ", $fahrenheit) . "°F";
        ?>
    </div>
    <!--

    /*
    |--------------------------------------------------------------------------
    | Ukol 3 - Vytvoření asociativního pole
    |--------------------------------------------------------------------------
    | Máte dvě pole:
    |
    |   $klice   = ['jmeno', 'prijmeni', 'vek'];
    |   $hodnoty = ['Jan', 'Novak', 30];
    |
    | Napište PHP kód, který vytvoří asociativní pole, kde budou hodnoty z pole
    | $hodnoty přiřazeny ke klíčům z pole $klice. Očekávaný výsledek:
    |   [
    |       'jmeno'    => 'Jan',
    |       'prijmeni' => 'Novak',
    |       'vek'      => 30
    |   ]
*/


Použití funkce: array_combine()
Popis: Kombinuje dvě pole tak, že jedno se stane klíči a druhé odpovídajícími hodnotami. Tím vytvoří asociativní pole.
     -->
    <div class="mb-6 p-4 bg-yellow-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 3 - Asociativní pole</h2>
        <?php
        $klice = ['jmeno', 'prijmeni', 'vek'];
        $hodnoty = ['Jan', 'Novak', 30];
        $asociativniPole = array_combine($klice, $hodnoty);
        echo "Výsledek: ";
        print_r($asociativniPole);
        ?>
    </div>
    <!--

    /*
    |--------------------------------------------------------------------------
    | Ukol 4 - Funkce pro výpočet čtverce čísla
    |--------------------------------------------------------------------------
    | Napište funkci ctverec($cislo), která vrátí čtverec zadaného čísla.
    |
    | Příklad:
    |   echo ctverec(4); // Výstup: 16
*/

Funkce: ctverec($cislo)
Popis: Vypočítá čtverec čísla ($cislo * $cislo) a vrátí výsledek.
    -->
    <div class="mb-6 p-4 bg-red-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 4 - Čtverec čísla</h2>
        <form method="POST">
            <input type="number" name="cislo" class="p-2 border rounded" placeholder="Zadejte číslo">
            <button type="submit" class="bg-red-500 text-white p-2 rounded">Spočítat</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cislo'])) {
            $cislo = $_POST['cislo'];
            echo "Výsledek: " . ($cislo * $cislo);
        }
        ?>
    </div>
    <!--

    /*
    |--------------------------------------------------------------------------
    | Ukol 5 - Filtrování pole podle podmínky (použíjte foreach)
    |--------------------------------------------------------------------------
    | Máte pole čísel:
    |
    |   $cisla = [5, 12, 18, 21, 30, 42];
    |
    | Napište PHP kód, který projde toto pole a vypíše pouze čísla, která jsou
    | větší než 20.
*/

Použití funkce: array_filter() - filtrování prvků pole
Popis: Filtruje čísla větší než 20 pomocí anonymní funkce function ($n) { return $n > 20; }.
    -->
    <div class="mb-6 p-4 bg-purple-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 5 - Filtr čísel > 20</h2>
        <?php
        $cisla = [5, 12, 18, 21, 30, 42];
        $filtered = array_filter($cisla, function ($n) {
            return $n > 20;
        });
        echo "Výsledek: " . implode(", ", $filtered);
        ?>
    </div>
    <!--

    /*
    |--------------------------------------------------------------------------
    | Ukol 6 - Kontrola, zda je vstup číslo
    |--------------------------------------------------------------------------
    | Napište funkci kontrolaCisla($hodnota), která:
    |   - Zkontroluje, zda je zadaná hodnota číslo (pomocí is_numeric()).
    |   - Pokud ano, vrátí text "Číslo je: {hodnota}".
    |   - Pokud ne, vrátí text "Zadaná hodnota není číslo.".
*/



Funkce: is_numeric($hodnota)
Popis: Ověřuje, zda je vstup číslo (is_numeric()), a na základě toho vrací odpovídající text.
    -->
    <div class="mb-6 p-4 bg-indigo-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 6 - Kontrola číselného vstupu</h2>
        <form method="POST">
            <input type="text" name="kontrola" class="p-2 border rounded" placeholder="Zadejte hodnotu">
            <button type="submit" class="bg-indigo-500 text-white p-2 rounded">Ověřit</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['kontrola'])) {
            $hodnota = $_POST['kontrola'];
            echo is_numeric($hodnota) ? "Číslo je: $hodnota" : "Zadaná hodnota není číslo.";
        }
        ?>
    </div>
    <!--

    /*
    |--------------------------------------------------------------------------
    | Ukol 7 - Vítej, uživateli!
    |--------------------------------------------------------------------------
    | Vytvořte dvě proměnné:
    |
    |   $jmeno = "Jan";
    |   $vek   = 17;
    |
    | Napište podmínku, která:
    |   - Pokud je $vek menší než 18, vypíše "Ahoj, mladý Jan!".
    |   - Pokud je $vek 18 a více, vypíše "Vítej, Jan!".
*/

Použití založeno na třech prvích je zkrácený způsob zápisu podmínky - operace (? :)
Popis: Na základě věku se rozhodne, zda zobrazit "Ahoj, mladý {jméno}!" nebo "Vítej, {jméno}!".
    -->
    <div class="mb-6 p-4 bg-teal-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 7 - Vítej, uživateli!</h2>
        <form method="POST">
            <label for="jmeno2">Jméno:</label>
            <input type="text" name="jmeno2" id="jmeno2" required>
            <label for="vek">Věk:</label>
            <input type="number" name="vek" id="vek" required>
            <button type="submit" class="bg-green-500 text-white p-2 rounded">Odeslat</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST["jmeno2"]) && isset($_POST["vek"])) {
                $jmeno2 = htmlspecialchars($_POST["jmeno2"]);
                $vek = (int) $_POST["vek"];
                echo ($vek < 18) ? "Ahoj, mladý $jmeno2!" : "Vítej, $jmeno2!";
            } else {
                echo "Prosím, vyplňte všechna pole.";
            }
        }
        ?>
    </div>
    <!--

    /*
    |--------------------------------------------------------------------------
    | Ukol 8 - Analýza čísla (kladné, záporné, nula)
    |--------------------------------------------------------------------------
    | Napište funkci analyzaCisla($cislo), která:
    |   - Vrátí "Číslo je kladné.", pokud je $cislo větší než 0.
    |   - Vrátí "Číslo je záporné.", pokud je $cislo menší než 0.
    |   - Vrátí "Číslo je nula.", pokud je $cislo rovno 0.
*/

Použití podmínky if-elseif-else
Popis: Kontroluje, zda je číslo kladné, záporné nebo rovno nule, a vypíše odpovídající zprávu.
    -->
    <div class="mb-6 p-4 bg-orange-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 8 - Analýza čísla</h2>
        <form method="POST">
            <input type="number" name="analyza" class="p-2 border rounded" placeholder="Zadejte číslo">
            <button type="submit" class="bg-orange-500 text-white p-2 rounded">Analyzovat</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['analyza'])) {
            $cislo = $_POST['analyza'];
            if ($cislo > 0) echo "Číslo je kladné.";
            elseif ($cislo < 0) echo "Číslo je záporné.";
            else echo "Číslo je nula.";
        }
        ?>
    </div>
    <!--

    /*
    |--------------------------------------------------------------------------
    | Ukol 9 - Přiřazení známky na základě bodů
    |--------------------------------------------------------------------------
    | Napište funkci prirazeniZnamky($body), která na základě počtu bodů vrátí:
    |   - "A" pro 90 a více bodů.
    |   - "B" pro 80 až 89 bodů.
    |   - "C" pro 70 až 79 bodů.
    |   - "D" pro 60 až 69 bodů.
    |   - "F" pro méně než 60 bodů.
*/

Použití ternárních podmínek (? :)
Popis: Převádí počet bodů na školní známky (A-F) podle stanovených rozsahů.
    -->
    <div class="mb-6 p-4 bg-gray-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 9 - Přiřazení známky</h2>
        <form method="POST">
            <input type="number" name="znamky" class="p-2 border rounded" placeholder="Zadejte počet bodů">
            <button type="submit" class="bg-gray-500 text-white p-2 rounded">Vyhodnotit</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['znamky'])) {
            $body = $_POST['znamky'];
            echo ($body >= 90) ? "A" : (($body >= 80) ? "B" : (($body >= 70) ? "C" : (($body >= 60) ? "D" : "F")));
        }
        ?>
    </div>
    <!-- Úkol 10:

    /*
    |--------------------------------------------------------------------------
    | Ukol 10 - Zdravotní stav na základě teploty a příznaků
    |--------------------------------------------------------------------------
    | Vytvořte proměnné:
    |
    |   $teplota = 38.2;
    |   $priznaky = ['kašel', 'únava'];
    |
    | Napište podmínku, která:
    |   - Pokud je teplota vyšší než 37.5 a počet prvků v poli $priznaky je alespoň 1,
    |     vypíše "Můžeš být nemocný, poraď se s lékařem."
    |   - Jinak vypíše "Zdraví je v pořádku."
*/

Použití podmínky if a count()
Popis: Ověřuje, zda je teplota vyšší než 37.5 a zda existují příznaky (count($priznaky) >= 1). Pokud ano, doporučí konzultaci s lékařem.
    -->
    <div class="mb-6 p-4 bg-pink-100 rounded">
        <h2 class="text-lg font-semibold">Úkol 10 - Zdravotní stav</h2>
        <form method="POST">
            <input type="number" step="0.1" name="teplota" class="p-2 border rounded" placeholder="Zadejte teplotu">
            <input type="text" name="priznaky" class="p-2 border rounded"
                   placeholder="Zadejte příznaky oddělené čárkou">
            <button type="submit" class="bg-pink-500 text-white p-2 rounded">Vyhodnotit</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['teplota']) && isset($_POST['priznaky'])) {
            $teplota = floatval($_POST['teplota']);
            $priznaky = array_filter(array_map('trim', explode(',', $_POST['priznaky'])));
            if ($teplota > 37.5 && count($priznaky) >= 1) {
                echo "Můžeš být nemocný, poraď se s lékařem.";
            } else {
                echo "Zdraví je v pořádku.";
            }
        }
        ?>
    </div>
    <!--

    /*
    |--------------------------------------------------------------------------
    | Ukol 11 - Sčítání čísel s validací vstupu
    |--------------------------------------------------------------------------
    | Napište funkci secti($a, $b), která:
    |   - Pokud jsou obě vstupní hodnoty čísla (pomocí is_numeric()), vrátí jejich součet.
    |   - Pokud některá z hodnot není číslo, vrátí text "Neplatný vstup.".
*/

Funkce: is_numeric($a) && is_numeric($b)
Popis: Kontroluje, zda jsou oba vstupy čísla. Pokud ano, vrátí jejich součet, jinak vypíše "Neplatný vstup.".
    -->
    <div class="mb-6 p-4 bg-blue-200 rounded">
        <h2 class="text-lg font-semibold">Úkol 11 - Sčítání čísel</h2>
        <form method="POST">
            <input type="text" name="cislo1" class="p-2 border rounded" placeholder="Zadejte první číslo">
            <input type="text" name="cislo2" class="p-2 border rounded" placeholder="Zadejte druhé číslo">
            <button type="submit" class="bg-blue-500 text-white p-2 rounded">Sečíst</button>
        </form>
        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cislo1']) && isset($_POST['cislo2'])) {
            $a = $_POST['cislo1'];
            $b = $_POST['cislo2'];
            if (is_numeric($a) && is_numeric($b)) {
                echo "Výsledek: " . ($a + $b);
            } else {
                echo "Neplatný vstup.";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
