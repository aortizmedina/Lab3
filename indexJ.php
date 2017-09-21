<!DOCTYPE html>
<html>
      <head>
		<meta charset="utf-8" />
		<title> SilverJack </title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
    <body>
        
        <?php 
         global $deck;
        // Generate a deck of cards 
        // [0, 1, 2, ..., 51]
        // map each number to a card 
        
        // generate a "hand" of cards
        
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
            
        // Return a specific number of cards
        
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
        
        $deck = generateDeck(); 
        
         function players() {
            $playerPic = rand(1,13); 
            $playerName = ""; 
            $randName = rand(1,13);
            
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
        
        for($i=0;$i<4;$i++)
        {
         $p["$i"]=players();
         $person["$i"] = array(
            "name" => $p["$i"]["name"], 
            "profilePicUrl" => $p["$i"]["imgURL"], 
            "cards" => generateHand($deck)
            ); 
             displayPerson($person["$i"]); 
        }
            const linebreak = "<br/>";
            
            function displayPerson($person) {
                // show profile pic
                echo "<img src='".$person["profilePicUrl"]."'>"; 
                
                
                // iterate through $person's "cards"
                
                for($i = 0; $i < count($person["cards"]); $i++) {
                    $card = $person["cards"][$i];
                    
                    // construct the imgURL for each card
                    
                    // translate this to HTML 
                    echo "<img src='".$card["imgURL"]."'>"; 
                }
                
                echo calculateHandValue($person["cards"]);
                echo  linebreak, $person["name"];
            }
            
            
            
            
            
            
        
        ?>
    </body>
</html>