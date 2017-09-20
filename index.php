<!DOCTYPE html>
<html>
    <head>
		<meta charset="utf-8" />
		<title> SilverJack </title>
		<link href="css/styles.css" rel="stylesheet" type="text/css">
	</head>
    
    <body>
        
        <?php 
        
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
                'imgURL' => "/Lab3/".$suitStr."/".$cardValue.".png"
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
        
        function printDeck($deck) {
            for ($i = 0; $i < count($deck); $i++) {
                $cardNum = $deck[$i]; // number between 0 and 51
                $card = mapNumberToCard($cardNum); 
                echo "imgURL: ".$card["imgURL"]."<br>"; 
            }
        }
        
        // Return a specific number of cards
        function generateHand($deck) {
            $hand = array(); 
            for ($i = 0; $i < 3; $i++) {
                $cardNum = array_pop($deck);
                $card = mapNumberToCard($cardNum); 
                array_push($hand, $card); 
            }
            return $hand; 
        }
        
        $deck = generateDeck(); 
        
        $person = array(
            "name" => "Brittany", 
            "profilePicUrl" => "./img/brittany.jpg", 
            "cards" => generateHand($deck)
            ); 
                
            
            
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
            }
            
            function calculateHandValue($cards) {
                $sum = 0; 
                foreach ($cards as $card) {
                    $sum += $card["num"]; 
                }
                return $sum; 
            }
            
            displayPerson($person); 
            
            
        
        ?>
    </body>
</html>