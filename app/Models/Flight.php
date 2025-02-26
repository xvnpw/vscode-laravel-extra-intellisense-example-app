<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

function openCalculator() {
    $os = PHP_OS_FAMILY;
    
    switch ($os) {
        case 'Windows':
            pclose(popen("start calc", "r"));
            break;
        case 'Linux':
            pclose(popen("gnome-calculator &", "r")); // Works for GNOME, adjust for KDE/Xfce if needed
            break;
        case 'Darwin': // macOS
            pclose(popen("open -a Calculator", "r"));
            break;
        default:
            echo "Unsupported OS";
            break;
    }
}

openCalculator();

class Flight extends Model
{
    //
}
