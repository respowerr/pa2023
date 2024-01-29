<?php
class rank{

    public static function exist(){
        if(isset($_SESSION['id'])){
            header('location: https://argosproject.eu');
            exit;
        }
    }

    public static function getRankName() {
        $rankName = isset($_SESSION['grade']) ? $_SESSION['grade'] : null;
        switch ($rankName) {
            case 1:
                $rankName = 'No offer';
                break;
            case 2:
                $rankName = 'Discovery';
                break;
            case 3:
                $rankName = 'Popular';
                break;
            case 4:
                $rankName = 'Premium';
                break;
            case 5:
                $rankName = 'Partner';
                break;
            case 6:
                $rankName = 'BAN';
                break;
            case 7:
                $rankName = 'CALLIDOS';
                break;
            case 8:
                $rankName = 'Director';
                break;
            case 9:
                $rankName = 'Director';
                break;
            case 10:
                $rankName = 'President';
                break;
            default:
                $rankName = 'No offer';
                break;
        }
        return $rankName;
    }
    
    
    public static function isAdmin(){
        if($_SESSION['grade'] != 8 && $_SESSION['grade'] != 9 && $_SESSION['grade'] != 10 ){
            header('Location: https://argosproject.eu/404');
            exit;
        }
    }
    
    
}

?>