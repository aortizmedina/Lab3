<!DOCTYPE html>
<html>
      <head>
		<meta charset="utf-8" />
		<title> SilverJack </title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
    <body>
        <h1>SILVERJACK</h1>
        <?php 
            global $deck;
        
            function mapNumberToCard($num) {
                $cardValue = ($num % 13) + 1; 
                $cardSuit = floor($num / 13); 
                $suitStr = ""; 
                switch($cardSuit) {
                    case 0: 
                        $suitStr = "clubs"; 
                        break; 
                    case 1: 
                        $suitStr = "diamonds"; 
                        break; 
                    case 2: 
                        $suitStr = "hearts"; 
                        break; 
                    case 3: 
                        $suitStr = "spades"; 
                        break; 
                }

                $card = array(
                    'num' => $cardValue, 
                    'suit' => $cardSuit, 
                    'imgURL' => "./cards/".$suitStr."/".$cardValue.".png"
                    ); 
                return $card; 
            }
        
            function generateDeck() {
                $cards = array(); 
                for ($i = 0; $i < 52; $i++) {
                    array_push($cards, $i); 
                }
                shuffle($cards); 
                return $cards; 
            }
        
            function calculateHandValue($cards) {
                $sum = 0; 
                foreach ($cards as $card) { // code gives me an error here!!
                    $sum += $card["num"]; 
                }
                return $sum; 
            }
        
            // function that generates a "hand" of cards for one person (no duplicates)
            function generateHand() {
                $hand = array(); 
                global $deck;
                do {
                    $cardNum = array_pop($deck);
                    $card = mapNumberToCard($cardNum); 
                    array_push($hand, $card); 
                } while (calculateHandValue($hand)<36);
                return $hand; 
            }
        
            function players() {
                $playerPic = rand(1, 13); 
                $playerName = ""; 
                $randName = rand(1, 13);
            
                switch($randName) {
                    case 0: 
                        $playerName = "Butters"; 
                        break; 
                    case 1: 
                        $playerName = "Professor Chaos"; 
                        break; 
                    case 2: 
                        $playerName = "Ike"; 
                        break; 
                    case 3: 
                        $playerName = "Jesus"; 
                        break; 
                    case 4: 
                        $playerName = "Bebe"; 
                        break; 
                    case 5: 
                        $playerName = "Pete"; 
                        break; 
                    case 6:
                        $playerName = "Cartman"; 
                        break; 
                    case 7:
                        $playerName = "Jimmy"; 
                        break; 
                    case 8:
                        $playerName = "Kenny"; 
                        break; 
                    case 9:
                        $playerName = "Kyle"; 
                        break; 
                    case 10:
                        $playerName = "Stan"; 
                        break; 
                    case 11:
                        $playerName = "Randy"; 
                        break; 
                    case 12:
                        $playerName = "Santa"; 
                        break; 
                }
                $profile = array(
                    'name' => $playerName, 
                    'imgURL' => "./profile_pics/".$playerPic.".png"
                ); 
                return $profile; 
            }

            function displayPerson($person) {
                echo "<img src='".$person["profilePicUrl"]."'>"; // show profile pic
                echo $person["name"];
                for($i = 0; $i < count($person["cards"]); $i++) { // iterate through $person's "cards"
                    $card = $person["cards"][$i];
                    echo "<img src='".$card["imgURL"]."'>"; // construct the imgURL for each card and translate this to HTML 
                }
                echo calculateHandValue($person["cards"]).'<br>';
            }
            
            $deck = generateDeck(); 
            
            for($i = 1; $i < 5; $i++) {
                $p["$i"]=players();
                $person["$i"] = array(
                "name" => $p["$i"]["name"], 
                "profilePicUrl" => $p["$i"]["imgURL"], 
                "cards" => generateHand($deck)
            ); 
            displayPerson($person["$i"]); 
            }
            
            $score1 = calculateHandValue($person1["cards"]);
            $score2 = calculateHandValue($person2["cards"]);
            $score3 = calculateHandValue($person3["cards"]);
            $score4 = calculateHandValue($person4["cards"]);
            displayWinner($score1, $score2, $score3, $score4);
            
            
            /*
            if ($score1 > $score2 && $score1 > $score3 && $score1 > $score4) {
                if ($score1 <= 42) { // make sure player does not have a score greater than 42
                    echo $person1["name"]. " wins!";
                    //echo $score1. " wins";
                }
            } else if ($score2 > $score1 && $score2 > $score3 && $score2 > $score4) {
                if ($score2 <= 42) { // make sure player does not have a score greater than 42
                    echo $person2["name"]. " wins!";
                    //echo $score2. " wins";
                }
            } else if ($score3 > $score1 && $score3 > $score2 && $score3 > $score4) {
                if ($score3 <= 42) { // make sure player does not have a score greater than 42
                    echo $person3["name"]. " wins!";
                    //echo $score3. " wins";
                }
            } else if ($score4 > $score1 && $score4 > $score2 && $score4 > $score3) {
                if ($score4 <= 42) { // make sure player does not have a score greater than 42
                    echo $person4["name"]. " wins!";
                    //echo $score4. " wins";
                }
                    
            }
         
            */
            
            function displayWinner($score1, $score2, $score3, $score4) {
                    
                if ($score1 > $score2 && $score1 > $score3 && $score1 > $score4) {
                    if ($score1 <= 42) { // make sure player does not have a score greater than 42
                        echo $person1["name"]. " wins!";
                        //echo $score1. " wins";
                    }
                } else if ($score2 > $score1 && $score2 > $score3 && $score2 > $score4) {
                    if ($score2 <= 42) { // make sure player does not have a score greater than 42
                        echo $person2["name"]. " wins!";
                        //echo $score2. " wins";
                    }
                } else if ($score3 > $score1 && $score3 > $score2 && $score3 > $score4) {
                    if ($score3 <= 42) { // make sure player does not have a score greater than 42
                        echo $person3["name"]. " wins!";
                        //echo $score3. " wins";
                    }
                } else if ($score4 > $score1 && $score4 > $score2 && $score4 > $score3) {
                    if ($score4 <= 42) { // make sure player does not have a score greater than 42
                        echo $person4["name"]. " wins!";
                        //echo $score4. " wins";
                    }
                    
                }
            }
                   
                /*    
                if ($person1["num"] > $person2["num"] && $person1["num"] > $person3["num"] && $person1["num"] > $person4["num"]) {
                    if ($person1["num"] <= 42) { // make sure player does not have a score greater than 42
                        echo $person1["name"]. " wins!";
                    }
                } else if ($person2["num"] > $person1["num"] && $person2["num"]  > $person3["num"] && $person2["num"] > $person4["num"]) {                       
                    if ($person2["num"] <= 42) {
                        echo $person2["name"]. " wins!";
                    }
                } else if ($person3["num"] > $person1["num"] && $person3["num"] > $person2["num"] && $person3["num"] > $person4["num"]) {
                    if ($person3["num"] <= 42) {
                        echo $person3["name"]. " wins!";
                    }
                } else if ($person4["num"] > $person1["num"] && $person4["num"] > $person2["num"] && $person4["num"] > $person3["num"]){
                    if ($person4["num"] <= 42) {
                        echo $person4["name"]. " wins!";
                    }
                }
            }
            */
            
            
            
            
            
        
        ?>
        
        
    </body>
</html>